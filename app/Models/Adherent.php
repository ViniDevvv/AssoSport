<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Adherent extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Explicit table since the DB uses a non‑plural or uppercase name.
     *
     * @var string
     */
    protected $table = 'ADHERENT';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'ADH_ID';
    public $timestamps = false;
    public $incrementing = false;


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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function club()
    {
        return $this->belongsTo(Club::class, 'CLU_ID', 'CLU_ID');
    }

    public function hasRole(string $role): bool
    {
        return $this->ADH_ROLE === $role;
    }
}