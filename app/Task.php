<?php

namespace App;

use App\Project;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
public function project(){
    return $this->belongsTo(Project::class, 'projects_id');
}
}
