<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacanciesCriteria extends Model
{
    use HasFactory;

    protected $hidden = [
        'criteria_id',
        'job_vacancies_id'
    ];
}
