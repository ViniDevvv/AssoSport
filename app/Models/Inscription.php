<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $table = 'INSCRIPTION';
    protected $primaryKey = 'INS_NUM';
    public $timestamps = false;

    protected $fillable = [
        'ADH_ID',
        'COM_ID',
        'INS_DATE',
        'INS_ETAT',
    ];

    protected $casts = [
        'INS_DATE' => 'date',
    ];

    public function competition()
    {
        return $this->belongsTo(Competition::class, 'COM_ID', 'COM_ID');
    }

    public function adherent()
    {
        return $this->belongsTo(Adherent::class, 'ADH_ID', 'ADH_ID');
    }
}
