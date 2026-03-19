<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    // match the existing database table COMPETITION
    protected $table = 'COMPETITION';
    protected $primaryKey = 'COM_ID';
    public $incrementing = true;
    protected $keyType = 'string';
    public $timestamps = false; // no timestamps in the table

    protected $fillable = [
        'COM_NOM',
        'COM_DATE',
        'DIS_ID',
        'CLU_ID',
        'CLU_ID_LOCAL',
    ];

    /**
     * Cast attributes to appropriate types.
     */
    protected $casts = [
        'COM_DATE' => 'date',
    ];

    // accessor for name
    public function getNameAttribute()
    {
        return $this->COM_NOM;
    }

    // mutator for name
    public function setNameAttribute($value)
    {
        $this->attributes['COM_NOM'] = $value;
    }

    /**
     * A competition belongs to a discipline.
     */
    public function discipline()
    {
        // foreign key is DIS_ID in COMPETITION pointing to DIS_ID in DISCIPLINE
        return $this->belongsTo(Discipline::class, 'DIS_ID', 'DIS_ID');
    }
}
