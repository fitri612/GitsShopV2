<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $guarded = ['id'];

    public function products()
    {
        return $this->hasMany(Post::class);
    }

    public function product()
    {
        return $this->hasMany(Products::class);
    }
}
