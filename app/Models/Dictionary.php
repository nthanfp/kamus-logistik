<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    use HasFactory;

    protected $table = 'dictionary';

    protected $fillable = [
        'indonesian',
        'indonesian_definition',
        'english',
        'english_definition',
    ];

    public function getIndonesianAttribute($value)
    {
        return ucwords($value);
    }

    public function getEnglishAttribute($value)
    {
        return ucwords($value);
    }
}
