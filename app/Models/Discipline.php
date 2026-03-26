<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $table = 'DISCIPLINE';
    protected $primaryKey = 'DIS_ID';
    public $timestamps = false;

    protected $fillable = [
        'DIS_ID',
        'DIS_NOM',
    ];
}
