<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'area_id',
        'name',
        'description',
        'is_completed',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_completed' => 'boolean',
    ];

    /**
     * Get the area that owns the task.
     */
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * Mark the task as completed.
     */
    public function markAsCompleted()
    {
        $this->is_completed = true;
        $this->save();
        
        return $this;
    }
}