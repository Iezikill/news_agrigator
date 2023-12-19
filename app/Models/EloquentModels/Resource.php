<?php

namespace App\Models\EloquentModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'resource_title',
        'resource_url',
        'created_at'
    ];
}
