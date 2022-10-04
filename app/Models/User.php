<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
#use Illuminate\Support\Collection::toSql;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $primaryKey = 'id';
    protected $fillable = [
        'name',
        'username',
        'email',
        'role',
        'mstr_role_id',
        'nip',
        'subbid_id',
        'bidang_id',
        'password',
        'is_active',
        'remember_token',
    ];

    public function mstr_role()
    {
        return $this->belongsTo(mstr_role::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
