@extends('frontend.layout')

@section('pageHeading')
  @if (!is_null($pageHeading))
    {{ $pageHeading }}
  @endif
@endsection

@php
    $metaKeywords = !empty($seo->meta_keyword_rooms) ? $seo->meta_keyword_rooms : '';
    $metaDesc = !empty($seo->meta_description_rooms) ? $seo->meta_description_rooms : '';
@endphp

@section('meta-keywords', "$metaKeywords")
@section('meta-description', "$metaDesc")

@section('content')
  <main>
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-area d-flex align-items-center position-relative bg-img-center lazy" data-bg="{{ asset('assets/img/' . $breadcrumbInfo->breadcrumb) }}" >
      <div class="container">
        <div class="breadcrumb-content text-center">
          @if (!is_null($pageHeading))
            <h1>{{ convertUtf8($pageHeading) }}</h1>
          @endif

          <ul class="list-inline">
            <li><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
            <li><i class="far fa-angle-double-right"></i></li>

            @if (!is_null($pageHeading))
              <li>{{ convertUtf8($pageHeading) }}</li>
            @endif
          </ul>
        </div>
      </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- All Rooms Section Start -->
    <section class="rooms-warp list-view section-bg section-padding">
      <div class="container">

        <div class="row">
          <div class="col-lg-12">
            @if (count($courses) == 0)
              <div class="row text-center">
                <div class="col bg-white py-5">
                  <h3>{{ __('No Room Found!') }}</h3>
                </div>
              </div>
            @else
              <div class="row">
                @foreach ($courses as $courseInfo)
                  <div class="col-md-4">
                    <!-- Single Room -->
                    <div class="single-room">
                      <div class="room-thumb d-block">
                        <a href="/user/applicationForm">
                          <img class="lazy" data-src="{{ asset('assets/img/rooms/' . '1640079042.jpg') }}" alt="room">
                        </a>
                      </div>

                      <div class="room-desc">
                        <h4>
                          <p>{{ strlen($courseInfo->name) > 45 ? mb_substr($courseInfo->name, 0, 45, 'utf-8') . '...' : $courseInfo->name }}</p>
                        </h4>
                        <p>{{ $courseInfo->description }}</p>
                      </div>

                    </div>
                  </div>
                @endforeach
              </div>
            @endif
            <div class="row">
                <div class="col-12">{{$courses->links()}}</div>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- All Rooms Section Start -->
  </main>
@endsection
