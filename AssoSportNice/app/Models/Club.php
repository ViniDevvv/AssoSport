<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table = 'CLUB';
    protected $primaryKey = 'CLU_ID';
    public $timestamps = false;

    protected $fillable = [
        'CLU_NOM',
        'CLU_ADRESSEVILLE',
        'CLU_ADRESSERUE',
        'CLU_ADRESSECP',
        'CLU_MAIL',
        'CLU_TELFIXE'
    ];

    public function adherents()
    {
        return $this->hasMany(Adherent::class, 'CLU_ID', 'CLU_ID');
    }

    public function disciplines()
    {
        return $this->belongsToMany(Discipline::class, 'CLUB_DISCIPLINE', 'CLUB_ID', 'DISCIPLINE_ID');
    }

    public function competitions()
    {
        return $this->hasMany(Competition::class, 'CLU_ID', 'CLU_ID');
    }

    public function competitionsLocal()
    {
        return $this->hasMany(Competition::class, 'CLU_ID_LOCAL', 'CLU_ID');
    }
}
