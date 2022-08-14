<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    /**
     * 
     */
    protected $fillable = ['name'];

    /**
     * the maintainer of the 
     */
    public function maintainer()
    {
        return $this->belongsTo(User::class, 'maintainer_id', 'id');
    }
    
    /**
     * 
     */
    public function tasks(){
        return $this->hasMany(Task::class, 'project_id', 'id');
    }
}
