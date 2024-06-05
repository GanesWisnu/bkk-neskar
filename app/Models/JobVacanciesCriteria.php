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
        $latest = self::orderBy('job_vacancies_criteria_id', 'desc')->first();
        $this->job_vacancies_criteria_id = $latest ? $latest->job_vacancies_criteria_id + 1 : 170000;
    }
}
