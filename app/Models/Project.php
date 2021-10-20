<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $primaryKey = 'project_id';

    protected $fillable = [
        'title','description','scale',
        'deadline','visibility','user_id'
    ];

    public function member(){
        return $this->hasMany(Member::class,'project_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function proposal(){
        return $this->hasMany(Proposal::class,'project_id');
    }
    public function requirements(){
        return $this->hasMany(Requirement::class,'project_id');
    }
}
