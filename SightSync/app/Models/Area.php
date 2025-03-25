<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'room_id',
        'name',
        'description',
        'is_evaluated',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_evaluated' => 'boolean',
    ];

    /**
     * Get the room that owns the area.
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * Get the tasks for the area.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Get the evaluations for the area.
     */
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    /**
     * Mark the area as evaluated.
     */
    public function markAsEvaluated()
    {
        $this->is_evaluated = true;
        $this->save();
        
        // Update the completion rate of the room
        $this->room->updateCompletionRate();
        
        return $this;
    }
}