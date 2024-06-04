<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacanciesCriteria extends Model
{
    use HasFactory;

    protected $table = "job_vacancies_criteria";

    protected $fillable = [
        'criteria_id',
        'job_vacancies_id'
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
