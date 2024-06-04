<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';

    protected $fillable = [
        "name",
        "image",
        "address",
        "description",
        'telephone'
    ];

    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model)
        {
            $model->generateId();
        });
    }

    public function generateId()
    {
        $latestUser = self::orderBy('id', 'desc')->first();
        $this->id = $latestUser ? $latestUser->id + 1 : 110000;   
    }
}
