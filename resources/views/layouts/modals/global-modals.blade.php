      <div id="eventModal1" class="modal fade" id="modal-md">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <form method="POST" action="{{ route('calendar-events.store') }}">
              @csrf
              <div class="modal-header">

                <h4 class="modal-title">Details of New Event</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <tr>
                    <th colspan="6">
                      <!-- Validation Errors -->
                      @if ($errors->any())
                        <div class="alert alert-danger">
                          <ul class="mb-0">
                            @foreach ($errors->all() as $err)
                              <li>{{ $err }}</li>
                            @endforeach
                          </ul>
                        </div>
                      @endif
                    </th>
                  </tr>
                  <tbody>
                    <tr>
                      <td colspan="3">
                        <label>Event title</label>
                        <input id="title" name="title" type="text" class="form-control input-sm">
                        @error('form.pack_mark_code')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <label>Description</label>
                        <input id="description" name="description" type="text" class="form-control input-sm">
                        @error('form.pack_mark_code')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Start Date</label>
                        <input id="start_date" name="start_date" type="date" class="form-control input-sm">
                      </td>
                      <td>
                        <label>Status Hour</label>
                        <input id="start_hour" name="start_hour" type="text" class="form-control input-sm">
                      </td>
                      <td>
                        <label>Status Min</label>
                        <input id="start_min" name="start_min" type="text" class="form-control input-sm">
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <label>End Date</label>
                        <input id="end_date" name="end_date" type="date" class="form-control input-sm">
                      </td>
                      <td>
                        <label>End Hour</label>
                        <input id="end_hour" name="end_hour" type="text" class="form-control input-sm">
                      </td>
                      <td>
                        <label>End Min</label>
                        <input id="end_min" name="end_min" type="text" class="form-control input-sm">
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <label>Resource</label>
                        <input id="resource_id" name="resource_id" type="text" value="0"
                          class="form-control input-sm">
                      </td>
                      <td>
                        <label>Priority</label>
                        <input id="priority" name="priority" type="text" class="form-control input-sm">
                      </td>
                      <td>
                        <label>Posted By</label>
                        <input id="created_by" name="created_by" type="text" class="form-control input-sm">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- button wire:click="uploadCoAFile()" class="btn btn-info text-white font-normal rounded">Upload FIle</button> -->
                <button wire:submit.prevent="updateEventInfo()" type="submit" class="btn btn-primary">Save
                  changes</button>
              </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
