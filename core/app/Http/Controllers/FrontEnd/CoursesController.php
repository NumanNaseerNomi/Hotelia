<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\CoursesModel;
use App\Traits\MiscellaneousTrait;
use App\Http\Controllers\Controller;

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
}
