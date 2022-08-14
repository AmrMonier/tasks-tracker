<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * 
     */
    protected $protected = [
        'name',
        'description',
        'assigned_to',
        'status'
    ];

    /**
     * 
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to', 'id');
    }

    /**
     * 
     */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
