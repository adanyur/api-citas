<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;
use App\Http\Requests\AuthRequest;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = ['name', 'email', 'password',];
    protected $hidden = ['password', 'remember_token',];
    protected $casts = ['email_verified_at' => 'datetime',];


    public function validacionUser(AuthRequest $request)
    {
        return User::whereName($request->name)->exists();
    }


    //RELACIONES DE TABLA
    public function AauthAcessToken()
    {
        return $this->hasMany(OauthAccessToken::class, 'user_id', 'id');
    }
}
