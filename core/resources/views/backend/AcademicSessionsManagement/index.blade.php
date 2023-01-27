@extends('backend.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">Academic Sessions Management</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="{{route('admin.dashboard')}}">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Academic Sessions Management</a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block">Academic Sessions</div>
          <a
            href="#"
            class="btn btn-sm btn-primary float-right"
            data-toggle="modal"
            data-target="#createModal"
          ><i class="fas fa-plus"></i> Add Session</a>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              @if (count($academicSessions) == 0)
                <h3 class="text-center">NO SESSION FOUND!</h3>
              @else
                <div class="table-responsive">
                  <table class="table table-striped mt-3">
                    <thead>
                      <tr>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Default</th>
                        <th scope="col">Description</th>
                        <th scope="col">{{ __('Actions') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($academicSessions as $academicSession)
                        <tr>
                          <td>{{ $academicSession->name }}</td>
                          <td>{{ $academicSession->code }}</td>
                          <td>{{ $academicSession->direction == 1 ? __('RTL') : __('LTR') }}</td>
                          <td>
                            @if ($academicSession->is_default == 1)
                              <strong class="badge badge-success">{{ __('Default') }}</strong>
                            @else
                              <form
                                class="d-inline-block"
                                action="{{ route('admin.languages.make_default_language', $academicSession->id) }}"
                                method="post"
                              >
                                @csrf
                                <button class="btn btn-primary btn-sm" type="submit" name="button">
                                  {{ __('Make Default') }}
                                </button>
                              </form>
                            @endif
                          </td>
                          <td>{{ $academicSession->name }}</td>
                          <td>
                            <a
                              href="#"
                              class="btn btn-secondary btn-sm mr-1 editBtn"
                              data-toggle="modal"
                              data-target="#editModal"
                              data-id="{{ $academicSession->id }}"
                              data-name="{{ $academicSession->name }}"
                              data-code="{{ $academicSession->code }}"
                              data-direction="{{ $academicSession->direction }}"
                            >
                              <span class="btn-label">
                                <i class="fas fa-edit"></i>
                              </span>
                              {{ __('Edit') }}
                            </a>

                            <a
                              class="btn btn-info btn-sm text-dark mr-1"
                              href="{{ route('admin.languages.edit_keyword', $academicSession->id) }}"
                            >
                              <span class="btn-label">
                                <i class="fas fa-edit"></i>
                              </span>
                              {{ __('Edit Keyword') }}
                            </a>

                            <form
                              class="deleteForm d-inline-block"
                              action="{{ route('admin.languages.delete_language', $academicSession->id) }}"
                              method="post"
                            >
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
      </div>
    </div>
  </div>

  {{-- create modal --}}
  @include('backend.AcademicSessionsManagement.create')

  {{-- edit modal --}}
  @include('backend.language.edit')
@endsection
