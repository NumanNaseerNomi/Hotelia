<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchStudentsModel extends Model
{
  use HasFactory;

  protected $table = 'BatchStudents';
  protected $fillable = ['batchId', 'studentId'];
}
