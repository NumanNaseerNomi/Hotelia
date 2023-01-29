<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchesModel extends Model
{
  use HasFactory;

  protected $table = 'Batches';
  protected $fillable = ['name', 'courseId', 'maxStrength', 'rollNumberPrefix', 'location', 'startDate', 'endDate', 'description'];
  
  // public function getBuilding()
  // {
  //   return $this->belongsTo(BuildingsModel::class, 'buildingId');
  // }
}
