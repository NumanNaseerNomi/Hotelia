@extends('frontend.layout')

@section('pageHeading')
  Application Form
@endsection

@php
    $metaKeys = !empty($seo->meta_keyword_registration) ? $seo->meta_keyword_registration : '';
    $metaDesc = !empty($seo->meta_description_registration) ? $seo->meta_description_registration : '';
@endphp

@section('meta-keywords', "$metaKeys")
@section('meta-description', "$metaDesc")

@section('content')
  <main>
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-area d-flex align-items-center position-relative bg-img-center lazy" data-bg="{{ asset('assets/img/' . $breadcrumbInfo->breadcrumb) }}" >
      <div class="container">
        <div class="breadcrumb-content text-center">
          <h1>Application Form</h1>
          <ul class="list-inline">
            <li>Reserve Your Seat</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- Signup Area Start -->
    <div class="user-area-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="user-content">
              <form action="{{ route('user.signup_submit') }}" method="POST">
                @csrf
                
                <div class="input-box">
                  <label>Select the Course*</label>
                  <select id="cars" name="cars">
                    <option value="volvo">Volvo XC90</option>
                    <option value="saab">Saab 95</option>
                    <option value="mercedes">Mercedes SLK</option>
                    <option value="audi">Audi TT</option>
                  </select>
                </div>

                <div class="input-box">
                  <label>Select Course Location*</label>
                  <select id="cars" name="cars">
                    <option value="volvo">Volvo XC90</option>
                    <option value="saab">Saab 95</option>
                    <option value="mercedes">Mercedes SLK</option>
                    <option value="audi">Audi TT</option>
                  </select>
                </div>

                <div class="input-box">
                  <label>Date*</label>
                  <select id="cars" name="cars">
                    <option value="volvo">Volvo XC90</option>
                    <option value="saab">Saab 95</option>
                    <option value="mercedes">Mercedes SLK</option>
                    <option value="audi">Audi TT</option>
                  </select>
                </div>

                <div class="input-box">
                  <label>Accommodation choice*</label>
                  <select id="cars" name="cars">
                    <option value="volvo">Volvo XC90</option>
                    <option value="saab">Saab 95</option>
                    <option value="mercedes">Mercedes SLK</option>
                    <option value="audi">Audi TT</option>
                  </select>
                </div>

                <hr/>

                <div class="input-box">
                  <label>First Name*</label>
                  <input type="text" name="username" value="{{ old('username') }}">
                </div>

                <div class="input-box">
                  <label>Last Name*</label>
                  <input type="text" name="username" value="{{ old('username') }}">
                </div>

                <div class="input-box">
                  <label>Email*</label>
                  <input type="email" name="username" value="{{ old('username') }}">
                </div>

                <div class="input-box">
                  <label>Your Occupation</label>
                  <input type="text" name="username" value="{{ old('username') }}">
                </div>

                <hr/>

                <div class="input-box">
                  <label>Gender*</label><br/>
                  <input type="radio" id="html" name="fav_language" value="HTML">
                  <label for="html">Male</label><br>
                  <input type="radio" id="css" name="fav_language" value="CSS">
                  <label for="css">Female</label><br>
                  <input type="radio" id="javascript" name="fav_language" value="JavaScript">
                  <label for="javascript">Other</label>
                </div>

                <div class="input-box">
                  <label>Date of Birth*</label>
                  <input type="date" class="form-control" name="username" value="{{ old('username') }}">
                </div>

                <div class="input-box">
                  <label>Nationality*</label>
                  <input type="text" name="username" value="{{ old('username') }}">
                </div>

                <hr/>

                <div class="input-box">
                  <label>Street + House Number*</label>
                  <input type="text" name="username" value="{{ old('username') }}">
                </div>

                <div class="input-box">
                  <label>City*</label>
                  <input type="text" name="username" value="{{ old('username') }}">
                </div>

                <div class="input-box">
                  <label>Country*</label>
                  <input type="text" name="username" value="{{ old('username') }}">
                </div>

                <div class="input-box">
                  <label>Zip Code*</label>
                  <input type="text" name="username" value="{{ old('username') }}">
                </div>

                <div class="input-box">
                  <label>Phone*</label>
                  <input type="text" name="username" value="{{ old('username') }}">
                </div>

                <hr/>

                <div class="input-box">
                  <label>Name*</label>
                  <input type="text" name="username" value="{{ old('username') }}">
                </div>

                <div class="input-box">
                  <label>Phone*</label>
                  <input type="text" name="username" value="{{ old('username') }}">
                </div>

                <div class="input-box">
                  <label>Relationship*</label>
                  <input type="text" name="username" value="{{ old('username') }}">
                </div>

                <hr/>

                <div class="input-box">
                  <label>How long have you been practicing Yoga?*</label>
                  <select id="cars" name="cars">
                    <option value="volvo">Volvo XC90</option>
                    <option value="saab">Saab 95</option>
                    <option value="mercedes">Mercedes SLK</option>
                    <option value="audi">Audi TT</option>
                  </select>
                </div>

                <div class="input-box">
                  <label>Do you have any experience teaching yoga?*</label>
                  <select id="cars" name="cars">
                    <option value="volvo">Volvo XC90</option>
                    <option value="saab">Saab 95</option>
                    <option value="mercedes">Mercedes SLK</option>
                    <option value="audi">Audi TT</option>
                  </select>
                </div>

                <div class="input-box">
                  <label>What is your primary reason to join the course?*</label>
                  <input type="text" name="username" value="{{ old('username') }}">
                </div>

                <div class="input-box">
                  <label>What is important to you in life?*</label>
                  <input type="text" name="username" value="{{ old('username') }}">
                </div>

                <div class="input-box">
                  <label>Why did you choose Arhanta Yoga?*</label>
                  <input type="text" name="username" value="{{ old('username') }}">
                </div>

                <div class="input-box">
                  <label>How did you hear about us?*</label>
                  <input type="text" name="username" value="{{ old('username') }}">
                </div>








                <div class="input-box">
                  <label>{{ __('Username') . '*' }}</label>
                  <input type="text" name="username" value="{{ old('username') }}">
                  @error('username')
                    <p class="mt-3 ml-2 text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="input-box">
                  <label>{{ __('Email Address') . '*' }}</label>
                  <input type="email" name="email" value="{{ old('email') }}">
                  @error('email')
                    <p class="mt-3 ml-2 text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="input-box">
                  <label>{{ __('Password') . '*' }}</label>
                  <input type="password" name="password" value="{{ old('password') }}">
                  @error('password')
                    <p class="mt-3 ml-2 text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="input-box">
                  <label>{{ __('Confirm Password') . '*' }}</label>
                  <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">
                  @error('password_confirmation')
                    <p class="mt-3 ml-2 text-danger">{{ $message }}</p>
                  @enderror
                </div>

                @if ($websiteInfo->google_recaptcha_status == 1)
                    <div class="d-block mb-4">
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}
                        @if ($errors->has('g-recaptcha-response'))
                        @php
                            $errmsg = $errors->first('g-recaptcha-response');
                        @endphp
                        <p class="text-danger mb-0 mt-2">{{__("$errmsg")}}</p>
                        @endif
                    </div>
                @endif

                <div class="input-box">
                  <button type="submit" class="btn">{{ __('sign up') }}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Signup Area End -->
  </main>
@endsection
