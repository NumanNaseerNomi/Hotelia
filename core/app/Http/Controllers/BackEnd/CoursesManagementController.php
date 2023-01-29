<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\RoomsModel;
use App\Models\CoursesModel;
use Illuminate\Http\Request;
use App\Models\BuildingsModel;
use App\Traits\MiscellaneousTrait;
use App\Http\Controllers\Controller;

class CoursesManagementController extends Controller
{
  use MiscellaneousTrait;

  public function index()
  {
    $data['rooms'] = RoomsModel::all();
    $data['buildings'] = BuildingsModel::all();
    $data['courses'] = CoursesModel::all();
    return view('backend.coursesManagement.index', $data);
  }

  public function create(Request $request)
  {
    $request->validate(
      [
        'name' => 'required|max:255',
      ]
    );
    
    CoursesModel::create($request->all());
    $request->session()->flash('success', 'Course added successfully!');
    return 'success';
  }

  public function update(Request $request)
  {
    $request->validate(
      [
        'name' => 'required|max:255',
      ]
    );

    CoursesModel::find($request->id)->update($request->all());
    $request->session()->flash('success', 'Course updated successfully!');
    return 'success';
  }

  public function delete($id)
  {
    CoursesModel::findOrFail($id)->delete();
    return back()->with('success', 'Course deleted successfully!');
  }
}
