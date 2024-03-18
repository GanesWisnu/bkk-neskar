<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\Criteria;
use App\Models\JobVacanciesCriteria;

class JobVacancies extends Model
{
    use HasFactory;

    protected $fillable = [
        "position",
        "location",
        'deadline',
        'company_id',
    ];

    protected $hidden = [
        'company_id',
    ];

    protected $casts = [
        'deadline' => 'datetime'
    ];



    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function criterias()
    {
        return $this->belongsToMany(Criteria::class, 'job_vacancies_criteria', 'job_vacancies_id', 'criteria_id');
    }
}
