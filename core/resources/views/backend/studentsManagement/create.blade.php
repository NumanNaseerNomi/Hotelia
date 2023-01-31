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
        <form id="ajaxForm" class="modal-form" action="{{ url('admin/batchesManagement/create') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="">First Name*</label>
                <input type="text" class="form-control" name="firstName" placeholder="Enter First Name">
                <p id="err_firstName" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Last Name*</label>
                <input type="text" class="form-control" name="lastName" placeholder="Enter Last Name">
                <p id="err_lastName" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>
            
            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Guardian Name*</label>
                <input type="text" class="form-control" name="guardianName" placeholder="Enter Guardian Name">
                <p id="err_guardianName" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Admission Date*</label>
                <input type="date" class="form-control" name="admissionDate">
                <p id="err_admissionDate" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Course*</label>
                <select class="form-control" name="courseId">
                  <option selected disabled>Select Course</option>
                  @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                  @endforeach
                </select>
                <p id="err_courseId" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Max Strength*</label>
                <input type="number" class="form-control" name="maxStrength" placeholder="Enter Max Strength" min="0">
                <p id="err_maxStrength" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Roll Number Prefix</label>
                <input type="number" class="form-control" name="rollNumberPrefix" placeholder="Enter Roll Number Prefix" min="0">
                <p id="err_rollNumberPrefix" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Start Date*</label>
                <input type="date" class="form-control" name="startDate">
                <p id="err_startDate" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">End Date*</label>
                <input type="date" class="form-control" name="endDate">
                <p id="err_endDate" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Location*</label>
                <input type="text" class="form-control" name="location" placeholder="Enter Location">
                <p id="err_location" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="description" rows="1" placeholder="Enter Description"></textarea>
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
