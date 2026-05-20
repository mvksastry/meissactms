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
                  Patient Primary Information: Date Created: {{ $patientPrimaryInfo->created_at }}
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

                  <!--Divider-->
                  <hr class="border-b-2 border-warning my-2 mx-2">
                  <!-- Morris chart - Sales -->
                  <div class="row">
                    <div class="col-12">
                      <!-- Custom Tabs -->
                      <div class="card">
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Information</h3>
                          <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Clinical</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Personal</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Emergency</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Physical</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">Consents</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">History-1</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_7" data-toggle="tab">History-2</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_8" data-toggle="tab">Habits</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_9" data-toggle="tab">Official</a></li>
                          </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                              @include('livewire.ctms.patients.infos.sub-folder.center-control')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                              @include('livewire.ctms.patients.infos.sub-folder.personal-ids')
                            </div>

                            <div class="tab-pane" id="tab_3"> 
                              @include('livewire.ctms.patients.infos.sub-folder.emergency-contacts')
                            </div>

                            <div class="tab-pane" id="tab_4">
                              @include('livewire.ctms.patients.infos.sub-folder.physical-features')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_5">
                              @include('livewire.ctms.patients.infos.sub-folder.consent-status')
                            </div>

                            <div class="tab-pane" id="tab_6">
                              @include('livewire.ctms.patients.infos.sub-folder.general-history-1')
                            </div>

                            <div class="tab-pane" id="tab_7">
                              @include('livewire.ctms.patients.infos.sub-folder.general-history-2')
                            </div>

                            <div class="tab-pane" id="tab_8">
                              @include('livewire.ctms.patients.infos.sub-folder.consumption-habits')
                              
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_9">
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="2" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody>      
                                  @hasrole('junior_resident')  
                                  <tr>
                                    <td colspan="2">
                                      <label>Comment By Entered</label>
                                      </br>{{ $patientPrimaryInfo->comment_entered_by }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Cleared By*</label>
                                      </br>{{ $patientPrimaryInfo->entered_by }}
                                    </td>
                                    <td colspan="1">
                                      <label>Date Cleared*</label>
                                      </br>{{ $patientPrimaryInfo->entry_date }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Clear Patient Data*</label>
                                      </br>{{ $patientPrimaryInfo->entry_sealed_by }}
                                      <div class="col-sm-6 col-md-6">
                                        <button wire:click="fnModifiedPfirmannInfo('{{ $patient_uuid}}')" type="button" class="btn btn-block btn-success"><i class="ion ion-person"></i>&nbsp Clear Patient Data</button>
                                      </div>
                                    </td>
                                  </tr>
                                  @endhasrole

                                  @hasrole('senior_resident')
                                  <tr>
                                    <td colspan="2">
                                      <label>Comment By Verified</label>
                                      </br>{{ $patientPrimaryInfo->comment_verified_by }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Verified By*</label>
                                      </br>{{ $patientPrimaryInfo->verified_by }}
                                    </td>
                                    <td>
                                      <label>Verified Date*</label>
                                      </br>{{ $patientPrimaryInfo->verified_date }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Verified Patient Data*</label>
                                      </br>{{ $patientPrimaryInfo->entry_sealed_by }}
                                      <div class="col-sm-6 col-md-6">
                                        <button wire:click="fnModifiedPfirmannInfo('{{ $patient_uuid}}')" type="button" class="btn btn-block btn-success"><i class="ion ion-person"></i>&nbsp Verify Patient Data</button>
                                      </div>
                                    </td>
                                  </tr>
                                  @endhasrole

                                  @hasrole('clinical_manager')
                                  <tr>
                                    <td>
                                      <label>Seal Patient Data*</label>
                                      </br>{{ $patientPrimaryInfo->entry_sealed_by }}
                                      <div class="col-sm-6 col-md-6">
                                        <button wire:click="fnModifiedPfirmannInfo('{{ $patient_uuid}}')" type="button" class="btn btn-block btn-success"><i class="ion ion-person"></i>&nbsp Seal Entry</button>
                                      </div>
                                    </td>
                                    <td colspan="2">
                                      <label>Sealed Date*</label>
                                      </br>{{ $patientPrimaryInfo->entry_sealed_date }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Approve Patient Data*</label>
                                      </br>{{ $patientPrimaryInfo->entry_sealed_by }}
                                      <div class="col-sm-6 col-md-6">
                                        <button wire:click="fnModifiedPfirmannInfo('{{ $patient_uuid}}')" type="button" class="btn btn-block btn-success"><i class="ion ion-person"></i>&nbsp Approve Patient Data</button>
                                      </div>
                                    </td>
                                  </tr>
                                  @endhasrole

                                  @hasrole('ctms_incharge')
                                  <tr>
                                    <td>
                                      <label>Seal Patient Data*</label>
                                      </br>{{ $patientPrimaryInfo->entry_sealed_by }}
                                      <div class="col-sm-6 col-md-6">
                                        <button wire:click="fnModifiedPfirmannInfo('{{ $patient_uuid}}')" type="button" class="btn btn-block btn-success"><i class="ion ion-person"></i>&nbsp Seal Entry</button>
                                      </div>
                                    </td>
                                    <td colspan="2">
                                      <label>Sealed Date*</label>
                                      </br>{{ $patientPrimaryInfo->entry_sealed_date }}
                                    </td>
                                  </tr>
                                  @endhasrole
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