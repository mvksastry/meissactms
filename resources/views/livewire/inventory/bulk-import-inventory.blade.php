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
                              @hasanyrole('ctms_admin|director')
                              <tr>
                                <th>
                                  <label class="ml-3">
                                  Step-0 Instruction: Use the Excel template provided and fill all the columns as desired
                                  </label>
                                    </br>
                                    <input type="file" class="form-control ml-3" placeholder="Upload File" wire:model.defer="uploadExceltemplate">
                                    @error('uploadExceltemplate') <span class="text-danger error">{{ $message }}</span>@enderror
                                  <button wire:click="uploadBulkTemplate()" class="btn btn-success text-white font-normal py-2 px-4 mx-3  rounded">Upload Excel Template</button>
                                </th>
                              </tr>
                              @endhasanyrole
                            </thead>
                            <tbody>     
                              <tr>
                                <td>
                                  <label class="ml-3">
                                  Step-1 Instruction: Use the Excel template provided and fill all the columns as desired
                                  </label>
                                  </br>
                                  <button wire:click="downloadBulkTemplate()" class="btn btn-success text-white font-normal py-2 px-4 mx-3  rounded">Download Template</button>
                                </td>
                              </tr>


                                <tr>
                                  <td>
                                    <label class="ml-3">
                                        Step-2 Select Excel File for Upload* 
                                    </label>
                                  </br>
                                        <input type="file" class="form-control ml-3" placeholder="Upload File" wire:model.defer="inventoryExcel">
                                        @error('inventoryExcel') <span class="text-danger error">{{ $message }}</span>@enderror
                                  </td>
                                </tr>
                                <tr>
                                  <td>
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
                                        Step-4 Upload/Attach Product Specific CoA or Other Files by clicking left most "View" button
                                    </label>
                                    <label class="ml-3">
                                      Step-5: Once all CoA attached to prducts, process all the remaining in the table by clicking the "Finalize Button" belos. 
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
  @include('livewire.inventory.modals.productModalAtImport')
</div>
@script
  <script>
    $(document).ready(function () {
      window.addEventListener('swal:confirm', function(msgx){ 
        let title = JSON.stringify(msgx.detail);
        let tarr = JSON.parse(title);
        let finres = tarr[0].title;
        //console.log(finres);
        //alert(result);
        
        /*
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

        Toast.fire({
          icon: 'question',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
        
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
        alert(msgx);
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
