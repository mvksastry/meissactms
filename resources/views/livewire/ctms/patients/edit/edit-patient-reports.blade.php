<div>
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
                  Upload Files - 
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
                    <div class="col-12">
                      <!-- Custom Tabs -->
                      <div class="card">
                         <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Current Reports</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          @if(count($current_files) > 0 )
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th align="center">Rep Desc</th>
                                    <th align="center">Rep Status</th>
                                    <th align="center">Uploaded By</th>
                                    <th align="center">Uploaded On</th>
                                    <th align="center">Updated On</th>
                                    <th align="center">Action</th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  @foreach($current_files as $curfile)
                                    <tr>
                                      <td>
                                          {{ $curfile->report_description }}
                                      </td>
                                      <td>
                                          {{ ucfirst($curfile->report_status) }}
                                      </td>
                                      <td>
                                          {{ $curfile->uploaded_by }}
                                      </td>
                                      <td>
                                          {{ date('d-m-Y', strtotime($curfile->date_created)) }}
                                      </td>
                                      <td>
                                          {{ date('d-m-Y', strtotime($curfile->updated_at)) }}
                                      </td>
                                      <td>
                                          <button wire:click="fnDownloadReport('{{ $curfile->clinicalreport_id }}')" class="btn btn-info font-normal mt-0 rounded">Download</button>
                                      </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                              </table>

                          @else
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th align="center">No Information Retrieved</th>
                                  </tr>
                                </thead>
                                <tbody> 
                                </tbody>
                              </table>
                          @endif

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">

                    <div class="col-12">
                      <!-- Custom Tabs -->
                      <div class="card">
                        @if($sys_panel)
                          @include('livewire.eac_sys_panel')
                        @endif
                        @if($msg_panel)
                          @include('livewire.eac_msg_panel')
                        @endif
                        @if ($errors->any())
                            <div class="text-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Success message --}}
                        @if (session()->has('success'))
                            <div class="text-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Information</h3>
                          <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link" href="#tab_1" data-toggle="tab">Primary Infos</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Life Style</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Clinical</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Sensory Exam</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">M&DTR</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">Pfirmans</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_7" data-toggle="tab">Vis&Analog</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_8" data-toggle="tab">MODQ Score</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_9" data-toggle="tab">RMQ Score</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_10" data-toggle="tab">Official</a></li>
                          </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div wire:ignore class="tab-content">

                            <div class="tab-pane" id="tab_1">
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="4" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                    <tr>
                                        <td>
                                            <label>Primary Infos</label>
                                            <input wire:model.defer="primaryinfos" type="file"  class="form-control" placeholder="Report File" >                                  
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button wire:click="fnUploadPrimaryInfos()" class="btn btn-info font-normal mt-3 rounded">UPLOAD PRIMARY iNFO</button>
                                        </td>
                                    </tr> 
                                </tbody>
                              </table>
                            </div>

                            <div class="tab-pane" id="tab_2">
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td>
                                      <label>Life Style</label>
                                      <input wire:model.defer="lifestyle" type="file" class="form-control" placeholder="Report File" >
                                    </td>
                                  </tr>
                                    <tr>
                                        <td>
                                            <button wire:click="fnUploadlifestyleInfos()" class="btn btn-info font-normal mt-3 rounded">UPLOAD LIFE STYLE INFO</button>
                                        </td>
                                    </tr> 
                                </tbody>
                              </table>
                            </div>
                          <div class="tab-pane" id="tab_3">
                            <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="5" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td>
                                      <label>Clinical Files</label>                                      
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Blood Routine</label>
                                      <input wire:model.defer="blood_routine" type="file" class="form-control" 
                                      id="upload{{ $iter1 }}" placeholder="Report File" >
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Blood Sugar</label>
                                      <input wire:model.defer="blood_sugar" type="file" class="form-control" placeholder="Report File" >
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Blood Urea</label>
                                      <input wire:model.defer="blood_urea" type="file" class="form-control" placeholder="Report File" >
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Chemical Examinations</label>
                                      <input wire:model.defer="chem_exams" type="file" class="form-control" placeholder="Report File" >
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Creatinine</label>
                                      <input wire:model.defer="creatinine" type="file" class="form-control" placeholder="Report File" >
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>CRP</label>
                                      <input wire:model.defer="crp" type="file" class="form-control" placeholder="Report File" >
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Electrolytes</label>
                                      <input wire:model.defer="electrolytes" type="file" class="form-control" placeholder="Report File" >
                                    </td>  
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>IL6</label>
                                      <input wire:model.defer="il6" type="file" class="form-control" placeholder="Report File" >
                                    </td> 
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Laboratory Examinations</label>
                                      <input wire:model.defer="lab_exams" type="file" class="form-control" placeholder="Report File" >
                                    </td>   
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Liver Function Tests</label>
                                      <input wire:model.defer="liver_function" type="file" class="form-control" placeholder="Report File" >
                                    </td> 
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Microscopic Investigations</label>
                                      <input wire:model.defer="microscopic_exam" type="file" class="form-control" placeholder="Report File" >
                                    </td>  
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Renal Function Tests</label>
                                      <input wire:model.defer="renal_function" type="file" class="form-control" placeholder="Report File" >
                                    </td>   
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Urine Routine Tests</label>
                                      <input wire:model.defer="urine_routine" type="file" class="form-control" placeholder="Report File" >
                                    </td> 
                                  </tr>
                                    <tr>
                                        <td>
                                            <button wire:click="fnUploadClinicalReports()" class="btn btn-success font-normal mt-3 rounded">Upload Reports</button>
                                        </td>
                                    </tr> 
                                </tbody>
                            </table>
                          </div>

                          <div class="tab-pane" id="tab_4">
                            <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="3" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td>
                                      <label>Sensory Exam</label>
                                      <input wire:model.defer="sensoryexam" type="file" class="form-control" placeholder="Report File" >
                                    </td>
                                  </tr>  
                                    <tr>
                                        <td>
                                            <button wire:click="fnUploadSensoryExams()" class="btn btn-warning font-normal mt-3 rounded">UPLOAD SENSORY EXAMS</button>
                                        </td>
                                    </tr>                                  
                                </tbody>
                              </table>
                            </div>
                            <!-- /.tab-pane -->

                          <div class="tab-pane" id="tab_5">
                            <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="3" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td>
                                      <label>M & DTR Files</label>
                                      <input wire:model.defer="mdtre" type="file" class="form-control" placeholder="Report File" >
                                    </td>
                                  </tr> 
                                    <tr>
                                        <td>
                                            <button wire:click="fnUploadMDTREInfo()" class="btn btn-warning font-normal mt-3 rounded">UPLOAD MDTRE INFO</button>
                                        </td>
                                    </tr>                                   
                                </tbody>
                              </table>
                            </div>
                            <!-- /.tab-pane -->

                          <div class="tab-pane" id="tab_6">
                            <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="3" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td>
                                      <label>Pfirman's Score</label>
                                      <input wire:model.defer="pfirmanscore" type="file" class="form-control" placeholder="Report File" >
                                    </td>
                                  </tr> 
                                    <tr>
                                        <td>
                                            <button wire:click="fnUploadPfirmanScore()" class="btn btn-warning font-normal mt-3 rounded">EDIT MDTRE INFO</button>
                                        </td>
                                    </tr>                                   
                                </tbody>
                              </table>
                            </div>
                            <!-- /.tab-pane -->

                          <div class="tab-pane" id="tab_7">
                            <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="3" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td>
                                      <label>Visual & Analog Score File</label>
                                      <input wire:model.defer="vascore" type="file" class="form-control" placeholder="Report File" >
                                    </td>
                                  </tr>  
                                    <tr>
                                        <td>
                                            <button wire:click="fnUploadVAScore()" class="btn btn-warning font-normal mt-3 rounded">UPLOAD V&A SCORE</button>
                                        </td>
                                    </tr>                                  
                                </tbody>
                              </table>
                            </div>
                            <!-- /.tab-pane -->


                          <div class="tab-pane" id="tab_8">
                            <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="3" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td>
                                      <label>MODQ Score File</label>
                                      <input wire:model.defer="modqscore" type="file" class="form-control" placeholder="Report File" >
                                    </td>
                                  </tr> 
                                    <tr>
                                        <td>
                                            <button wire:click="fnUploadMODQScore()" class="btn btn-warning font-normal mt-3 rounded">UPLOAD MODQ SCORE</button>
                                        </td>
                                    </tr>                                   
                                </tbody>
                              </table>
                            </div>
                            <!-- /.tab-pane -->

                          <div class="tab-pane" id="tab_9">
                            <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="3" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td>
                                      <label>RMQ Score File</label>
                                      <input wire:model.defer="rmqscore" type="file" class="form-control" placeholder="Report File" >
                                    </td>
                                  </tr>  
                                    <tr>
                                        <td>
                                            <button wire:click="fnUploadRMQScore()" class="btn btn-warning font-normal mt-3 rounded">UPLOAD RMQ SCORE</button>
                                        </td>
                                    </tr>                                  
                                </tbody>
                              </table>
                            </div>
                            <!-- /.tab-pane -->

                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_10">
                                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                    <thead>
                                      <tr>
                                        <th colspan="2" align="center"></th>
                                      </tr>
                                    </thead>
                                    <tbody>        
                                      <tr>
                                        <td colspan="2">
                                          <label>Misc / Official - 1</label>
                                          <input wire:model.defer="miscoff1" type="file" class="form-control" placeholder="Report File" >
                                        </td>
                                      </tr>
                                      <tr>
                                      
                                        <td colspan="2">
                                          <label>Misc / Official - 2</label>
                                          <input wire:model.defer="miscoff2" type="file" class="form-control" placeholder="Report File" >
                                        </td>
                                      
                                      </tr>
                                    <tr>
                                        <td>
                                            <button wire:click="fnUploadMiscFiles()" class="btn btn-warning font-normal mt-3 rounded">UPLOAD MISC INFOS</button>
                                        </td>
                                    </tr> 
                                    </tbody>
                                </table>
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

</div>

