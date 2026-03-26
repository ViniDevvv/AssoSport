<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Adherent extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'ADHERENT';

    protected $primaryKey = 'ADH_ID';
    public $timestamps = false;

    protected $fillable = [
        'ADH_ID',
        'CLU_ID',
        'DIS_ID',
        'ADH_NOM',
        'ADH_PRENOM',
        'ADH_EMAIL',
        'ADH_ROLE',
        'ADH_HASH_PWD',
        'ADH_DDN',
        'ADH_ADRESSE'
    ];

    protected $hidden = [
        'ADH_HASH_PWD',
    ];

    protected $casts = [
        'ADH_DDN' => 'date',
        'ADH_ROLE' => 'integer',
    ];


    public function club()
    {
        return $this->belongsTo(Club::class, 'CLU_ID', 'CLU_ID');
    }

    public function hasRole(int $role): bool
    {
        return (int) $this->ADH_ROLE === $role;
    }
}