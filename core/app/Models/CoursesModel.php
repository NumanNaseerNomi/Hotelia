<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursesModel extends Model
{
  use HasFactory;

  protected $table = 'Courses';
  protected $fillable = ['name', 'group', 'batch', 'option', 'description'];

  public function getBatches()
  {
    return $this->hasMany(BatchesModel::class, 'courseId');
  }
}
