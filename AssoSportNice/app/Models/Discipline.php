<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    // match the existing database table DISCIPLINE
    protected $table = 'DISCIPLINE';
    protected $primaryKey = 'DIS_ID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false; // no timestamps in the table

    protected $fillable = [
        'DIS_ID',
        'DIS_NOM',
    ];

    // accessor for name
    public function getNameAttribute()
    {
        return $this->DIS_NOM;
    }

    // mutator for name
    public function setNameAttribute($value)
    {
        $this->attributes['DIS_NOM'] = $value;
    }
}
