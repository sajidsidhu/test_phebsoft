<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Department extends Model
{
    use HasFactory;
    
    public $table='user_departments';
    
    protected $fillable = [
        'user_id',
        'department_id',
    ];
}
