<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class class_Log extends Model
{
    use HasFactory;
    protected $table = 'class_log';
    protected $fillable = ['pid', 'context', 'synopsis', 'title', 'cover', 'create'];
}
