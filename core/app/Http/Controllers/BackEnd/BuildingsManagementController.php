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
    // get the coupons from db
    // $information['coupons'] = Coupon::orderByDesc('id')->get();

    // also, get the currency information from db
    // $information['currencyInfo'] = MiscellaneousTrait::getCurrencyInfo();

    $language = Language::where('is_default', 1)->first();

    $rooms = Room::all();

    $rooms->map(function ($room) use ($language) {
      $room['title'] = $room->roomContent()->where('language_id', $language->id)->pluck('title')->first();
    });

    $information['rooms'] = $rooms;
    $buildings = BuildingsModel::all();
    $information['buildings'] = $buildings;
    // dd($buildings);
    return view('backend.buildingsManagement.index', $information);
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
