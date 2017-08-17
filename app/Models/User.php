<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'chart_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * Get the etf for the user.
     */
    public function etf(){
        //return $this->hasMany('App\Models\Etf', 'etf_id');
        return $this->hasMany('App\Models\Etf', 'etf_id', 'etf_id');
    }
    
    /**
     * Get the logs for the user.
     */
    public function logs(){
        return $this->hasMany('App\Models\Logs', 'log_id', 'log_id');
    }
    
    
    
}
