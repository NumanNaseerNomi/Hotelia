<div
  class="modal fade"
  id="editModal"
  tabindex="-1"
  role="dialog"
  aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true"
>
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Session</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="ajaxEditForm" action="{{ route('admin.languages.update_language') }}" method="POST">
          @csrf
          <input type="hidden" id="in_id" name="id">
          <div class="form-group">
            <label for="">{{ __('Name*') }}</label>
            <input id="in_name" type="text" class="form-control" name="name" placeholder="Enter Session Name">
            <p id="editErr_name" class="mb-0 text-danger em"></p>
          </div>
          <div class="form-group">
            <label for="">Start Date*</label>
            <input id="in_startDate" type="text" class="form-control" name="startDate" placeholder="Enter Start Date">
            <p id="editErr_startDate" class="mb-0 text-danger em"></p>
          </div>
          <div class="form-group">
            <label for="">End Date*</label>
            <input id="in_endDate" type="text" class="form-control" name="endDate" placeholder="Enter End Date">
            <p id="editErr_endDate" class="mb-0 text-danger em"></p>
          </div>
          <div class="form-group">
            <label for="">Description</label>
            <input id="in_description" type="text" class="form-control" name="description" placeholder="Enter Description">
            <p id="editErr_description" class="mb-0 text-danger em"></p>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          {{ __('Close') }}
        </button>
        <button id="updateBtn" type="button" class="btn btn-primary">
          {{ __('Update') }}
        </button>
      </div>
    </div>
  </div>
</div>
