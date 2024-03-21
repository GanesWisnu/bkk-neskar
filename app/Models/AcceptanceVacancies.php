<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobVacancies;

class AcceptanceVacancies extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'job_vacancies_id'
    ];

    protected $hidden = [
        'job_vacancies_id'
    ];

    public function job_vacancies() {
        return $this->belongsTo(JobVacancies::class);
    }
}
