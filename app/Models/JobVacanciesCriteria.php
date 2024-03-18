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
}
