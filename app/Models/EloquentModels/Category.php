<?php

namespace App\Models\EloquentModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'image',
        'created_at'
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'category_id');
    }
}
