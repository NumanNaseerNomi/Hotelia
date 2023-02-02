<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\RoomsModel;
use App\Models\BatchesModel;
use App\Models\CoursesModel;
use Illuminate\Http\Request;
use App\Models\BuildingsModel;
use App\Traits\MiscellaneousTrait;
use Illuminate\Support\Facades\DB;
use App\Models\SessionBatchesModel;
use App\Http\Controllers\Controller;
use App\Models\AcademicSessionsModel;

class BatchesManagementController extends Controller
{
  use MiscellaneousTrait;

  public function index()
  {

    $data['batches'] = AcademicSessionsModel::find(getCurrentAcademicSession())->getBatches;
    $data['courses'] = CoursesModel::all();
    return view('backend.batchesManagement.index', $data);
  }

  public function create(Request $request)
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

    DB::transaction(function() use ($request)
    {
      $batch = BatchesModel::create($request->all());
      SessionBatchesModel::create(['sessionId' => getCurrentAcademicSession(), 'batchId' => $batch->id]);
    });
    
    $request->session()->flash('success', 'Batch added successfully!');
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
    BatchesModel::findOrFail($id)->delete();
    return back()->with('success', 'Batch deleted successfully!');
  }
}
