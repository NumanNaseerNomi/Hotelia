<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchStudentsModelModel extends Model
{
  use HasFactory;

  protected $table = 'BatchStudentsModel';
  protected $fillable = ['batchId', 'studentId'];
}
