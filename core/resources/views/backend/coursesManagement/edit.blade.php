<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="ajaxEditForm" class="modal-form" action="{{ url('admin/coursesManagement/update') }}" method="post">
          @csrf
          <input type="hidden" id="in_id" name="id">
          <div class="row no-gutters">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="">{{ __('Name') . '*' }}</label>
                <input type="text" id="in_name" class="form-control" name="name" placeholder="Enter Name">
                <p id="editErr_name" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Group</label>
                <input type="text" id="in_group" class="form-control" name="group" placeholder="Enter Group">
                <p id="editErr_group" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Enable Registration</label>
                <select class="form-control" name="isRegistrationEnabled" id="in_isRegistrationEnabled" selected="in_isRegistrationEnabled">
                  <option value="0" selected>No</option>
                  <option value="1">Yes</option>
                </select>
                <p id="editErr_isRegistrationEnabled" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Registration Fee</label>
                <input type="text" id="in_registrationFee" class="form-control" name="registrationFee" placeholder="Enter Registration Fee">
                <p id="editErr_registrationFee" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>
            
            <div class="col">
              <div class="form-group">
                <label for="">Description</label>
                <textarea id="in_description" class="form-control" name="description" rows="4" placeholder="Enter Description"></textarea>
              </div>
            </div>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          {{ __('Close') }}
        </button>
        <button id="updateBtn" type="button" class="btn btn-primary btn-sm">
          {{ __('Update') }}
        </button>
      </div>
    </div>
  </div>
</div>
