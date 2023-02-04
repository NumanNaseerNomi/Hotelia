<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\RoomsModel;
use App\Models\CoursesModel;
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

  public function roomDetails($id)
  {
    $data['courseDetails'] = CoursesModel::findOrFail($id);
    $data['breadcrumbInfo'] = MiscellaneousTrait::getBreadcrumb();
    $data['pageHeading'] = "Room Details";
    return view('frontend.courseDetails', $data);
  }
}
