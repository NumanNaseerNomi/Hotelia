<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\BuildingsModel;
use App\Models\Language;
use App\Models\RoomManagement\Room;
use App\Traits\MiscellaneousTrait;
use Illuminate\Http\Request;

class BuildingsManagementController extends Controller
{
  use MiscellaneousTrait;

  public function index()
  {
    $buildings = BuildingsModel::all();
    return view('backend.buildingsManagement.index', compact('buildings'));
  }

  public function create(Request $request)
  {
    $request->validate(
      [
        'name' => 'required|max:255',
        'location' => 'required',
      ]
    );

    BuildingsModel::create($request->all());
    $request->session()->flash('success', 'Building added successfully!');
    return 'success';
  }

  public function update(Request $request)
  {
    $request->validate(
      [
        'name' => 'required|max:255',
        'location' => 'required',
      ]
    );

    BuildingsModel::find($request->id)->update($request->all());
    $request->session()->flash('success', 'Building updated successfully!');
    return 'success';
  }

  public function delete($id)
  {
    BuildingsModel::findOrFail($id)->delete();
    return back()->with('success', 'Building deleted successfully!');
  }
}
