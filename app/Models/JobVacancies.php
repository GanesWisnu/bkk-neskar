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
        "description",
        "additional_information",
        'company_id',
    ];

    protected $hidden = [
        'company_id',
    ];

    protected $casts = [
        'deadline' => 'datetime'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->generateCode();
        });

    }

    public function generateCode()
    {
        if($this->company_id){
            $company = Company::findOrFail($this->company_id);
            $latest = static::where('company_id',$this->company_id)->latest('id')->first();
            $count =  $latest ? $latest->id + 1 : 1;
            $code = implode([substr(implode('', explode(' ', $company->name)), 0, 5),$this->zfill($count, 3)]);
            $this->code = $code;
        }
    }

    public function zfill($str, $width) {
        return str_pad($str, $width, '0', STR_PAD_LEFT);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function criterias()
    {
        return $this->belongsToMany(Criteria::class, 'job_vacancies_criteria', 'job_vacancies_id', 'criteria_id');
    }


}
