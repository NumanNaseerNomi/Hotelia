<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\RoomsModel;
use App\Traits\MiscellaneousTrait;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{
  use MiscellaneousTrait;

  public function showCourses()
  {
    $data['courses'] = RoomsModel::paginate(6);
    $data['breadcrumbInfo'] = MiscellaneousTrait::getBreadcrumb();
    $data['pageHeading'] = "Courses";
    return view('frontend.courses', $data);
  }
}
