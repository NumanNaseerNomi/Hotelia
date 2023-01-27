<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\AcademicSessionsModel;
use App\Http\Requests\AcademicSessionStoreRequest;
use App\Http\Requests\AcademicSessionUpdateRequest;

class AcademicSessionsManagementController extends Controller
{
  public function index()
  {
    $academicSessions = AcademicSessionsModel::all();
    return view('backend.AcademicSessionsManagement.index', compact('academicSessions'));
  }

  public function create(AcademicSessionStoreRequest $request)
  {
    AcademicSessionsModel::create($request->all());
    $request->session()->flash('success', 'Session added successfully!');
    return 'success';
  }

  public function makeDefault($id)
  {
    AcademicSessionsModel::where('isDefault', 1)->update(['isDefault' => 0]);
    $academicSession = AcademicSessionsModel::findOrFail($id);
    $academicSession->update(['isDefault' => 1]);
    return back()->with('success', $academicSession->name . ' ' . 'is set as default academic session.');
  }

  public function update(AcademicSessionUpdateRequest $request)
  {
    $academicSession = AcademicSessionsModel::findOrFail($request->id);
    $academicSession->update($request->all());
    $request->session()->flash('success', 'Session updated successfully!');
    return 'success';
  }

  public function delete($id)
  {
    AcademicSessionsModel::findOrFail($id)->delete();
    return back()->with('success', 'Session deleted successfully!');
  }
}
