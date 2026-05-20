<div>
    <!-- Content Wrapper. Contains page content -->
    <section class="content p-2">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Current Patient Status
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
                    <div class="tab-content p-2">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-8">
                                        <h5>Patient ID: {{ $patient_uuid }}</h5>
                                    </div>
                                    <div class="col-sm-4">
                                        <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">Status</li>
                                        </ol>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>

                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">

                                <!-- Timelime example  -->
                                <div class="row">
                                    <div class="col-md-12">
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created On</th>
                        <th>Updated On</th>
                    </tr>
                </thead>
                <tbody> 
                        <tr>
                            <td>
                                Primary Infos
                            </td>
                            <td>
                                {{ ucfirst($pcs['pcs']->status) }}
                            </td>
                            <td>
                                {{ $pcs['pcs']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['pcs']->updated_at }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Life Style
                            </td>
                            <td>
                                {{ ucfirst($pcs['lifestyle']->status) }}
                            </td>
                            <td>
                                {{ $pcs['lifestyle']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['lifestyle']->updated_at }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Clinical Sata
                            </td>
                            <td>
                                {{ ucfirst($pcs['clinicaldata']->status) }}
                            </td>
                            <td>
                                {{ $pcs['clinicaldata']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['clinicaldata']->updated_at }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Sensory Exam
                            </td>
                            <td>
                                {{ ucfirst($pcs['sensexam']->status) }}
                            </td>
                            <td>
                                {{ $pcs['sensexam']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['sensexam']->updated_at }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                MDTRE
                            </td>
                            <td>
                                {{ ucfirst($pcs['mdtre']->status) }}
                            </td>
                            <td>
                                {{ $pcs['mdtre']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['mdtre']->updated_at }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Pfirmans Score
                            </td>
                            <td>
                                {{ ucfirst($pcs['pfirmans']->status) }}
                            </td>
                            <td>
                                {{ $pcs['pfirmans']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['pfirmans']->updated_at }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                VA Score
                            </td>
                            <td>
                                {{ ucfirst($pcs['vascore']->status) }}
                            </td>
                            <td>
                                {{ $pcs['vascore']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['vascore']->updated_at }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                MODQ Score
                            </td>
                            <td>
                                {{ ucfirst($pcs['modqscore']->status) }}
                            </td>
                            <td>
                                {{ $pcs['modqscore']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['modqscore']->updated_at }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                RMQ replies
                            </td>
                            <td>
                                {{ ucfirst($pcs['rmqreply']->status) }}
                            </td>
                            <td>
                                {{ $pcs['rmqreply']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['rmqreply']->updated_at }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Blood Routine
                            </td>
                            <td>
                                {{ ucfirst($pcs['br']->status) }}
                            </td>
                            <td>
                                {{ $pcs['br']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['br']->updated_at }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Blood Sugar
                            </td>
                            <td>
                                {{ ucfirst($pcs['bs']->status) }}
                            </td>
                            <td>
                                {{ $pcs['bs']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['bs']->updated_at }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Blood Urea
                            </td>
                            <td>
                                {{ ucfirst($pcs['bu']->status) }}
                            </td>
                            <td>
                                {{ $pcs['bu']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['bu']->updated_at }}
                            </td>
                        </tr>


                        <tr>
                            <td>
                                Chemical Exam
                            </td>
                            <td>
                                {{ ucfirst($pcs['ce']->status) }}
                            </td>
                            <td>
                                {{ $pcs['ce']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['ce']->updated_at }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Creatine
                            </td>
                            <td>
                                {{ ucfirst($pcs['creatine']->status) }}
                            </td>
                            <td>
                                {{ $pcs['creatine']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['creatine']->updated_at }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                CRP
                            </td>
                            <td>
                                {{ ucfirst($pcs['crp']->status) }}
                            </td>
                            <td>
                                {{ $pcs['crp']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['crp']->updated_at }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Electrolytes
                            </td>
                            <td>
                                {{ ucfirst($pcs['electro']->status) }}
                            </td>
                            <td>
                                {{ $pcs['electro']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['electro']->updated_at }}
                            </td>
                        </tr>


                        <tr>
                            <td>
                                General Summary
                            </td>
                            <td>
                                {{ ucfirst($pcs['gs']->status) }}
                            </td>
                            <td>
                                {{ $pcs['gs']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['gs']->updated_at }}
                            </td>
                        </tr>


                        <tr>
                            <td>
                                IL6
                            </td>
                            <td>
                                {{ ucfirst($pcs['il6']->status) }}
                            </td>
                            <td>
                                {{ $pcs['il6']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['il6']->updated_at }}
                            </td>
                        </tr>


                        <tr>
                            <td>
                                Lab Exam
                            </td>
                            <td>
                                {{ ucfirst($pcs['le']->status) }}
                            </td>
                            <td>
                                {{ $pcs['le']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['le']->updated_at }}
                            </td>
                        </tr>


                        <tr>
                            <td>
                                Liver Function
                            </td>
                            <td>
                                {{ ucfirst($pcs['lft']->status) }}
                            </td>
                            <td>
                                {{ $pcs['lft']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['lft']->updated_at }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Microscopic Exam
                            </td>
                            <td>
                                {{ ucfirst($pcs['mes']->status) }}
                            </td>
                            <td>
                                {{ $pcs['mes']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['mes']->updated_at }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Renal Function
                            </td>
                            <td>
                                {{ ucfirst($pcs['rft']->status) }}
                            </td>
                            <td>
                                {{ $pcs['rft']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['rft']->updated_at }}
                            </td>
                        </tr>


                        <tr>
                            <td>
                                Urine Routine
                            </td>
                            <td>
                                {{ ucfirst($pcs['ure']->status) }}
                            </td>
                            <td>
                                {{ $pcs['ure']->created_at }} 
                            </td>
                            <td>
                                {{ $pcs['ure']->updated_at }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Comment</label>
                                <input wire:model="status_comment" id="status_comment" type="text" class="form-control" placeholder="Status Update Comment">
                            </td>
                        </tr>
                        <tr>
                            @hasanyrole(['junior_resident','clinical_dataentry'])
                              <td>
                                  <button wire:click="getCurrentPatientStatus('{{ $patient_uuid}}')" class="btn btn-block btn-info rounded" type="button" ><i class="ion ion-person"></i>&nbsp Clear Patient</button>
                              </td>
                            @endhasanyrole

                            @hasrole('senior_resident')
                              <td>
                                  <button wire:click="getCurrentPatientStatus('{{ $patient_uuid}}')" class="btn btn-block btn-info rounded" type="button" ><i class="ion ion-person"></i>&nbsp Verified Patient</button>
                              </td>
                            @endhasanyrole

                            @hasrole('clinical_manager')
                              <td>
                                  <button wire:click="getCurrentPatientStatus('{{ $patient_uuid}}')" class="btn btn-block btn-info rounded" type="button" ><i class="ion ion-person"></i>&nbsp Approve Patient</button>
                              </td>
                            @endhasanyrole

                            @hasrole('ctms_incharge')
                              <td>
                                  <button wire:click="getCurrentPatientStatus('{{ $patient_uuid}}')" class="btn btn-block btn-info rounded" type="button" ><i class="ion ion-person"></i>&nbsp Seal Patient</button>
                              </td>
                            @endhasanyrole

                            @hasrole('director')
                              <td>
                                  <button wire:click="getCurrentPatientStatus('{{ $patient_uuid}}')" class="btn btn-block btn-info rounded" type="button" ><i class="ion ion-person"></i>&nbsp Post Notes</button>
                              </td>
                            @endhasanyrole
                        </tr>

                    </tbody>
                </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container fluid -->
                        </section>
                        <!-- /.content -->
                    </div>
                    <!-- /.tab content -->
                </div><!-- /.card body -->
            </div>
        </div>
    </section><!-- /.section -->
</div>
