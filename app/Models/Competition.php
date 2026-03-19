<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $table = 'COMPETITION';
    protected $primaryKey = 'COM_ID';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'COM_ID',
        'CLU_ID',
        'DIS_ID',
        'CLU_ID_LOCAL',
        'COM_NOM',
        'COM_DATE',
    ];

    protected $casts = [
        'COM_DATE' => 'date',
    ];

    public function club()
    {
        return $this->belongsTo(Club::class, 'CLU_ID', 'CLU_ID');
    }

    public function discipline()
    {
        return $this->belongsTo(Discipline::class, 'DIS_ID', 'DIS_ID');
    }

    public function clubLocal()
    {
        return $this->belongsTo(Club::class, 'CLU_ID_LOCAL', 'CLU_ID');
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'COM_ID', 'COM_ID');
    }
}
