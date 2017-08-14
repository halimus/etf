<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {
    
    protected $table = 'country';
    protected $primaryKey = 'country_id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_name', 'weight', 'etf_id'
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
        return $this->belongsTo('App\Models\Etf', 'etf_id');
    }
    
}
