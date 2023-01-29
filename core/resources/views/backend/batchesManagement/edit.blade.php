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
        <form id="ajaxEditForm" class="modal-form" action="{{ url('admin/roomsManagement/update') }}" method="post">
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
                <label for="">Course*</label>
                <select class="form-control" name="courseId" id="in_course" selected="in_course">
                  @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                  @endforeach
                </select>
                <p id="editErr_buildingId" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Max Strength</label>
                <input type="number" id="in_maxStrength" class="form-control" name="maxStrength" placeholder="Enter Max Strength">
                <p id="editErr_maxStrength" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Building*</label>
                <select class="form-control" name="buildingId" id="in_building" selected="in_building">
                  @foreach($buildings as $building)
                    <option value="{{ $building->id }}">{{ $building->name }}</option>
                  @endforeach
                </select>
                <p id="editErr_buildingId" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Floor*</label>
                <select class="form-control" name="floor" id="in_floor" selected="in_floor">
                  @foreach(range(1, 10) as $floor)
                    <option value="{{ $floor }}">{{ $floor }}</option>
                  @endforeach
                </select>
                <p id="editErr_floor" class="mt-2 mb-0 text-danger em"></p>
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
