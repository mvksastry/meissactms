<div class="col-md-12">
  <div class="card card-outline card-success">
    <div class="card-header">
      <h3 class="card-title">Decisions</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
        </button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          {{ $enrObj->decision_comment }}
        </div>
        <div class="col-md-12">
          @if ($errors->any())
            <div class="text-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <table id="userIndex2" class="table table-sm table-bordered table-hover">
            <tdead>
              <tr>
                <th>
                  @hasrole('ctms_incharge')
                    CTMS In-charge: {{ Auth::user()->name }}
                  @endhasrole
                  @hasrole('director')
                    Director: {{ Auth::user()->name }}
                  @endhasrole
                </th>
              </tr>
              </thdead>
              <tbody>
                @hasrole('ctms_incharge')
                  <tr>
                    <td>
                      <label>Enrollment Comment</label>
                      <input wire:model.live="form_f.comment_decision" type="text" class="form-control"
                        placeholder="Patient Enrollment Comment">
                      </br>
                      @error('form_f.decision_comment')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="col-sm-6">
                        <!-- radio -->
                        <div class="form-group">
                          <div class="form-check">
                            <input wire:model.live="form_f.enrollment_decision" value="330" class="form-check-input"
                              type="radio" name="radio1">
                            <label class="form-check-label">Enrollment Aborted</label>
                          </div>
                          @php
                            //dd($go);
                          @endphp
                          @if ($go)
                            <div class="form-check">
                              <input wire:model.live="form_f.enrollment_decision" value="340" class="form-check-input"
                                type="radio" name="radio1">
                              <label class="form-check-label">Enrollment Complete</label>
                            </div>
                          @endif
                          </br>
                          @error('form_f.enrollment_decision')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <button wire:click="fnSaveEnrollmentDecision()"
                        class="btn btn-info text-white font-normal mt-3 rounded">COMPLETE ENROLLMENT</button>
                    </td>
                  </tr>
                @endhasrole
                @hasrole('director')
                  <tr>
                    <td>
                      <label>Enrollment Comment</label>
                      <input wire:model.live="form_f.comment_decision" type="text" class="form-control"
                        placeholder="Patient Enrollment Comment">
                      @error('form_f.decision_comment')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="col-sm-6">
                        <!-- radio -->
                        <div class="form-group">
                          <div class="form-check">
                            <input wire:model.live="form_f.enrollment_decision" value="330" class="form-check-input"
                              type="radio" name="radio1">
                            <label class="form-check-label">Enrollment Aborted</label>
                          </div>
                          @if ($go)
                            <div class="form-check">
                              <input wire:model.live="form_f.enrollment_decision" value="340" class="form-check-input"
                                type="radio" name="radio1">
                              <label class="form-check-label">Enrollment Complete</label>
                            </div>
                          @endif
                          </br>
                          @error('form_f.enrollment_decision')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <button wire:click="fnSaveEnrollmentDecision()"
                        class="btn btn-info text-white font-normal mt-3 rounded">COMPLETE ENROLLMENT</button>
                    </td>
                  </tr>
                @endhasrole
              </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
