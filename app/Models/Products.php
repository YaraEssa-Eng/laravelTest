<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'cat_id',

    ];

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'cat_id');
    }
}
