<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'posisi',
        'jobdesc',
        'kriteria',
        'domisili',
        'min_pengalaman',
        'insentif',
        'link_pendaftaran',
        'company_id',
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('vacancies.posisi', 'like', '%' . $search . '%');
        });

    }
}
