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
        <form id="ajaxEditForm" class="modal-form" action="{{ url('admin/batchesManagement/update') }}" method="post">
          @csrf
          <input type="hidden" id="in_id" name="id">
          <div class="row no-gutters">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="">First Name*</label>
                <input type="text" id="in_firstName" class="form-control" name="firstName" placeholder="Enter First Name">
                <p id="editErr_firstName" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">First Last Name*</label>
                <input type="text" id="in_lastName" class="form-control" name="lastName" placeholder="Enter Last Name">
                <p id="editErr_lastName" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Guardian Name*</label>
                <input type="text" id="in_guardianName" class="form-control" name="guardianName" placeholder="Enter Guardian Name">
                <p id="editErr_guardianName" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Contact Number*</label>
                <input type="text" id="in_contact" class="form-control" name="contact" placeholder="Enter Contact Number">
                <p id="editErr_contact" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Batch*</label>
                <select class="form-control" name="batchId" id="in_batch" selected="in_batch">
                  @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                  @endforeach
                </select>
                <p id="editErr_batchId" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Course*</label>
                <select class="form-control" name="courseId" id="in_course" selected="in_course">
                  @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                  @endforeach
                </select>
                <p id="editErr_courseId" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>
<!-- 
            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Roll Number Prefix*</label>
                <input type="number" id="in_rollNumberPrefix" class="form-control" name="rollNumberPrefix" placeholder="Enter Roll Number Prefix">
                <p id="editErr_rollNumberPrefix" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Start Date*</label>
                <input type="date" id="in_startDate" class="form-control" name="startDate" placeholder="Enter Start Date">
                <p id="editErr_startDate" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">End Date*</label>
                <input type="date" id="in_endDate" class="form-control" name="endDate" placeholder="Enter End Date">
                <p id="editErr_endDate" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Location*</label>
                <input type="text" id="in_location" class="form-control" name="location" placeholder="Enter Location">
                <p id="editErr_location" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>
            
            <div class="col">
              <div class="form-group">
                <label for="">Description</label>
                <textarea id="in_description" class="form-control" name="description" rows="1" placeholder="Enter Description"></textarea>
              </div>
            </div> -->
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
