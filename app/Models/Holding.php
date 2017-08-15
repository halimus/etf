<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Holding extends Model
{
    protected $table = 'holding';
    protected $primaryKey = 'holding_id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'holding_name', 'weight', 'etf_id'
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
    public function holding(){
        return $this->belongsTo('App\Models\Etf', 'etf_id');
    }
}
