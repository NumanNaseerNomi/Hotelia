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

    <!-- Application Form Area Start -->
    <div class="user-area-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="user-content">
              <form action="{{ route('user.signup_submit') }}" method="POST">
                @csrf
                <div id="step1">
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
                    <select id="accommodation" name="accommodation" required>
                      <option value="Single Room">Single Room</option>
                      <option value="Double Shared Room">Double Shared Room</option>
                      <option value="Dormitory">Dormitory</option>
                      <option value="Dormitory (Same Gender Only)">Dormitory (Same Gender Only)</option>
                    </select>
                  </div>
                </div>

                <div class="d-none" id="step2">
                  <h1 class="text-center">About You</h1>
                  <div class="input-box">
                    <label>First Name*</label>
                    <input type="text" name="firstName" value="{{ old('firstName') }}" required>
                  </div>

                  <div class="input-box">
                    <label>Last Name*</label>
                    <input type="text" name="lastName" value="{{ old('lastName') }}" required>
                  </div>

                  <div class="input-box">
                    <label>Email*</label>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                  </div>

                  <div class="input-box">
                    <label>Your Occupation</label>
                    <input type="text" name="occupation" value="{{ old('occupation') }}" required>
                  </div>
                </div>

                <div class="d-none" id="step3">
                  <div class="input-box">
                    <label>Gender*</label>
                    <select name="gender" required>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      <option value="other">Other</option>
                    </select>
                  </div>

                  <div class="input-box">
                    <label>Date of Birth*</label>
                    <input type="date" class="form-control" name="dob" value="{{ old('dob') }}" required>
                  </div>

                  <div class="input-box">
                    <label>Nationality*</label>
                    <input type="text" name="nationality" value="{{ old('nationality') }}" required>
                  </div>
                </div>

                <div class="d-none" id="step4">
                  <div class="input-box">
                    <label>Street + House Number*</label>
                    <input type="text" name="street" value="{{ old('street') }}" required>
                  </div>

                  <div class="input-box">
                    <label>City*</label>
                    <input type="text" name="city" value="{{ old('city') }}" required>
                  </div>

                  <div class="input-box">
                    <label>Country*</label>
                    <input type="text" name="country" value="{{ old('country') }}" required>
                  </div>

                  <div class="input-box">
                    <label>Zip Code*</label>
                    <input type="text" name="zipCode" value="{{ old('zipCode') }}" required>
                  </div>

                  <div class="input-box">
                    <label>Phone*</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" required>
                  </div>
                </div>

                <div class="d-none" id="step5">
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
                </div>

                <div class="d-none" id="step6">
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
                </div>

                <div class="input-box">
                  <button type="button" class="btn m-1 d-none" id="previousButton" onclick="previousStep()">Previous</button>
                </div>

                <div class="input-box">
                  <button type="button" class="btn m-1" id="nextButton" onclick="nextStep()">Next</button>
                </div>

                <div class="input-box">
                  <button type="submit" class="btn m-1 d-none" id="submitButton">Register</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Application Form Area End -->
  </main>
@endsection

<script>

  let currentStep = 1;

  function nextStep()
  {
    let element = document.querySelector('#step' + currentStep);

    if(element)
    {
      element.classList.add('d-none');
      currentStep++;
      element = document.querySelector('#step' + currentStep);
      document.querySelector('#previousButton').classList.remove('d-none');

      if(element)
      {
        element.classList.remove('d-none');
      }

      let nextStep = currentStep;
      nextStep++;
      element = document.querySelector('#step' + nextStep);
      
      if(!element)
      {
        document.querySelector('#nextButton').classList.add('d-none');
        document.querySelector('#submitButton').classList.remove('d-none');
      }
    }
  }

  function previousStep()
  {
    let element = document.querySelector('#step' + currentStep);

    if(element)
    {
      element.classList.add('d-none');
      currentStep--;
      element = document.querySelector('#step' + currentStep);
      document.querySelector('#nextButton').classList.remove('d-none');
      document.querySelector('#submitButton').classList.add('d-none');

      if(element)
      {
        element.classList.remove('d-none');
      }

      let nextStep = currentStep;
      nextStep--;
      element = document.querySelector('#step' + nextStep);
      
      if(!element)
      {
        document.querySelector('#previousButton').classList.add('d-none');
      }
    }
  }
</script>