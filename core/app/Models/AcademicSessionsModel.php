<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicSessionsModel extends Model
{
  use HasFactory;

  protected $table = 'AcademicSessions';
  protected $fillable = ['name', 'startDate', 'endDate', 'isDefault'];
}
