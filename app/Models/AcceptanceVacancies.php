<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobVacancies;

class AcceptanceVacancies extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'job_vacancies_id'
    ];

    protected $hidden = [
        'job_vacancies_id'
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model){
            $model->generateId();
        });
    }

    public function generateId()
    {
        $latest = self::orderBy('acceptance_vacancies_id', 'desc')->first();
        $this->acceptance_vacancies_id = $latest ? $latest->acceptance_vacancies_id + 1 : 160000;
    }

    public function job_vacancies() {
        return $this->belongsTo(JobVacancies::class);
    }
}
