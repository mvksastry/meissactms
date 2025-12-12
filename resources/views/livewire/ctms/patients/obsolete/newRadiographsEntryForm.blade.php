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
                  Radiographs
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
                    <div class="col-2">
                      <div class="card">
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Image Category</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <table id="userIndex2" class="table table-sm table-bordered table-hover">
                            <thead>
                              <tr>
                                <th class="text-center"></th>
                              </tr>
                            </thead>
                            <tbody> 
                              <tr>
                                <td class="text-center">
                                  <button wire:click="fnUploadXrayImage()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp X-Ray</button>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-center">
                                  <button wire:click="fnUploadCTScanImage()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp CT Scan</button>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-center">
                                  <button wire:click="fnUploadUSGImage()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp USG</button>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-center">
                                  <button wire:click="fnUploadMRIImage()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp MRI</button>
                                </td>
                              </tr>
                            </tbody>
                          </table>                       
                        </div><!-- /.card-body -->
                      </div>
                    </div>
                    <div class="col-10">
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
                                @if ($imageInputFile)
                                    Image Preview:
                                    <img src="{{ $imageInputFile->temporaryUrl() }}" class="img-fluid" alt="Responsive image" style="opacity: .8">
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