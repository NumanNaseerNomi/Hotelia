<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\CoursesModel;
use App\Traits\MiscellaneousTrait;
use Illuminate\Support\Facades\DB;
use App\Models\RoomManagement\Room;
use App\Http\Controllers\Controller;
use App\Models\RoomManagement\RoomReview;
use App\Models\RoomManagement\RoomAmenity;
use App\Models\RoomManagement\RoomBooking;
use App\Models\RoomManagement\RoomContent;
use App\Models\PaymentGateway\OnlineGateway;
use App\Models\PaymentGateway\OfflineGateway;

class CoursesController extends Controller
{
  use MiscellaneousTrait;

  public function showCourses()
  {
    $data['courses'] = CoursesModel::paginate(6);
    $data['breadcrumbInfo'] = MiscellaneousTrait::getBreadcrumb();
    $data['pageHeading'] = "Courses";
    return view('frontend.courses', $data);
  }

  public function courseDetails($id)
  {
    $data['courseDetails'] = CoursesModel::findOrFail($id);
    $data['breadcrumbInfo'] = MiscellaneousTrait::getBreadcrumb();
    $data['pageHeading'] = "Course Details";
    // dd($data['courseDetails']->getBatches);
    return view('frontend.courseDetails', $data);
  }
}
