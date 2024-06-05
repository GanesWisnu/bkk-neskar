<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;


    protected $table = 'criteria';

    protected $fillable = [
        "name",
        "input_type"
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
        $latest = self::orderBy('criteria_id', 'desc')->first();
        $this->criteria_id = $latest ? $latest->criteria_id + 1 : 120000;
    }

}
