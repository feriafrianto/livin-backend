<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;
    protected $primaryKey = "progress_id";
    protected $fillable = [
        'name','project_id','isChecked'
    ];
}
