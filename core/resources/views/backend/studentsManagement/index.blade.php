@extends('backend.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">Students</h4>
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
        <a href="#">Students Management</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Students</a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-8">
              <div class="card-title d-inline-block">Students</div>
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
              @if (count($students) == 0)
                <h3 class="text-center mt-2">NO STUDENTS FOUND</h3>
              @else
                <div class="table-responsive">
                  <table class="table table-striped mt-3" id="basic-datatables">
                    <thead>
                      <tr>
                        <th scope="col">Admission #</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Guardian Name</th>
                        <th scope="col">Admission Date</th>
                        <th scope="col">Contact #</th>
                        <th scope="col">Batch</th>
                        <th scope="col">Course</th>
                        <th scope="col">{{ __('Actions') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($students as $student)
                        <tr>
                          <td>{{ $student->id }}</td>
                          <td>{{ $student->firstName }}</td>
                          <td>{{ $student->lastName }}</td>
                          <td>{{ $student->guardianName }}</td>
                          <td>{{ $student->admissionDate }}</td>
                          <td>{{ $student->contactNumber }}</td>
                          <td>{{ $student->batch }}</td>
                          <td>{{ $student->course }}</td>
                          <td>
                            <a class="btn btn-secondary btn-sm mr-1 editBtn" href="#" data-toggle="modal" data-target="#editModal" data-id="{{ $student->id }}" data-first-Name="{{ $student->firstName }}" data-last-Name="{{ $student->firstName }}" data-guardian-Name="{{ $student->guardianName }}" data-contact-Number="{{ $student->contactNumber }}">
                              <span class="btn-label">
                                <i class="fas fa-edit"></i>
                              </span>
                              {{ __('Edit') }}
                            </a>

                            <form class="deleteForm d-inline-block" action="{{ url('admin/batchesManagement/delete', ['id' => $student->id]) }}" method="post">
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
  @includeIf('backend.studentsManagement.create')

  {{-- edit modal --}}
  @includeIf('backend.studentsManagement.edit')
@endsection
