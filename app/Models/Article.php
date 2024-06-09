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
        'image_cover',
        'user_id',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model){
            $model->slug = \Str::slug($model->title);
            $model->generateId();
        });
    }

    public function generateId()
    {
        $latest = self::orderBy('article_id', 'desc')->first();
        $this->article_id = $latest ? $latest->article_id + 1 : 140000;
    }
}
