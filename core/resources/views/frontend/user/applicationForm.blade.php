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
              <form action="{{ url('/user/applicationFormSubmit') }}" method="POST">
                @csrf
                <div id="step1">
                  <div class="input-box">
                    <label>Select the Course*</label>
                    <select id="course" name="course">
                      @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="input-box">
                    <label>Select Course Location*</label>
                    <select id="location" name="location">
                      @foreach($courses as $course)
                        @foreach($course->getBatches as $batch)
                          <option value="{{ $batch->id }}">{{ $batch->location }}</option>
                        @endforeach
                      @endforeach
                    </select>
                  </div>

                  <div class="input-box">
                    <label>Date*</label>
                    <select id="date" name="date">
                      @foreach($courses as $course)
                        @foreach($course->getBatches as $batch)
                          <option value="{{ $batch->id }}">{{ $batch->startDate }} -- {{ $batch->endDate }}</option>
                        @endforeach
                      @endforeach
                    </select>
                  </div>

                  <div class="input-box">
                    <label>Accommodation choice*</label>
                    <select id="accommodation" name="accommodation">
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
                    <input type="text" name="firstName" value="{{ old('firstName') }}">
                  </div>

                  <div class="input-box">
                    <label>Last Name*</label>
                    <input type="text" name="lastName" value="{{ old('lastName') }}">
                  </div>

                  <div class="input-box">
                    <label>Email*</label>
                    <input type="email" name="email" value="{{ old('email') }}">
                  </div>

                  <div class="input-box">
                    <label>Your Occupation</label>
                    <input type="text" name="occupation" value="{{ old('occupation') }}">
                  </div>
                </div>

                <div class="d-none" id="step3">
                  <h1 class="text-center">About You</h1>
                  <div class="input-box">
                    <label>Gender*</label>
                    <select name="gender">
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      <option value="other">Other</option>
                    </select>
                  </div>

                  <div class="input-box">
                    <label>Date of Birth*</label>
                    <input type="date" class="form-control" name="dob" value="{{ old('dob') }}">
                  </div>

                  <div class="input-box">
                    <label>Nationality*</label>
                    <input type="text" name="nationality" value="{{ old('nationality') }}">
                  </div>
                </div>

                <div class="d-none" id="step4">
                  <h1 class="text-center">Your Contact Details</h1>
                  <div class="input-box">
                    <label>Street + House Number*</label>
                    <input type="text" name="street" value="{{ old('street') }}">
                  </div>

                  <div class="input-box">
                    <label>City*</label>
                    <input type="text" name="city" value="{{ old('city') }}">
                  </div>

                  <div class="input-box">
                    <label>Country*</label>
                    <input type="text" name="country" value="{{ old('country') }}">
                  </div>

                  <div class="input-box">
                    <label>Zip Code*</label>
                    <input type="text" name="zipCode" value="{{ old('zipCode') }}">
                  </div>

                  <div class="input-box">
                    <label>Phone*</label>
                    <input type="text" name="phone" value="{{ old('phone') }}">
                  </div>
                </div>

                <div class="d-none" id="step5">
                  <h1 class="text-center">Emergency Contact</h1>
                  <div class="input-box">
                    <label>Name*</label>
                    <input type="text" name="emergencyName" value="{{ old('emergencyName') }}">
                  </div>

                  <div class="input-box">
                    <label>Phone*</label>
                    <input type="text" name="emergencyPhone" value="{{ old('emergencyPhone') }}">
                  </div>

                  <div class="input-box">
                    <label>Relationship*</label>
                    <input type="text" name="emergencyRelationship" value="{{ old('emergencyRelationship') }}">
                  </div>
                </div>

                <div class="d-none" id="step6">
                  <div class="input-box">
                    <label>How long have you been practicing Yoga?*</label>
                    <select name="question1">
                      <option value="Less than a year">Less than a year</option>
                      <option value="More than a year">More than a year</option>
                    </select>
                  </div>

                  <div class="input-box">
                    <label>Do you have any experience teaching yoga?</label>
                    <select name="question2">
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                  </div>

                  <div class="input-box">
                    <label>What is your primary reason to join the course?*</label>
                    <input type="text" name="question3" value="{{ old('question3') }}">
                  </div>

                  <div class="input-box">
                    <label>What is important to you in life?</label>
                    <input type="text" name="question4" value="{{ old('question4') }}">
                  </div>

                  <div class="input-box">
                    <label>Why did you choose Arhanta Yoga?*</label>
                    <input type="text" name="question5" value="{{ old('question5') }}">
                  </div>

                  <div class="input-box">
                    <label>How did you hear about us?*</label>
                    <input type="text" name="question6" value="{{ old('question6') }}">
                  </div>
                </div>

                <div class="d-none" id="step7">
                  <div class="input-box">
                    <label>Have you in the last 12 months used tobacco, alcohol, recreational drugs, or illicit substances?*</label>
                    <select name="question7">
                      <option value="No">No</option>
                      <option value="Yes">Yes</option>
                    </select>
                  </div>
                  <p>Please note that for any residential courses conducted at the premises of the Arhanta Yoga Ashrams in India and the Netherlands, the use of tobacco, alcohol and any other drugs is strictly prohibited. Please consider carefully before applying that you will be able to discontinue the use of any such substances during the entire duration of your course.</p>

                  <div class="input-box">
                    <label>Please mention in case you have any allergies or special dietary needs:</label>
                    <textarea name="question8" rows="3">{{ old('question8') }}</textarea>
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