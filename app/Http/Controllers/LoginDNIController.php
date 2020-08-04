<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Paciente;
use App\Http\Requests\AuthRequest;



class LoginDNIController extends Controller
{

  private $user, $paciente;
  public function __construct(User $user, Paciente $paciente)
  {
    $this->user = $user;
    $this->paciente = $paciente;
  }

  public function login(AuthRequest $request)
  {
    if (!Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
      return response()->json([
        'status' => false, 'users' => 'Usuario no tiene permisos'
      ]);
    }

    $user = Auth::user();
    $success['users'] = $this->paciente->datospaciente($request);
    $success['status'] = true;
    $success['token'] =  $user->createToken('AccesCita')->accessToken;
    return response()->json($success, 200);
  }

  public function register(AuthRequest $request)
  {
    $postArray = $request->all();
    $postArray['password'] = bcrypt($postArray['password']);
    $user = User::create($postArray);

    $success['users'] = $this->paciente->datospaciente($request);
    $success['status'] = true;
    $success['token'] = $user->createToken('AccesCita')->accessToken;

    return response()->json($success, 200);
  }



  public function buscaDNI(AuthRequest $request)
  {
    if (!$this->user->validacionDni($request)) {
      return response()->json([
        'status' => false,
        'users' => 'El dni no cuenta con Historia, solicitar una historia presencialmente.'
      ]);
    }

    if ($this->user->validacionUser($request)) {
      return $this->login($request);
    } else {
      return $this->register($request);
    }
  }

  public function logout()
  {
    if (Auth::check()) {
      Auth::user()->AauthAcessToken()->delete();
    }
  }
}
