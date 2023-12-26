<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'director',
        'producer',
        'year_published',
        'category',
        'description',
        'quantity',
    ];

    public function borrowings()
    {
        return $this->morphMany(Borrowing::class, 'borrowable');
    }
}
