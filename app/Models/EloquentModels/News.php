<?php

namespace App\Models\EloquentModels;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'description',
        'text',
        'image',
        'status',
        'created_at'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeStatus(Builder $query): void
    {
//        $query->where('active', 1);

        if(request()->has('f')) {
            $query->where('status', request()->query('f', 'draft'));
        }
    }

}
