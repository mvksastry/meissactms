    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Modified Pfirmann’s Grade
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <!--
                      <li class="nav-item">
                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                      </li>
                    -->
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="row">
                    <div class="col-6">
                      <div class="card">
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Guide Image</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          
                          <img src="{{asset('assets/dist/img/MPGrades.png')}}" alt="AdminLTE Logo" class="img-fluid" style="opacity: .8">                       
                        </div><!-- /.card-body -->
                      </div>
                    </div>
                    <div class="col-6">
                      <!-- Custom Tabs -->
                      <div class="card">
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Information</h3>
                          <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Observations</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Official</a></li>
                          </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                              @if($uploadImage)
                                <div class="form-group">
                                  <label for="exampleInputFile">File input</label>
                                  <div class="input-group">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" wire:model="imageInputFile" id="imageInputFile">
                                      <label class="custom-file-label" for="imageInputFile">Choose {{ $image_category }} file</label>
                                    </div>
                                    <div class="input-group-append">
                                      <button wire:click="uploadSelectedImage()" class="input-group-text">Upload</button>
                                    </div>
                                  </div>
                                </div>
                              @endif
                                
                            </div>
                            <!-- /.tab-pane -->
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                              @include('livewire.ctms.patients.controls')
                              <button wire:click="fnSavePrimaryInfo()" class="btn btn-success text-white font-normal mt-3 rounded">ADD PRIMARY INFO</button>
                            </div>
                            <!-- /.tab-pane -->

                            <!-- /.tab-content -->
                          </div>
                          
                        </div><!-- /.card-body -->
                      </div>
                      <!-- ./card -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!--Divider-->
                  <hr class="border-b-2 border-warning my-2 mx-2">
                  <!--Divider-->
                </div>
              </div><!-- /.card-body -->
            </div>
          </section>
        </div> 
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>