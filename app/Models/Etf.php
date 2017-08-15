<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etf extends Model{
    
    protected $table = 'etf';
    protected $primaryKey = 'etf_id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'etf_name', 'description', 'etf_date', 'url', 'user_id'
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
    public function etf(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    
    
//    /**
//     * 
//     */
//    public function holding(){
//        return $this->hasMany('App\Holding');
//    }
}
