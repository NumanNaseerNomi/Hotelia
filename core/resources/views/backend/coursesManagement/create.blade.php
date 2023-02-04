<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="ajaxForm" class="modal-form" action="{{ url('admin/coursesManagement/create') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="">{{ __('Name') . '*' }}</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name">
                <p id="err_name" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Course Group</label>
                <input type="text" class="form-control" name="group" placeholder="Enter Type">
                <p id="err_group" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Enable Registration</label>
                <select class="form-control" name="isRegistrationEnabled">
                  <option value="0" selected>No</option>
                  <option value="1">Yes</option>
                </select>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Registration Fee</label>
                <input type="text" class="form-control" name="registrationFee" placeholder="Enter Registration Fee">
                <p id="err_registrationFee" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="description" rows="4" placeholder="Enter Description"></textarea>
              </div>
            </div>

          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          {{ __('Close') }}
        </button>
        <button id="submitBtn" type="button" class="btn btn-primary btn-sm">
          {{ __('Save') }}
        </button>
      </div>
    </div>
  </div>
</div>
