@extends('backend.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">Buildings</h4>
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
        <a href="#">{{ __('Rooms Management') }}</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Buildings</a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-8">
              <div class="card-title d-inline-block">Buildings</div>
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
              @if (count($coupons) == 0)
                <h3 class="text-center mt-2">{{ __('NO COUPON FOUND') . '!' }}</h3>
              @else
                <div class="table-responsive">
                  <table class="table table-striped mt-3" id="basic-datatables">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">Location</th>
                        <th scope="col">Description</th>
                        <th scope="col">{{ __('Actions') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($coupons as $coupon)
                        @php
                          $todayDate = Carbon\Carbon::now();
                          $startDate = Carbon\Carbon::parse($coupon->start_date);
                          $endDate = Carbon\Carbon::parse($coupon->end_date);
                        @endphp

                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $coupon->code }}</td>
                          <td>{{ $coupon->code }}</td>
                          <td>{{ $coupon->code }}</td>
                          <td>
                            <a class="btn btn-secondary btn-sm mr-1 editBtn" href="#" data-toggle="modal" data-target="#editModal" data-id="{{ $coupon->id }}" data-name="{{ $coupon->name }}" data-code="{{ $coupon->code }}" data-type="{{ $coupon->type }}" data-value="{{ $coupon->value }}" data-start_date="{{ date_format($startDate, 'm/d/Y') }}" data-end_date="{{ date_format($endDate, 'm/d/Y') }}" data-serial_number="{{ $coupon->serial_number }}" data-rooms="{{ empty($coupon->rooms) ? '' : $coupon->rooms }}">
                              <span class="btn-label">
                                <i class="fas fa-edit"></i>
                              </span>
                              {{ __('Edit') }}
                            </a>

                            <form class="deleteForm d-inline-block" action="{{ route('admin.rooms_management.delete_coupon', ['id' => $coupon->id]) }}" method="post">
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
  @includeIf('backend.rooms.create_coupon')

  {{-- edit modal --}}
  @includeIf('backend.rooms.edit_coupon')
@endsection
