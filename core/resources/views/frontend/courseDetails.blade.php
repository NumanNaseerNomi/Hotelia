@extends('frontend.layout')

@section('pageHeading')
  {{__('Course Details')}}
@endsection

<!-- @php
  $metaKeys = !empty($details->meta_keywords) ? $details->meta_keywords : '';
  $metaDesc = !empty($details->meta_description) ? $details->meta_description : '';
@endphp -->

<!-- @section('meta-keywords', "$metaKeys")
@section('meta-description', "$metaDesc") -->

@section('content')
  <main>
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-area d-flex align-items-center position-relative bg-img-center lazy" data-bg="{{ asset('assets/img/' . $breadcrumbInfo->breadcrumb) }}" >
      <div class="container">
        <div class="breadcrumb-content text-center">
          <h1>{{ strlen($courseDetails->name) > 30 ? mb_substr($courseDetails->name, 0, 30, 'utf-8') . '...' : $courseDetails->name }}</h1>

          <ul class="list-inline">
            <li><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
            <li><i class="far fa-angle-double-right"></i></li>
            <li>Course Details</li>
          </ul>
        </div>
      </div>
    </section>
    <!-- Breadcrumb Section End -->

    <section class="room-details-wrapper section-padding">
      <div class="container">

        <div class="row">
          <!-- Room Details Section Start -->
          <div class="col-lg-8">
            <div class="room-details">
              <div class="entry-header">
                <div class="post-thumb position-relative">
                  <div class="post-thumb-slider">

                    <div class="main-slider">
                      @foreach ($courseDetails as $image)
                        <div class="single-img">
                          <img src="{{ asset('assets/img/rooms/slider_images/' . '6264e67c95ee5.jpg') }}" alt="Image">
                        </div>
                      @endforeach
                    </div>

                    <div class="dots-slider row">
                      @foreach ($courseDetails as $image)
                        <div class="single-dots">
                          <img src="{{ asset('assets/img/rooms/slider_images/' . '6264e67c95ee5.jpg') }}" alt="image">
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                <p id="room-id" class="d-none">{{ $courseDetails->id }}</p>

                <h2 class="entry-title">{{ convertUtf8($courseDetails->name) }}</h2>
              </div>

              <div class="room-details-tab">
                <div class="row">

                  <div class="col">
                    <div class="tab-content desc-tab-content">
                      <div role="tabpanel" class="tab-pane fade in active show" id="desc">
                        <h5 class="tab-title">{{ __('Course Details') }}</h5>
                        <div class="entry-content">
                          <p>{!! replaceBaseUrl($courseDetails->description, 'summernote') !!}</p>
                        </div>
                        
                        <div class="table-responsive">
                          <table class="table table-striped mt-3" id="basic-datatables">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Batch Name</th>
                                <th scope="col">Location</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Description</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($courseDetails->getBatches as $batch)
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $batch->name }}</td>
                                  <td>{{ $batch->location }}</td>
                                  <td>{{ $batch->startDate }}</td>
                                  <td>{{ $batch->endDate }}</td>
                                  <td>{{ $batch->description }}</td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>




                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Room Details Section End -->

          <!-- Sidebar Area Start -->
          <div class="col-lg-4">
            <div class="sidebar-wrap">
              <div class="widget booking-widget">

                @if (Auth::guard('web')->check() == false)
                  <div class="alert alert-warning">
                    {{ __('You are now booking as a guest. if you want to log in before booking, then please') }} <a href="{{ route('user.login', ['redirectPath' => 'room_details']) }}">{{ __('Click Here') }}</a>
                  </div>
                @endif

                <form action="{{ route('room_booking') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="courseId" value="{{ $courseDetails->id }}">

                  <div class="mb-2">
                    <div class="input-wrap">
                      <select class="nice-select" name="batch">
                        <option selected disabled>Select Batch</option>
                        @foreach ($courseDetails->getBatches as $batch)
                          <option value="{{ $batch->id }}"> {{ $loop->iteration }} - {{ $batch->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="mt-4">
                    <div class="input-wrap">
                      <button type="submit" class="btn filled-btn btn-block">
                        Enroll Now <i class="far fa-long-arrow-right"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Sidebar Area End -->
        </div>
      </div>
    </section>

    <!-- Latest Room Start -->
    <!-- Latest Room End -->
  </main>
@endsection

