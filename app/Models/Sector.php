<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sector';
    protected $primaryKey = 'sector_id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sector_name', 'weight', 'etf_id'
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
