<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'department_id',
        'name',
        'description',
        'completion_rate',
    ];

    /**
     * Get the department that owns the room.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the areas for the room.
     */
    public function areas()
    {
        return $this->hasMany(Area::class);
    }

    /**
     * Calculate the completion rate of the room.
     */
    public function calculateCompletionRate()
    {
        $totalAreas = $this->areas()->count();
        
        if ($totalAreas === 0) {
            return 0;
        }
        
        $evaluatedAreas = $this->areas()->where('is_evaluated', true)->count();
        return ($evaluatedAreas / $totalAreas) * 100;
    }

    /**
     * Update the completion rate of the room.
     */
    public function updateCompletionRate()
    {
        $this->completion_rate = $this->calculateCompletionRate();
        $this->save();
        
        return $this->completion_rate;
    }
}