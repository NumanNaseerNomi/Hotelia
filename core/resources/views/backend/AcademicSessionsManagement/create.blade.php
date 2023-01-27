<div
  class="modal fade"
  id="createModal"
  tabindex="-1"
  role="dialog"
  aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true"
>
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Session</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="ajaxForm" action="{{ url('/admin/academicSessionsManagement/create') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="">{{ __('Name*') }}</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Session Name">
            <p id="err_name" class="mb-0 text-danger em"></p>
          </div>
          <div class="form-group">
            <label for="">Start Date*</label>
            <input type="date" class="form-control" name="startDate" placeholder="Enter Start Date">
            <p id="err_startDate" class="mb-0 text-danger em"></p>
          </div>
          <div class="form-group">
            <label for="">End Date*</label>
            <input type="date" class="form-control" name="endDate" placeholder="Enter End Date">
            <p id="err_endDate" class="mb-0 text-danger em"></p>
          </div>
          <div class="form-group">
            <label for="">Description</label>
            <textarea class="form-control" name="description" rows="4" placeholder="Enter Description"></textarea>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          {{ __('Close') }}
        </button>
        <button id="submitBtn" type="button" class="btn btn-primary">
          {{ __('Submit') }}
        </button>
      </div>
    </div>
  </div>
</div>
