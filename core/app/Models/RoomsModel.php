<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomsModel extends Model
{
  use HasFactory;

  protected $table = 'Room';
  protected $fillable = ['name', 'type', 'buildingId', 'floor', 'description'];

  public function getBuilding()
  {
    return $this->belongsTo(BuildingsModel::class, 'buildingId');
  }
}
