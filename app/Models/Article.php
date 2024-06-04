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
        $latestUser = self::orderBy('id', 'desc')->first();
        $this->id = $latestUser ? $latestUser->id + 1 : 110000;   
    }
}
