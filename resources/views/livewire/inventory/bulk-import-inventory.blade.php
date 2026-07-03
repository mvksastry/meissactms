<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    {{-- Care about people's approval and you will be their prisoner. --}}
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
 <main>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper px-2">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 mb-3">Inventory: Bulk Import</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/manage-inventory">Home: Inventory</a></li>
                <li class="breadcrumb-item active">Bulk Import</li>
              </ol>
            </div><!-- /.col -->

              @include('livewire.inventory.flex-menu-inventory')            

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      

      <!-- Main content -->
      <section id="top1" class="content">
        <div class="container-fluid">
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section id="top2" class="col-lg-12 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    INVENTORY BULK IMPORT: All Fields Mandatory
                  </h3>
                  <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item"></li>
                      <li class="nav-item"></li>
                    </ul>
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content p-0">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
                      <div class="p-1">
                        <div class="table-responsive" id="revenue-chart2" style="position: relative;">
                          <table id="example2" class="table table-sm table-bordered table-hover">
                            <thead>
                              <tr>
                                <th colspan="28">
                                  <label class="ml-3">
                                  Step-1 Instruction: Use the Excel template provided and fill all the columns as desired
                                  </label>
                                </br>
                                  <button wire:click="downloadBulkTemplate()" class="btn btn-success text-white font-normal py-2 px-4 mx-3  rounded">Download Template</button>
                                </th>
                              </tr>
                            </thead>
                            <tbody>     
                                <tr>
                                  <td colspan="28">
                                    <label class="ml-3">
                                        Step-2 Select Excel File for Upload* 
                                    </label>
                                  </br>
                                        <input type="file" class="form-control ml-3" placeholder="Upload File" wire:model.defer="inventoryExcel">
                                        @error('inventoryExcel') <span class="text-danger error">{{ $message }}</span>@enderror
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="28">
                                    <label class="ml-3">
                                        Step-3 Upload the File* 
                                    </label>
                                  </br>
                                    @hasanyrole('director')
                                        <button wire:click="processBulkInventoryUpload()" class="btn btn-success text-white font-normal py-2 px-4 mx-3  rounded">Upload Inventory</button>
                                    @endhasanyrole
                                  </td>
                                </tr>
                            </tbody>
                          </table>  
                         
                          
                        </div>
                      </div>
                      <!--Divider-->
                      <hr class="border-b-2 my-1 mx-1">
                      <!--Divider-->
                      <div class="p-1">      
                        @if($templatePanel)

                        @endif
                                  
                      </div>

                      <hr class="border-b-2 my-1 mx-1">
                      <!--Divider-->
                      <div class="p-1">      
                        @if($templatePanel)

                        @endif
                                  
                      </div>
                    </div>
                  </div>
                </div> <!-- /. card body end -->
              </div>
            </section>
          </div><!-- /.row (main row) -->
          <!-- Main row -->
          <div class="row">
            <!-- All Bottoms for show/hide based on status -->
            @if($finalizePanel)
            <section id="top2" class="col-lg-12 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    FINALIZE BULK IMPORT ENTRIES: All Fields Mandatory
                  </h3>
                  <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item"></li>
                      <li class="nav-item"></li>
                    </ul>
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content p-0">
                    <!-- Morris chart - Sales -->
                    <livewire:inventory.datatables.temporary-inventory-entries theme="bootstrap-4" />
                    <div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
                      <div class="p-1">
                        <div class="table-responsive" id="revenue-chart2" style="position: relative;">
                          <table id="example2" class="table table-sm table-bordered table-hover">
                            <thead>
                              <tr>
                                <th colspan="28">                                  
                                </th>
                              </tr>
                            </thead>
                            <tbody>                                    
                                <tr>
                                  <td colspan="28">
                                    <label class="ml-3">
                                        Step-4 Upload/Attach Product Specific CoA or Other Files 
                                    </label>
                                  </br>
                                    @hasanyrole('director')
                                        <button wire:click="deleteBulkEntries()" class="btn btn-danger text-white font-normal py-2 px-4 mx-3  rounded">DELETE ALL ENTRIES</button>
                                        <button wire:click="finalizeBulkInventoryUpload()" class="btn btn-success text-white font-normal py-2 px-4 mx-3  rounded">Finalize Inventory</button>
                                    @endhasanyrole
                                  </td>
                                </tr>
                                
                            </tbody>
                          </table>  
                        </div>
                      </div>
                      <!--Divider-->
                      <hr class="border-b-2 my-1 mx-1">
                      <!--Divider-->
                      <div class="p-1">      
                                  
                      </div>

                      <hr class="border-b-2 my-1 mx-1">
                      <!--Divider-->
                      <div class="p-1">      
                                 
                      </div>
                    </div>
                  </div>
                </div> <!-- /. card body end -->
              </div>
            </section>
            <!-- /All Bottoms for show/hide based on status -->
            @endif
          </div><!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
    </div>
  </main>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button wire:click="respondToSaveChanges()" type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModalOld" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Details of Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Product ID: {{ $tempproduct_id }}
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button wire:click="respondToSaveChanges()" type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

      <div wire:ignore.self id="exampleModal2" class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            @if($pObj != null)
              <div class="modal-header">
                  
                  <h4 class="modal-title">Details of Entry ID: {{ $pObj->temp_product_id }}</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <tr>
                    <th colspan="6">
                      <!-- Validation Errors -->
                        @if($errors->any())
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
                      <td>
                        <label>Pack Mark Code</label>
                        <input wire:model="form.pack_mark_code" type="text" class="form-control input-sm">
                          @error('form.pack_mark_code')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label>Category*</label>
                        <input wire:model="form.category_id" type="text" class="form-control input-sm"  >
                          @error('form.category_id')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label>Gen./Patient Link*</label>
                        <select wire:model="form.resproject_id" type="text" class="form-control input-sm">
                          <option value="-1">Select</option>
                          <option value="0">General</option>
                        </select>
                        @error('form.resproject_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                      <td>
                        <label>Grade*</label>
                          <select wire:model="form.grade" type="text" class="form-control input-sm">
                          <option value="-1">Select</option>
                            <option value="CT">Clinical Trial</option>
                            <option value="RG">Research Grade</option>
                            <option value="MG">Misc. Grade</option>
                          </select>
                          @error('form.grade')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label>Status: Open/Unopened</label>
                        </br>
                        {{ $pObj->status_open_unopened }}
                      </td>
                      <td>
                        <label>Status Date</label>
                        </br>
                        {{ $pObj->status_date }}
                      </td>
                    </tr>

                    <tr>
                      <td colspan="6"> 
                        <label>Product Information*</label>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <label>Catalog Num*</label>
                        <input wire:model="form.catalog_id" type="text" class="form-control">
                          @error('form.catalog_id')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label>Name*</label>
                        <input wire:model.defer="form.name" type="text" class="form-control">
                          @error('form.name')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label>Pack Size</label>
                        <input wire:model="form.pack_size" type="text" class="form-control">
                        @error('form.pack_size')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                      <td>
                        <label>Unit Desc</label>
                          <select wire:model="form.unit_id" type="text" class="form-control">
                            <option value="-1">Select</option>
                            @foreach($units as $row)
                            <option value="{{ $row->unit_id }}">{{ $row->description }}</option>
                            @endforeach
                          </select>
                          @error('form.unit_id')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </td>
                      <td>
                        <label class="text-danger">Num Packs</label>
                        <input wire:model="form.num_packs" type="text" class="form-control bg-gradient" border-color="#E6E6FA">
                        @error('form.num_packs')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>

                      <td>
                        <label>Vendor</label>
                        <select wire:model="form.supplier_id" type="text" class="form-control">
                          <option value="-1">Select</option>
                          <option value="1">Some Company</option>
                        </select>
                        @error('form.supplier_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <label>Batch Code</label>
                        <input wire:model="form.batch_code" type="text" class="form-control">
                        @error('form.batch_code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                      <td>
                        <label>Unit Cost</label>
                        <input wire:model="form.vial_cost" type="text" class="form-control">
                          @error('form.vial_cost')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label for="bulkcode">Currency</label>
                        <select wire:model="form.item_currency" type="select" class="custom-select rounded-0">
                          <option value="-1">Select</option> 
                          @foreach($currencies as $row)
                          <option value="{{ $row->currency_id }}">{{ $row->description }}</option>
                          @endforeach           
                        </select>
                        @error('form.item_currency')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                      <td>
                        <label>Item Cost</label>
                        <input wire:model="form.item_cost" type="text" class="form-control" >
                          @error('form.item_cost')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label>Date MFD</label>
                          <input wire:model="form.mfd_date" type="date" class="form-control">
                          @error('form.mfd_date')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      
                      <td>
                        <label>Expiry date</label>
                        <input wire:model="form.expiry_date" type="date" class="form-control">
                          @error('form.expiry_date')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                    </tr>
                    
                    <tr>
                      <td colspan="6"> 
                        <label>Storage Information*</label>
                      </td>
                    </tr>
                    
                    <tr>
                      <td>
                        <label  for="username">Container*</label>
                        
                          <select wire:model="form.storage_container_id" type="date" class="form-control">
                            <option value="-1">Select</option>
                            <option value="1">Some Container</option>
                          </select>
                          @error('form.storage_container_id')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label>Comp ID*</label>
                        <input size="15" wire:model="form.shelf_rack_id" type="text" class="form-control">
                          @error('form.shelf_rack_id')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label>Box/SackID*</label>
                        <input size="15" wire:model="form.box_id" value="{{ $pObj->box_id }}" type="text" class="form-control">
                          @error('form.box_id')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label>LocationID</label>
                        <input wire:model="form.box_position_id" type="text" class="form-control">
                          @error('form.box_position_id')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label>Open Storage</label>
                        <input wire:model="form.open_storage" type="text" class="form-control">
                          @error('form.open_storage')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                    </tr>
                    
                    <tr>
                      <td colspan="3">
                        <label>Notes, If any</label>
                        <input wire:model.defer="form.notes" type="text" class="form-control" >
                          @error('form.notes')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td colspan="3">
                        <label>Upload CoA File</label>
                        <input wire:model.defer="product_coa" type="file"  class="form-control" placeholder="Report File" > 
                          @error('product_coa')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                    </tr>
                  </tbody>    
                </table>	
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- button wire:click="uploadCoAFile()" class="btn btn-info text-white font-normal rounded">Upload FIle</button> -->
                <button wire:click="updateProductInfo()" type="button" class="btn btn-primary">Save changes</button>
              </div>
            @endif
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
</div>
@script
  <script>
    $(document).ready(function () {
      window.addEventListener('swal:confirm', function(msgx){ 
        let title = JSON.stringify(msgx.detail);
        let tarr = JSON.parse(title);
        let finres = tarr[0].title;
        console.log(finres);
        //alert(result);
        var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
        });
        Toast.fire({
            icon: 'info',
            title: finres,
        });
        /*
        Swal.fire({
            title:  '{{ $message }}',
            icon: "info",
            iconColor: "danger",
            timer: 3000,
            toast: true,
            position: 'top-right',
            toast:  true,
            showConfirmButton:  false,
        });
        Swal.fire({
            icon: "question",
            title: "{{__('Are you sure?')}}",
            showCancelButton: true,
            confirmButtonText: "{{__('Delete')}}",
            cancelButtonText: "{{__('Cancel')}}",
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch("groupDelete");
            }
        });
        */
      });

      window.addEventListener('closeProductModal', function(msg){ 
        //alert("reached");
        $('#exampleModal2').modal('hide'); 
      }); 
    

      window.addEventListener('swal:warning', function(msgx1){ 
        let title = JSON.stringify(msgx1.detail);
        let tarr = JSON.parse(title);
        let finres1 = tarr[0].title;
        console.log(finres1);
        //alert(finres1);
        var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
        });
        Toast.fire({
            icon: 'warning',
            title: finres1,
        });
        /*
        Swal.fire({
            title:  '{{ $message }}',
            icon: "info",
            iconColor: "danger",
            timer: 3000,
            toast: true,
            position: 'top-right',
            toast:  true,
            showConfirmButton:  false,
        });
        Swal.fire({
            icon: "question",
            title: "{{__('Are you sure?')}}",
            showCancelButton: true,
            confirmButtonText: "{{__('Delete')}}",
            cancelButtonText: "{{__('Cancel')}}",
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch("groupDelete");
            }
        });
        */
      });

      window.addEventListener("openModaljs", function(data){
        /*
        //alert("reached");
        let idx = JSON.stringify(data.detail);
        let tarr = JSON.parse(idx);
        let result = null;
        for (let i = 0; i < tarr.length; i++) 
        {
            result = tarr[0];
            let finres = result.data;
            console.log(finres);
        }
        let finres = result.data;
        alert(finres);
        */
        $("#modal-lg").modal('show');
      });

      window.addEventListener("dataTableInit", function(){    
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
      });
    });
  </script>
@endscript
