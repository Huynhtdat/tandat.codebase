<?php

namespace App\Models;

use App\Enums\Category\CategoryStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'created_at',
        'parent_id'
    ];

    protected $casts = [
        'created_at' => 'date',
    ];

    public function posts(){
        return $this->belongsToMany(Post::class, 'categories_posts', 'category_id', 'post_id');
    }

    public function scopePublished($query){
        return $query->where('status', CategoryStatus::Published);
    }
}
