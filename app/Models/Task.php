<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'title',
        'description',
        'urgent',
        'progress',
        'status',
        'order_column',
        'user_id',

    ];

    public function sortable(): array
    {
        return ['order_column'];
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'task_user', 'task_id', 'user_id')
            ->withTimestamps(); // Handles many-to-many via pivot
    }

    /**
     * The user who created this task.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
