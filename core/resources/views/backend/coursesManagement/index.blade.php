@extends('backend.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">Courses Management</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="{{ route('admin.dashboard') }}">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Courses Management</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Courses</a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-8">
              <div class="card-title d-inline-block">Courses</div>
            </div>

            <div class="col-lg-4 mt-2 mt-lg-0">
              <a href="#" data-toggle="modal" data-target="#createModal" class="btn btn-primary btn-sm float-lg-right float-left">
                <i class="fas fa-plus"></i> {{ __('Add') }}
              </a>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              @if (count($courses) == 0)
                <h3 class="text-center mt-2">NO COURSES FOUND</h3>
              @else
                <div class="table-responsive">
                  <table class="table table-striped mt-3" id="basic-datatables">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">Course Group</th>
                        <th scope="col">Batch</th>
                        <th scope="col">Option</th>
                        <th scope="col">Description</th>
                        <th scope="col">{{ __('Actions') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($courses as $course)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $course->name }}</td>
                          <td>{{ $course->group }}</td>
                          <td>
                            @foreach ($course->getBatches as $batch)
                              <p>{{ $batch->name }}</p>
                            @endforeach
                          </td>
                          <td>{{ $course->registrationFee }}</td>
                          <td>{{ $course->description }}</td>
                          <td>
                            <a class="btn btn-secondary btn-sm mr-1 editBtn" href="#" data-toggle="modal" data-target="#editModal" data-id="{{ $course->id }}" data-name="{{ $course->name }}" data-group="{{ $course->group }}" data-description="{{ $course->description }}">
                              <span class="btn-label">
                                <i class="fas fa-edit"></i>
                              </span>
                              {{ __('Edit') }}
                            </a>

                            <form class="deleteForm d-inline-block" action="{{ url('admin/coursesManagement/delete', ['id' => $course->id]) }}" method="post">
                              @csrf
                              <button type="submit" class="btn btn-danger btn-sm deleteBtn">
                                <span class="btn-label">
                                  <i class="fas fa-trash"></i>
                                </span>
                                {{ __('Delete') }}
                              </button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              @endif
            </div>
          </div>
        </div>

        <div class="card-footer"></div>
      </div>
    </div>
  </div>

  {{-- create modal --}}
  @includeIf('backend.coursesManagement.create')

  {{-- edit modal --}}
  @includeIf('backend.coursesManagement.edit')
@endsection
