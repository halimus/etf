<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model{
    
    protected $table = 'logs';
    protected $primaryKey = 'log_id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'symbol', 'ip_address', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    
    /**
     * 
     * @return type
     */
    public function author(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    
}
