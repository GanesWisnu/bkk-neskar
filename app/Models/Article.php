<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'article';

    protected $fillable = [
        'title',
        'subtitle',
        'content',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model){
            $model->slug = \Str::slug($model->title);
        });
    }
}
