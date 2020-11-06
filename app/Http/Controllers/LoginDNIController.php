<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;
use App\User;
use App\Paciente;
use App\historia;



class LoginDNIController extends Controller
{

  private $user, $paciente, $historia;
  public function __construct(User $user, Paciente $paciente, Historia $historia)
  {
    $this->user = $user;
    $this->paciente = $paciente;
    $this->historia = $historia;
  }


  public function buscaDocumento(AuthRequest $request)
  {

    if (!$this->paciente->validacionDocumento($request)) {
      return response()->json([
        'status' => false,
        'messages' => 'El documento ingresado no cuenta con Historia'
      ]);
    }

    return  $this->user->validacionUser($request) ?  $this->login($request) : $this->register($request);
  }

  public function login(AuthRequest $request)
  {
    if (!Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
      return response()->json([
        'status' => false, 'users' => 'Paciente no tiene permiso'
      ]);
    }

    $user = Auth::user();
    $success = $this->tokenCreate($user, $request);
    return response()->json($success, 200);
  }

  public function register(AuthRequest $request)
  {
    $postArray = $request->all();
    $postArray['password'] = bcrypt($postArray['password']);
    $user = User::create($postArray);
    $success = $this->tokenCreate($user, $request);
    return response()->json($success, 200);
  }

  public function tokenCreate($user, AuthRequest $request)
  {
    $success['status'] = true;
    $success['token'] =  $user->createToken('AccesCita')->accessToken;
    $success['users'] =  $this->paciente->datospaciente($request);

    return $success;
  }




  public function logout()
  {
    if (Auth::check()) {
      Auth::user()->AauthAcessToken()->delete();
    }
  }
}
