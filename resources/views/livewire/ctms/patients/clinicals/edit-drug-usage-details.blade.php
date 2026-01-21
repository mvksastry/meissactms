<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    {{-- In work, do what you enjoy. --}}
    {{-- The whole world belongs to you. --}}
    <!-- Content Wrapper. Contains page content -->
    <!-- COLOR PALETTE -->

        <div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-tag"></i>
              Home Drugs Usage
            </h3>
          </div>
          <div class="card-body">
            @if($sys_panel)
              @include('livewire.eac_sys_panel')
            @endif
            @if($msg_panel)
              @include('livewire.eac_msg_panel')
            @endif
            <!-- /.col-12 -->
            <!-- /.col-12 -->
            <div class="row">            
              <div class="col-sm-4 col-md-2">
                <button wire:click="fnNewDetailEntry()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp New DRUG DETAIL</button>
              </div>
            </div>
            <!-- /.row -->
            <!--Divider-->
            <hr class="border-b-2 border-warning my-2 mx-2">
            <!--Divider-->
            
            <div class="row">
              <label class="form-class" for="sampdesc">List of Drugs Consumed</label>
                </br>
                @if(count($drug_details) > 0)
                  <table id="userIndex2" class="table table-sm table-bordered table-hover">
                    <thead>
                      <tr>
                          <th>Cat ID</th>
                          <th>Name</th>
                          <th>Brand</th>
                          <th>Class</th>
                          <th>Generic Name</th>
                          <th>Single Dose</th>
                          <th>Frequency</th> 
                          <th>Total Daily Dose</th>                      
                      </tr>
                    </thead>
                    <tbody> 
                      @foreach($drug_details as $row)
                        <tr>
                            <td>{{ $row->category_id }}</td>
                            <td>{{ $row->drug_name  }}</td>
                            <td>{{ $row->brand }}</td>
                            <td>{{ $row->drug_class }}</td>
                            <td>{{ $row->generic_name }}</td>
                            <td>{{ $row->single_dose }}</td>
                            <td>{{ $row->frequency }}</td>
                            <td>{{ $row->total_daily_dose }}</td>
                        </tr>  
                      @endforeach                         
                    </tbody>
                  </table>
                @else
                  <table id="userIndex2" class="table table-sm table-bordered table-hover">
                    <tbody>
                      <tr>
                        <td>
                          <code>Drug Usage Details Not Found</code>
                        </td>
                      </tr>
                    </tbody>
                  </table>          
                @endif
            </div>

            <hr class="border-b-2 border-warning my-2 mx-2">

            
              @if(count($c15Obj) > 0)  
                <div class="row">
                  <label class="form-class" for="sampdesc">Edit Drug Details</label>
                  </br>
                  <table id="userIndex2" class="table table-sm table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>
                          Details
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($c15Obj as $key => $row)
                      <tr>
                        <td>
                          <label>Patient Uuid*</label>
                          <input wire:model="nDDetForm.{{ $key }}.patient_uuid" type="text" class="form-control" placeholder="OPD ID">
                        </td>
                        <td>
                          <label>Drug Detail ID*</label>
                          <input wire:model="nDDetForm.{{ $key }}.drug_detail_id" type="text" class="form-control" placeholder="In Patient ID">
                        </td>
                        <td>
                          <label>Entered By*</label>
                          <input wire:model="nDDetForm.{{ $key }}.entered_by" type="text" class="form-control" placeholder="Admission Date">
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <label>OPD ID*</label>
                          <input wire:model="nDDetForm.{{ $key }}.opd_id" type="text" class="form-control" placeholder="OPD ID">
                        </td>
                        <td>
                          <label>In-Patient ID*</label>
                          <input wire:model="nDDetForm.{{ $key }}.in_patient_id" type="text" class="form-control" placeholder="In Patient ID">
                        </td>
                        <td>
                          <label>Admission Date*</label>
                          <input wire:model="nDDetForm.{{ $key }}.admission_date" type="date" class="form-control" placeholder="Admission Date">
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <label for="">Drug Category</label>
                            <select class="custom-select rounded-0" wire:model="nDDetForm.{{ $key }}.category_id">
                              <option value="-1">Select</option>
                              @foreach($dCats as $row)
                              <option value="{{ $row->drug_category_id }}">{{ $row->category_name }}</option>
                              @endforeach
                            </select>
                            @error('cat_id')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                        <td>
                          <label>Name*</label>
                          <input wire:model="nDDetForm.{{ $key }}.drug_name" type="text" class="form-control" placeholder="Category Name">
                        </td>
                        <td>
                          <label>Brand*</label>
                          <input wire:model="nDDetForm.{{ $key }}.brand" type="text" class="form-control" placeholder="Description">
                        </td>
                      </tr>
                      
                      <tr>
                        <td>
                          <label>Class*</label>
                          <input wire:model="nDDetForm.{{ $key }}.drug_class" type="text" class="form-control" placeholder="Description">
                        </td>

                        <td>
                          <label>Generic Name*</label>
                          <input wire:model="nDDetForm.{{ $key }}.generic_name" type="text" class="form-control" placeholder="Description">
                        </td>

                        <td>
                          <label>Single Dose*</label>
                          <input wire:model="nDDetForm.{{ $key }}.single_dose" type="text" class="form-control" placeholder="Description">
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <label>Frequency*</label>
                          <input wire:model="nDDetForm.{{ $key }}.frequency" type="text" class="form-control" placeholder="Description">
                        </td>

                        <td>
                          <label>Total Daily Dose*</label>
                          <input wire:model="nDDetForm.{{ $key }}.total_daily_dose" type="text" class="form-control" placeholder="Description">
                        </td>

                        <td>
                          <label>Last Week Adherance*</label>
                          <input wire:model="nDDetForm.{{ $key }}.last_week_adherance" type="text" class="form-control" placeholder="Description">
                        </td>
                      </tr>  

                      <tr>
                        <td colspan="3">
                          <label>Comment</label>
                          <input wire:model="nDDetForm.{{ $key }}.comment_entered_by" type="text" class="form-control" placeholder="Description">
                        </td>
                      </tr>  
                      <tr class="table-warning">
                        <td colspan="3">
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>          
                    <div class="col-sm-6 col-md-4">
                      <button wire:click="fnEditDrugDetail()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp EDIT DRUG DETAIL</button>
                    </div>
                </div>
              @endif
          

            
              <div class="row">
                <label class="form-class" for="sampdesc">New Drug Detail</label>
                </br>
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>
                        Details
                      </th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td>
                        <label>OPD ID</label>
                        <input wire:model="NnDDetForm.opd_id" type="text" class="form-control" placeholder="OPD ID">
                      </td>
                      <td>
                        <label>In-Patient ID</label>
                        <input wire:model="NnDDetForm.in_patient_id" type="text" class="form-control" placeholder="In Patient ID">
                      </td>
                      <td>
                        <label>Admission Date</label>
                        <input wire:model="NnDDetForm.admission_date" type="date" class="form-control" placeholder="Admission Date">
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <label for="">Drug Category</label>
                          <select class="custom-select rounded-0" wire:model="NnDDetForm.cat_id">
                            <option value="-1">Select</option>
                            @foreach($drug_categories as $row)
                            <option value="{{ $row->drug_category_id }}">{{ $row->category_name }}</option>
                            @endforeach
                          </select>
                          @error('cat_id')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label>Name</label>
                        <input wire:model="NnDDetForm.name" type="text" class="form-control" placeholder="Category Name">
                      </td>
                      <td>
                        <label>Brand</label>
                        <input wire:model="NnDDetForm.brand" type="text" class="form-control" placeholder="Description">
                      </td>
                    </tr>
                    
                    <tr>
                      <td>
                        <label>Class</label>
                        <input wire:model="NnDDetForm.class" type="text" class="form-control" placeholder="Description">
                      </td>

                      <td>
                        <label>Generic Name</label>
                        <input wire:model="NnDDetForm.generic_name" type="text" class="form-control" placeholder="Description">
                      </td>

                      <td>
                        <label>Single Dose</label>
                        <input wire:model="NnDDetForm.single_dose" type="text" class="form-control" placeholder="Description">
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <label>Frequency</label>
                        <input wire:model="NnDDetForm.frequency" type="text" class="form-control" placeholder="Description">
                      </td>

                      <td>
                        <label>Total Daily Dose</label>
                        <input wire:model="NnDDetForm.tdd" type="text" class="form-control" placeholder="Description">
                      </td>

                      <td>
                        <label>Last Week Adherance</label>
                        <input wire:model="NnDDetForm.lwa" type="text" class="form-control" placeholder="Description">
                      </td>
                    </tr>  

                    <tr>
                      <td colspan="3">
                        <label>Comment</label>
                        <input wire:model="NnDDetForm.comment_entered_by" type="text" class="form-control" placeholder="Description">
                      </td>
                    </tr>  

                  </tbody>
                </table>               
                  <div class="col-sm-6 col-md-4">
                    <button wire:click="fnAddNewDrugDetail()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp ADD DRUG DETAIL</button>
                  </div>
              </div>
          


          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- START ALERTS AND CALLOUTS -->
        <!-- /.content-wrapper -->
</div>
