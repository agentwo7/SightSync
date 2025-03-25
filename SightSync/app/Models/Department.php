<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'site_id',
        'name',
        'description',
    ];

    /**
     * Get the site that owns the department.
     */
    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    /**
     * Get the rooms for the department.
     */
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}