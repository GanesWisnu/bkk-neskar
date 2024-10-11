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

    // Explicitly define the primary key
    protected $primaryKey = 'job_vacancies_id';

    // If your primary key is not auto-incrementing
    public $incrementing = false;

    // Specify the data type of the primary key
    protected $keyType = 'int';
    
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
            $model->generateId();
        });
    }

    public function generateId()
    {
        $latest = self::orderBy('job_vacancies_id', 'desc')->first();
        $this->job_vacancies_id = $latest ? $latest->job_vacancies_id + 1 : 180000;
    }

    public function generateCode()
    {
        if($this->company_id){
            $company = Company::where('company_id', $this->company_id)->first();
            $latest = static::where('company_id',$this->company_id)->latest('company_id')->first();
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
        return $this->belongsTo(Company::class, "company_id", 'company_id');
    }

    public function criterias()
    {
        return $this->belongsToMany(Criteria::class, 'job_vacancies_criteria', 'job_vacancies_id', 'criteria_id', 'job_vacancies_id');
    }


}
