<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobVacancies;

class ApplicatnsVacancies extends Model
{
    use HasFactory;

    protected $fillable = [
        "data"
    ];

    protected $hidden = [
        'job_vacancies_id'
    ];

    public function job_vacancies() {
        return $this->belongsTo(JobVacancies::class);
    }
}
