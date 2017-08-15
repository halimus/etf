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
    
    /**
     * Get the holding for the etf.
     */
    public function holding(){
        //return $this->hasMany('App\Models\Holding', 'holding_id');
        return $this->hasMany('App\Models\Holding', 'holding_id', 'holding_id');
    }
    
    /**
     * Get the sector for the etf.
     */
    public function sector(){
        return $this->hasMany('App\Models\Sector', 'sector_id', 'sector_id');
    }
    
    /**
     * Get the country for the etf.
     */
    public function country(){
        return $this->hasMany('App\Models\Country', 'country_id', 'country_id');
    }
}
