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
        'telephone',
        'user_id',
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
        $latest = self::orderBy('company_id', 'desc')->first();
        $this->company_id = $latest ? $latest->company_id + 1 : 130000;
    }
}
