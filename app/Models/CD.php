<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CD extends Model
{
    protected $table = 'cds';
    use HasFactory;

    protected $fillable = [
        'title',
        'artist',
        'publisher',
        'year_published',
        'category',
        'description',
        'quantity',
    ];
}
