<?php
/**
 * Created by PhpStorm.
 * User: Ramunes
 * Date: 2017-09-19
 * Time: 18:12
 */

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Users extends Authenticatable
{

    protected $table = 'users';

    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['id', 'name', 'email', 'password'];

    protected $hidden = [
        'password', 'remember_token',
    ];

}