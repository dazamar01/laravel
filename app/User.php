<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'adm_usuarios';
    protected $fillable = array('name', 'password', 'email');

    protected $maps = [
        'usuario_creacion_id' => 'creadoPor', 'fecha_creacion' => 'fechaCreacion'];

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'session_id', 'email_verified_at'
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
}
