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

  // public function courseDetails($id)
  // {
  //   // $id = 55;
  //   // dd($id);
  //   $data['course'] = CoursesModel::findOrFail($id);
  //   $data['breadcrumbInfo'] = MiscellaneousTrait::getBreadcrumb();
  //   $data['pageHeading'] = "Course Details";
  //   // dd($data['course']->getBatches);
  //   return view('frontend.courseDetails', $data);
  // }

  public function courseDetails($id)
  {
    $queryResult['courseDetails'] = CoursesModel::findOrFail(2);
    $queryResult['breadcrumbInfo'] = MiscellaneousTrait::getBreadcrumb();

    $language = MiscellaneousTrait::getLanguage();

    $details = RoomContent::join('rooms', 'rooms.id', 'room_contents.room_id')
      ->where('language_id', $language->id)
      ->where('room_id', $id)
      ->firstOrFail();

    $queryResult['details'] = $details;

    $amms = [];

    if (!empty($details->amenities) && $details->amenities != '[]') {
      $ammIds = json_decode($details->amenities, true);
      $ammenities = RoomAmenity::whereIn('id', $ammIds)->orderBy('serial_number', 'ASC')->get();
      foreach ($ammenities as $key => $ammenity) {
        $amms[] = $ammenity->name;
      }
    }

    $queryResult['amms'] = $amms;

    $queryResult['reviews'] = RoomReview::where('room_id', $id)->orderBy('id', 'DESC')->get();

    $queryResult['currencyInfo'] = MiscellaneousTrait::getCurrencyInfo();

    $queryResult['status'] = DB::table('basic_settings')
      ->select('room_rating_status', 'room_guest_checkout_status')
      ->where('uniqid', '=', 12345)
      ->first();

    $bookings = RoomBooking::where('room_id', $id)
      ->select('id', 'arrival_date', 'departure_date')
      ->where('payment_status', 1)
      ->get();

    $qty = Room::findOrFail($id)->quantity;

    $bookedDates = [];

    foreach ($bookings as $key => $booking) {
      // get all dates of a booking date range
      $dates = [];
      $dates = $this->displayDates($booking->arrival_date, $booking->departure_date);

      // loop through the dates
      foreach ($dates as $key => $date) {
        $count = 1;

        foreach ($bookings as $key => $cbooking) {
          if ($cbooking->id != $booking->id) {
            $start = Carbon::parse($cbooking->arrival_date);
            $departure = Carbon::parse($cbooking->departure_date);
            $cDate = Carbon::parse($date);

            // check if the date is present in other booking's date ranges
            if ($cDate->gte($start) && $cDate->lte($departure)) {
              $count++;
            }
          }
        }

        // number of booking of a date is equal to room quantity, then mark the date as booked
        if ($count >= $qty && !in_array($date, $bookedDates)) {
          $bookedDates[] = $date;
        }
      }
    }

    $queryResult['bookingDates'] = $bookedDates;

    $queryResult['onlineGateways'] = OnlineGateway::where('status', 1)->get();

    $queryResult['offlineGateways'] = OfflineGateway::orderBy('serial_number', 'asc')->get()->map(function ($gateway) {
      return [
        'id' => $gateway->id,
        'name' => $gateway->name,
        'short_description' => $gateway->short_description,
        'instructions' => replaceBaseUrl($gateway->instructions, 'summernote'),
        'attachment_status' => $gateway->attachment_status,
        'serial_number' => $gateway->serial_number
      ];
    });

    $queryResult['latestRooms'] = RoomContent::where('language_id', $language->id)->with(['room' => function ($query) {
      $query->status();
    }])
      ->where('room_id', '<>', $details->room_id)
      ->where('room_category_id', $details->room_category_id)
      ->orderBy('room_id', 'desc')
      ->limit(3)
      ->get();

    $queryResult['avgRating'] = RoomReview::where('room_id', $id)->avg('rating');

    // return view('frontend.rooms.room_details', $queryResult);
    return view('frontend.courseDetails', $queryResult);
  }
}
