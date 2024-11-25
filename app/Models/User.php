<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticable
{
    use Notifiable;

    public $timestamps = false;
    protected $guard = 'user';
    protected $table = 'tb_petugas';
    protected $primaryKey = 'id_petugas';
    protected $fillable = [
        'id_petugas',
        'nama_petugas',
        'alamat',
        'telp',
        'email',
        'username',
        'password',
        'status',
    ];
}
