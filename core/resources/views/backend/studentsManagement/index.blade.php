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
              @if (count($batches) == 0)
                <h3 class="text-center mt-2">NO STUDENTS FOUND</h3>
              @else
                <div class="table-responsive">
                  <table class="table table-striped mt-3" id="basic-datatables">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">Course</th>
                        <th scope="col">Max Strength</th>
                        <th scope="col">Current Strength</th>
                        <th scope="col">Roll Number Prefix</th>
                        <th scope="col">Location</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Description</th>
                        <th scope="col">{{ __('Actions') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($batches as $batch)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $batch->name }}</td>
                          <td>{{ $batch->getCourse->name }}</td>
                          <td>{{ $batch->maxStrength }}</td>
                          <td></td>
                          <td>{{ $batch->rollNumberPrefix }}</td>
                          <td>{{ $batch->location }}</td>
                          <td>{{ $batch->startDate }}</td>
                          <td>{{ $batch->endDate }}</td>
                          <td>{{ $batch->description }}</td>
                          <td>
                            <a class="btn btn-secondary btn-sm mr-1 editBtn" href="#" data-toggle="modal" data-target="#editModal" data-id="{{ $batch->id }}" data-name="{{ $batch->name }}" data-course="{{ $batch->getCourse->id }}" data-max-strength="{{ $batch->maxStrength }}" data-roll-Number-Prefix="{{ $batch->rollNumberPrefix }}" data-start-Date="{{ $batch->startDate }}" data-end-Date="{{ $batch->endDate }}" data-location="{{ $batch->location }}" data-description="{{ $batch->description }}">
                              <span class="btn-label">
                                <i class="fas fa-edit"></i>
                              </span>
                              {{ __('Edit') }}
                            </a>

                            <form class="deleteForm d-inline-block" action="{{ url('admin/batchesManagement/delete', ['id' => $batch->id]) }}" method="post">
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
  @includeIf('backend.batchesManagement.create')

  {{-- edit modal --}}
  @includeIf('backend.batchesManagement.edit')
@endsection
