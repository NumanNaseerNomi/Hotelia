<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\RoomsModel;
use App\Models\BatchesModel;
use App\Models\CoursesModel;
use Illuminate\Http\Request;
use App\Models\StudentsModel;
use App\Models\BuildingsModel;
use App\Traits\MiscellaneousTrait;
use App\Http\Controllers\Controller;

class StudentsManagementController extends Controller
{
  use MiscellaneousTrait;

  public function index()
  {
    $data['batches'] = BatchesModel::all();
    $data['courses'] = CoursesModel::all();
    $data['students'] = StudentsModel::all();
    return view('backend.studentsManagement.index', $data);
  }

  public function create(Request $request)
  {
    $request->validate(
      [
        'firstName' => 'required|max:255',
        'lastName' => 'required|max:255',
        'guardianName' => 'required|max:255',
        'contactNumber' => 'required',
        'batchId' => 'required',
        'courseId' => 'required',
      ]
    );
    
    StudentsModel::create($request->all());
    $request->session()->flash('success', 'Student added successfully!');
    return 'success';
  }

  public function update(Request $request)
  {
    $request->validate(
      [
        'name' => 'required|max:255',
        'courseId' => 'required',
        'maxStrength' => 'required',
        'rollNumberPrefix' => 'required',
        'startDate' => 'required',
        'endDate' => 'required',
        'location' => 'required',
      ]
    );

    BatchesModel::find($request->id)->update($request->all());
    $request->session()->flash('success', 'Batch updated successfully!');
    return 'success';
  }

  public function delete($id)
  {
    StudentsModel::findOrFail($id)->delete();
    return back()->with('success', 'Student deleted successfully!');
  }
}
