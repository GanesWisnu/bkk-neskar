<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobVacancies;

class ApplicantsVacancies extends Model
{
    use HasFactory;

    protected $table = "applicants_vacancies";

    protected $fillable = [
        "data",
        'job_vacancies_id',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model){
            $model->slug = \Str::slug($model->title);
            $model->generateId();
        });
    }

    public function generateId()
    {
        $latest = self::orderBy('applicants_vacancies_id', 'desc')->first();
        $this->applicants_vacancies_id = $latest ? $latest->applicants_vacancies_id + 1 : 150000;
    }



    public function vacancies()
    {
        return $this->belongsTo(JobVacancies::class, 'job_vacancies_id');
    }

    protected function data(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => json_decode($value, true),
        );
    }


}
