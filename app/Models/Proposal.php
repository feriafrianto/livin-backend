<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Proposal extends Model
{
    use HasFactory;
    protected $primaryKey = 'proposal_id';

    protected $fillable = [
        'role','coverletter',
        'project_id','user_id'
    ];

}
