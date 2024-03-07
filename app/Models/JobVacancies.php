<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class JobVacancies extends Model
{
    use HasFactory;

    protected $fillable = [
        "position",
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
}
