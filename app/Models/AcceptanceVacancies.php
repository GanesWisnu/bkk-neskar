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
            $model->slug = \Str::slug($model->title);
            $model->generateId();
        });
    }

    public function generateId()
    {
        $latestUser = self::orderBy('id', 'desc')->first();
        $this->id = $latestUser ? $latestUser->id + 1 : 110000;   
    }

    public function job_vacancies() {
        return $this->belongsTo(JobVacancies::class);
    }
}
