<div>
    <!-- Content Wrapper. Contains page content -->
    <section class="content p-2">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Patient Timeline
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
                                        <li class="breadcrumb-item active">Timeline</li>
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
                                        <!-- The time line -->
                                        <div class="timeline">

                                            @foreach($ptEpoch as $row)
                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                    <span class="bg-red">{{ date('d-m-Y', strtotime($row->event_date)) }}</span>
                                                </div>
                                                <!-- /.timeline-label -->

                                            
                                                <!-- timeline item -->
                                                <div>
                                                    <i class="fas fa-envelope bg-blue"></i>
                                                    <div class="timeline-item">
                                                    <span class="time"><i class="fas fa-clock"></i> {{ $row->et }}</span>
                                                    <h3 class="timeline-header"><a href="#">{{ $row->event_author }}</a> {{ $row->event }}</h3>

                                                    <div class="timeline-body">
                                                        {{ $row->author_message }}
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <!--a class="btn btn-primary btn-sm">Read more</a -->
                                                        <!--a class="btn btn-danger btn-sm">Delete</a -->
                                                    </div>
                                                    </div>
                                                </div>
                                                <!-- END timeline item -->
                                            @endforeach
                                            <!-- timeline time label -->
                                            <div class="time-label">
                                                <span class="bg-red">{{ date('d-m-Y', strtotime($oldestDate)) }}</span>
                                            </div>
                                            <!-- /.timeline-label -->      
                                            <div>
                                                <i class="fas fa-clock bg-gray"></i>
                                            </div>
                                        </div>
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
