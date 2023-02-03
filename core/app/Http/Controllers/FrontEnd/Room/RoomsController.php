<?php

namespace App\Http\Controllers\FrontEnd\Room;

use App\Models\RoomsModel;
use App\Traits\MiscellaneousTrait;
use App\Http\Controllers\Controller;

class RoomsController extends Controller
{
  use MiscellaneousTrait;

  public function showRooms()
  {
    $data['rooms'] = RoomsModel::paginate(6);
    $data['breadcrumbInfo'] = MiscellaneousTrait::getBreadcrumb();
    $data['pageHeading'] = "Rooms";
    return view('frontend.rooms', $data);
  }
}
