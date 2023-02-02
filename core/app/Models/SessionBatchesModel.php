<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionBatchesModel extends Model
{
  use HasFactory;

  protected $table = 'SessionBatches';
  protected $fillable = ['sessionId', 'batchId'];
}
