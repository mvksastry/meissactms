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
              Home Drug Categories
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
                <button wire:click="fnNewCategory()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp New Category</button>
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
           
            @if($p1)
              <div class="row">
                <label class="form-class" for="sampdesc">Add New Category</label>
                </br>
                
                @if(!empty($drug_categories))
                  <table id="userIndex2" class="table table-sm table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>
                          Name
                        </th>
                        <th>
                          Description
                        </th>
                        <th>
                          Posted By
                        </th>
                        <th>
                          Created At
                        </th>
                        <th>
                          Updated At
                        </th>
                      </tr>
                    </thead>
                    <tbody> 
                      @foreach($drug_categories as $row)
                      <tr>
                        <td>
                          {{ $row->category_name }}
                        </td>
                        <td>
                          {{ $row->description }}
                        </td>
                        <td>
                          {{  $row->posted_by }}
                        </td>
                        <td>
                          {{ $row->created_at }}
                        </td>
                        <td>
                          {{ $row->updated_at }}
                        </td>
                      </tr>   
                      @endforeach                                                
                    </tbody>
                  </table>
                @endif

                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <thead>
                  </thead>
                  <tbody> 
                    <tr>
                      <td colspan="4">
                        <label>Name*</label>
                        <input wire:model="ncDCat.name" type="text" class="form-control" placeholder="Category Name">
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4">
                        <label>Description*</label>
                        <input wire:model="ncDCat.desc" type="text" class="form-control" placeholder="Description">
                      </td>
                    </tr>                                                    
                  </tbody>
                </table>
                  <div class="col-sm-6 col-md-4">
                    <button wire:click="fnCreateNewCategory()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp Create Category</button>
                  </div>
              </div>
            @endif

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- START ALERTS AND CALLOUTS -->
        <!-- /.content-wrapper -->
</div>
