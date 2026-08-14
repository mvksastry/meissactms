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
                  Data Review: Clinical Observations
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
                            {{-- Success message --}}
                            @php
                                $i1 = 1; $j1 = 1; 
                            @endphp

                            <!-- Bloor Routines -->
                            <div class="card">
                                <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3"><label class="text-danger">Blood Routines</label></h3>
                                </div>
                                <div class="card-header d-flex p-0">
                                    <ul class="nav nav-pills ml-auto p-2">
                                        @foreach($c1Objs as $ci1Obj)
                                            <li class="nav-item"><a class="nav-link" href="#tab_{{ $i1 }}" data-toggle="tab">{{ ucfirst($ci1Obj->data_type) }}</a></li>
                                            @php
                                                $i1 = $i1 + 1
                                            @endphp
                                        @endforeach
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- /.tab-pane -->
                                        @foreach($c1Objs as $ci1Obj)
                                            <div class="tab-pane" id="tab_{{ $j1 }}">
                                                @include('livewire.ctms.datareview.clinicals.blood-routine')
                                            </div>
                                            @php
                                                $j1 = $j1 + 1;
                                            @endphp
                                        @endforeach
                                    </div><!-- ./End of Tab div -->
                                </div><!-- /.card-body -->
                            </div><!-- ./card-header -->

                            <!-- ./End of Blood Routines card -->

                            <!-- Bloor Sugar -->
                            <div class="card">
                                <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3"><label class="text-danger">Blood Sugar</label></h3>
                                </div>
                                <div class="card-header d-flex p-0">
                                    <ul class="nav nav-pills ml-auto p-2">
                                        @foreach($c2Objs as $ci2Obj)
                                            <li class="nav-item"><a class="nav-link" href="#tab_{{ $i1 }}" data-toggle="tab">{{ ucfirst($ci2Obj->data_type) }}</a></li>
                                            @php
                                                $i1 = $i1 + 1
                                            @endphp
                                        @endforeach
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- /.tab-pane -->
                                        @foreach($c2Objs as $ci2Obj)
                                            <div class="tab-pane" id="tab_{{ $j1 }}">
                                                @include('livewire.ctms.datareview.clinicals.blood-sugar')
                                            </div>
                                            @php
                                                $j1 = $j1 + 1;
                                            @endphp
                                        @endforeach
                                    </div><!-- ./End of Tab div -->
                                </div><!-- /.card-body -->
                            </div><!-- ./card-header -->
                            <!-- ./End of Blood Sugar card -->

                           <!-- Bloor Sugar -->
                            <div class="card">
                                <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3"><label class="text-danger">Blood Urea</label></h3>
                                </div>
                                <div class="card-header d-flex p-0">
                                    <ul class="nav nav-pills ml-auto p-2">
                                        @foreach($c3Objs as $ci3Obj)
                                            <li class="nav-item"><a class="nav-link" href="#tab_{{ $i1 }}" data-toggle="tab">{{ ucfirst($ci3Obj->data_type) }}</a></li>
                                            @php
                                                $i1 = $i1 + 1
                                            @endphp
                                        @endforeach
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- /.tab-pane -->
                                        @foreach($c3Objs as $ci3Obj)
                                            <div class="tab-pane" id="tab_{{ $j1 }}">
                                                @include('livewire.ctms.datareview.clinicals.blood-urea')
                                            </div>
                                            @php
                                                $j1 = $j1 + 1;
                                            @endphp
                                        @endforeach
                                    </div><!-- ./End of Tab div -->
                                </div><!-- /.card-body -->
                            </div><!-- ./card-header -->
                            <!-- ./End of Blood Sugar card -->


                           <!-- Bloor Sugar -->
                            <div class="card">
                                <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3"><label class="text-danger">Chemical Exam</label></h3>
                                </div>
                                <div class="card-header d-flex p-0">
                                    <ul class="nav nav-pills ml-auto p-2">
                                        @foreach($c4Objs as $ci4Obj)
                                            <li class="nav-item"><a class="nav-link" href="#tab_{{ $i1 }}" data-toggle="tab">{{ ucfirst($ci4Obj->data_type) }}</a></li>
                                            @php
                                                $i1 = $i1 + 1
                                            @endphp
                                        @endforeach
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- /.tab-pane -->
                                        @foreach($c4Objs as $ci4Obj)
                                            <div class="tab-pane" id="tab_{{ $j1 }}">
                                                @include('livewire.ctms.datareview.clinicals.chem-exams')
                                            </div>
                                            @php
                                                $j1 = $j1 + 1;
                                            @endphp
                                        @endforeach
                                    </div><!-- ./End of Tab div -->
                                </div><!-- /.card-body -->
                            </div><!-- ./card-header -->
                            <!-- ./End of Blood Sugar card -->


                           <!-- Bloor Sugar -->
                            <div class="card">
                                <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3"><label class="text-danger">Creatinine</label></h3>
                                </div>
                                <div class="card-header d-flex p-0">
                                    <ul class="nav nav-pills ml-auto p-2">
                                        @foreach($c5Objs as $ci5Obj)
                                            <li class="nav-item"><a class="nav-link" href="#tab_{{ $i1 }}" data-toggle="tab">{{ ucfirst($ci5Obj->data_type) }}</a></li>
                                            @php
                                                $i1 = $i1 + 1
                                            @endphp
                                        @endforeach
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- /.tab-pane -->
                                        @foreach($c5Objs as $ci5Obj)
                                            <div class="tab-pane" id="tab_{{ $j1 }}">
                                                 @include('livewire.ctms.datareview.clinicals.creatinine')
                                            </div>
                                            @php
                                                $j1 = $j1 + 1;
                                            @endphp
                                        @endforeach
                                    </div><!-- ./End of Tab div -->
                                </div><!-- /.card-body -->
                            </div><!-- ./card-header -->
                            <!-- ./End of Blood Sugar card -->

                           <!-- Bloor Sugar -->
                            <div class="card">
                                <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3"><label class="text-danger">CRP</label></h3>
                                </div>
                                <div class="card-header d-flex p-0">
                                    <ul class="nav nav-pills ml-auto p-2">
                                        @foreach($c6Objs as $ci6Obj)
                                            <li class="nav-item"><a class="nav-link" href="#tab_{{ $i1 }}" data-toggle="tab">{{ ucfirst($ci6Obj->data_type) }}</a></li>
                                            @php
                                                $i1 = $i1 + 1
                                            @endphp
                                        @endforeach
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- /.tab-pane -->
                                        @foreach($c6Objs as $ci6Obj)
                                            <div class="tab-pane" id="tab_{{ $j1 }}">
                                                @include('livewire.ctms.datareview.clinicals.crp')
                                            </div>
                                            @php
                                                $j1 = $j1 + 1;
                                            @endphp
                                        @endforeach
                                    </div><!-- ./End of Tab div -->
                                </div><!-- /.card-body -->
                            </div><!-- ./card-header -->
                            <!-- ./End of Blood Sugar card -->


                           <!-- Bloor Sugar -->
                            <div class="card">
                                <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3"><label class="text-danger">Electrolytes</label></h3>
                                </div>
                                <div class="card-header d-flex p-0">
                                    <ul class="nav nav-pills ml-auto p-2">
                                        @foreach($c7Objs as $ci7Obj)
                                            <li class="nav-item"><a class="nav-link" href="#tab_{{ $i1 }}" data-toggle="tab">{{ ucfirst($ci7Obj->data_type) }}</a></li>
                                            @php
                                                $i1 = $i1 + 1
                                            @endphp
                                        @endforeach
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- /.tab-pane -->
                                        @foreach($c7Objs as $ci7Obj)
                                            <div class="tab-pane" id="tab_{{ $j1 }}">
                                                @include('livewire.ctms.datareview.clinicals.electrolyte')
                                            </div>
                                            @php
                                                $j1 = $j1 + 1;
                                            @endphp
                                        @endforeach
                                    </div><!-- ./End of Tab div -->
                                </div><!-- /.card-body -->
                            </div><!-- ./card-header -->
                            <!-- ./End of Blood Sugar card -->

                           <!-- Bloor Sugar -->
                            <div class="card">
                                <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3"><label class="text-danger">General Summary</label></h3>
                                </div>
                                <div class="card-header d-flex p-0">
                                    <ul class="nav nav-pills ml-auto p-2">
                                        @foreach($c8Objs as $ci8Obj)
                                            <li class="nav-item"><a class="nav-link" href="#tab_{{ $i1 }}" data-toggle="tab">{{ ucfirst($ci8Obj->data_type) }}</a></li>
                                            @php
                                                $i1 = $i1 + 1
                                            @endphp
                                        @endforeach
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- /.tab-pane -->
                                        @foreach($c8Objs as $ci8Obj)
                                            <div class="tab-pane" id="tab_{{ $j1 }}">
                                                @include('livewire.ctms.datareview.clinicals.gen-summary')
                                            </div>
                                            @php
                                                $j1 = $j1 + 1;
                                            @endphp
                                        @endforeach
                                    </div><!-- ./End of Tab div -->
                                </div><!-- /.card-body -->
                            </div><!-- ./card-header -->
                            <!-- ./End of Blood Sugar card -->


                           <!-- Bloor Sugar -->
                            <div class="card">
                                <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3"><label class="text-danger">IL-6</label></h3>
                                </div>
                                <div class="card-header d-flex p-0">
                                    <ul class="nav nav-pills ml-auto p-2">
                                        @foreach($c9Objs as $ci9Obj)
                                            <li class="nav-item"><a class="nav-link" href="#tab_{{ $i1 }}" data-toggle="tab">{{ ucfirst($ci9Obj->data_type) }}</a></li>
                                            @php
                                                $i1 = $i1 + 1
                                            @endphp
                                        @endforeach
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- /.tab-pane -->
                                        @foreach($c9Objs as $ci9Obj)
                                            <div class="tab-pane" id="tab_{{ $j1 }}">
                                                @include('livewire.ctms.datareview.clinicals.il6')
                                            </div>
                                            @php
                                                $j1 = $j1 + 1;
                                            @endphp
                                        @endforeach
                                    </div><!-- ./End of Tab div -->
                                </div><!-- /.card-body -->
                            </div><!-- ./card-header -->
                            <!-- ./End of Blood Sugar card -->

                           <!-- Bloor Sugar -->
                            <div class="card">
                                <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3"><label class="text-danger">Laboratory Exam</label></h3>
                                </div>
                                <div class="card-header d-flex p-0">
                                    <ul class="nav nav-pills ml-auto p-2">
                                        @foreach($c10Objs as $ci10Obj)
                                            <li class="nav-item"><a class="nav-link" href="#tab_{{ $i1 }}" data-toggle="tab">{{ ucfirst($ci10Obj->data_type) }}</a></li>
                                            @php
                                                $i1 = $i1 + 1
                                            @endphp
                                        @endforeach
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- /.tab-pane -->
                                        @foreach($c10Objs as $ci10Obj)
                                            <div class="tab-pane" id="tab_{{ $j1 }}">
                                                @include('livewire.ctms.datareview.clinicals.lab-exams')
                                            </div>
                                            @php
                                                $j1 = $j1 + 1;
                                            @endphp
                                        @endforeach
                                    </div><!-- ./End of Tab div -->
                                </div><!-- /.card-body -->
                            </div><!-- ./card-header -->
                            <!-- ./End of Blood Sugar card -->

                           <!-- Bloor Sugar -->
                            <div class="card">
                                <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3"><label class="text-danger">Liver Function</label></h3>
                                </div>
                                <div class="card-header d-flex p-0">
                                    <ul class="nav nav-pills ml-auto p-2">
                                        @foreach($c11Objs as $ci11Obj)
                                            <li class="nav-item"><a class="nav-link" href="#tab_{{ $i1 }}" data-toggle="tab">{{ ucfirst($ci11Obj->data_type) }}</a></li>
                                            @php
                                                $i1 = $i1 + 1
                                            @endphp
                                        @endforeach
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- /.tab-pane -->
                                        @foreach($c11Objs as $ci11Obj)
                                            <div class="tab-pane" id="tab_{{ $j1 }}">
                                                @include('livewire.ctms.datareview.clinicals.lft')
                                            </div>
                                            @php
                                                $j1 = $j1 + 1;
                                            @endphp
                                        @endforeach
                                    </div><!-- ./End of Tab div -->
                                </div><!-- /.card-body -->
                            </div><!-- ./card-header -->
                            <!-- ./End of Blood Sugar card -->

                           <!-- Bloor Sugar -->
                            <div class="card">
                                <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3"><label class="text-danger">Microscopic Exam</label></h3>
                                </div>
                                <div class="card-header d-flex p-0">
                                    <ul class="nav nav-pills ml-auto p-2">
                                        @foreach($c12Objs as $ci12Obj)
                                            <li class="nav-item"><a class="nav-link" href="#tab_{{ $i1 }}" data-toggle="tab">{{ ucfirst($ci12Obj->data_type) }}</a></li>
                                            @php
                                                $i1 = $i1 + 1
                                            @endphp
                                        @endforeach
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- /.tab-pane -->
                                        @foreach($c12Objs as $ci12Obj)
                                            <div class="tab-pane" id="tab_{{ $j1 }}">
                                                @include('livewire.ctms.datareview.clinicals.microscopic-exam')
                                            </div>
                                            @php
                                                $j1 = $j1 + 1;
                                            @endphp
                                        @endforeach
                                    </div><!-- ./End of Tab div -->
                                </div><!-- /.card-body -->
                            </div><!-- ./card-header -->
                            <!-- ./End of Blood Sugar card -->

                           <!-- Bloor Sugar -->
                            <div class="card">
                                <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3"><label class="text-danger">Renal Function</label></h3>
                                </div>
                                <div class="card-header d-flex p-0">
                                    <ul class="nav nav-pills ml-auto p-2">
                                        @foreach($c13Objs as $ci13Obj)
                                            <li class="nav-item"><a class="nav-link" href="#tab_{{ $i1 }}" data-toggle="tab">{{ ucfirst($ci13Obj->data_type) }}</a></li>
                                            @php
                                                $i1 = $i1 + 1
                                            @endphp
                                        @endforeach
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- /.tab-pane -->
                                        @foreach($c13Objs as $ci13Obj)
                                            <div class="tab-pane" id="tab_{{ $j1 }}">
                                                @include('livewire.ctms.datareview.clinicals.rft')
                                            </div>
                                            @php
                                                $j1 = $j1 + 1;
                                            @endphp
                                        @endforeach
                                    </div><!-- ./End of Tab div -->
                                </div><!-- /.card-body -->
                            </div><!-- ./card-header -->
                            <!-- ./End of Blood Sugar card -->

                           <!-- Bloor Sugar -->
                            <div class="card">
                                <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3"><label class="text-danger">Urine Routine</label></h3>
                                </div>
                                <div class="card-header d-flex p-0">
                                    <ul class="nav nav-pills ml-auto p-2">
                                        @foreach($c14Objs as $ci14Obj)
                                            <li class="nav-item"><a class="nav-link" href="#tab_{{ $i1 }}" data-toggle="tab">{{ ucfirst($ci14Obj->data_type) }}</a></li>
                                            @php
                                                $i1 = $i1 + 1
                                            @endphp
                                        @endforeach
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- /.tab-pane -->
                                        @foreach($c14Objs as $ci14Obj)
                                            <div class="tab-pane" id="tab_{{ $j1 }}">
                                                @include('livewire.ctms.datareview.clinicals.urine-routine')
                                            </div>
                                            @php
                                                $j1 = $j1 + 1;
                                            @endphp
                                        @endforeach
                                    </div><!-- ./End of Tab div -->
                                </div><!-- /.card-body -->
                            </div><!-- ./card-header -->
                            <!-- ./End of Blood Sugar card -->

                           <!-- Bloor Sugar -->
                            <div class="card">
                                <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3"><label class="text-danger">Drug Details</label></h3>
                                </div>
                                <div class="card-header d-flex p-0">
                                    <ul class="nav nav-pills ml-auto p-2">
                                        @foreach($c15Objs as $ci15Obj)
                                            <li class="nav-item"><a class="nav-link" href="#tab_{{ $i1 }}" data-toggle="tab">{{ ucfirst($ci15Obj->data_type) }}</a></li>
                                            @php
                                                $j1 = $j1 + 1
                                            @endphp
                                        @endforeach
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- /.tab-pane -->
                                        @foreach($c15Objs as $ci15Obj)
                                            <div class="tab-pane" id="tab_{{ $j1 }}">

                                            </div>
                                            @php
                                                $j1 = $j1 + 1;
                                            @endphp
                                        @endforeach
                                    </div><!-- ./End of Tab div -->
                                </div><!-- /.card-body -->
                            </div><!-- ./card-header -->
                            <!-- ./End of Blood Sugar card -->

                           <!-- Bloor Sugar -->
                            <div class="card">
                                <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3"><label class="text-danger">Miscellineous</label></h3>
                                </div>
                                <div class="card-header d-flex p-0">
                                    <ul class="nav nav-pills ml-auto p-2">
                                        
                                            <li class="nav-item"><a class="nav-link" href="#tab_{{ $i1 }}" data-toggle="tab"></a></li>
                                            @php
                                                $i1 = $i1 + 1
                                            @endphp
                                        
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- /.tab-pane -->
                                        
                                            <div class="tab-pane" id="tab_{{ $j1 }}">

                                            </div>
                                            @php
                                                $i1 = $i1 + 1;
                                            @endphp
                                        
                                    </div><!-- ./End of Tab div -->
                                </div><!-- /.card-body -->
                            </div><!-- ./card-header -->
                            <!-- ./End of Blood Sugar card -->


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


