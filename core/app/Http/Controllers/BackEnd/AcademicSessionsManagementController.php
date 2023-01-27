<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AcademicSessionsModel;
// use App\Http\Requests\LanguageStoreRequest;
// use App\Http\Requests\LanguageUpdateRequest;
// use App\Models\BasicSettings\CookieAlert;
// use App\Models\BasicSettings\PageHeading;
// use App\Models\BasicSettings\SEO;
// use App\Models\BlogManagement\Blog;
// use App\Models\BlogManagement\BlogCategory;
// use App\Models\BlogManagement\BlogContent;
// use App\Models\FAQ;
// use App\Models\Footer\FooterQuickLink;
// use App\Models\Footer\FooterText;
// use App\Models\GalleryManagement\Gallery;
// use App\Models\GalleryManagement\GalleryCategory;
// use App\Models\HomePage\Brand;
// use App\Models\HomePage\Facility;
// use App\Models\HomePage\HeroSlider;
// use App\Models\HomePage\HeroStatic;
// use App\Models\HomePage\IntroCountInfo;
// use App\Models\HomePage\IntroSection;
// use App\Models\HomePage\SectionHeading;
// use App\Models\HomePage\Testimonial;
use App\Http\Requests\AcademicSessionStoreRequest;
use App\Http\Requests\AcademicSessionUpdateRequest;
// use App\Models\Menu;
// use App\Models\PackageManagement\Package;
// use App\Models\PackageManagement\PackageBooking;
// use App\Models\PackageManagement\PackageCategory;
// use App\Models\PackageManagement\PackageContent;
// use App\Models\PackageManagement\PackageLocation;
// use App\Models\PackageManagement\PackagePlan;
// use App\Models\PackageManagement\PackageReview;
// use App\Models\Page;
// use App\Models\PageContent;
// use App\Models\Popup;
// use App\Models\RoomManagement\Room;
// use App\Models\RoomManagement\RoomAmenity;
// use App\Models\RoomManagement\RoomBooking;
// use App\Models\RoomManagement\RoomCategory;
// use App\Models\RoomManagement\RoomContent;
// use App\Models\RoomManagement\RoomReview;
// use App\Models\ServiceManagement\Service;
// use App\Models\ServiceManagement\ServiceContent;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

// use function GuzzleHttp\json_decode;

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

//   public function editKeyword($id)
//   {
//     $language = Language::findOrfail($id);

//     // get all the keywords of the selected language
//     $jsonData = file_get_contents(resource_path('lang/') . $language->code . '.json');

//     // convert json encoded string into a php associative array
//     $keywords = json_decode($jsonData, true);

//     return view('backend.language.edit_keyword', compact('language', 'keywords'));
//   }

//   public function updateKeyword(Request $request, $id)
//   {
//     $arrData = $request['keyValues'];

//     // first, check each key has value or not
//     foreach ($arrData as $key => $value) {
//       if ($value == null) {
//         $request->session()->flash('warning', 'Value is required for "' . $key . '" key.');

//         return redirect()->back();
//       }
//     }

//     // convert the array into a string containing the json representation
//     $jsonData = json_encode($arrData);

//     $language = Language::findOrfail($id);

//     $fileLocated = resource_path('lang/') . $language->code . '.json';

//     // put all the keywords in the selected language file
//     file_put_contents($fileLocated, $jsonData);

//     $request->session()->flash('success', $language->name . ' language\'s keywords updated successfully!');

//     return redirect()->back();
//   }

  public function delete($id)
  {
    AcademicSessionsModel::findOrFail($id)->delete();
    return back()->with('success', 'Session deleted successfully!');
  }

//   public function rtlcheck($langid)
//   {
//       if ($langid > 0) {
//           $lang = Language::find($langid);
//       } else {
//           return 0;
//       }

//       return $lang->direction;
//   }
}
