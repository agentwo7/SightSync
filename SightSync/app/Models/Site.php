<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'name',
        'location',
        'description',
    ];

    /**
     * Get the company that owns the site.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the departments for the site.
     */
    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}