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
                  Data Review: M O D Q Scores
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
                        $i = 1;
                        $j = 1;
                        //dd($Objs);
                          $painIntensity = [
                              0 => 'I can tolerate the pain I have without having to use pain medication.', 
                              1 => 'The pain is bad, but I can manage without having to take pain medication.', 
                              2 => 'Pain medication provides me with complete relief from pain.', 
                              3 => 'Pain medication provides me with moderate relief from pain.', 
                              4 => 'Pain medication has no effect on my pain.', 
                              5 => 'Pain medication has no effect on my pain.'
                          ];
                          $persCare = [
                              0 => 'I can take care of myself normally without causing increased pain',
                              1 => 'I can take care of myself normally, but it increases my pain',
                              2 => 'It is painful to take care of myself, and I am slow and careful.',
                              3 => 'I need help, but I am able to manage most of my personal care.',
                              4 => 'I need help every day in most aspects of my care.',
                              5 => 'I do not get dressed, I wash with difficulty, and I stay in bed.'
                          ];
                          $modq_lifting = [
                              0 => 'I can lift heavy weights without increased pain.',
                              1 => 'I can life heavy weights, but it causes increased pain.',
                              2 => 'Pain prevents me from lifting heavy weights off the floor, but I can manage if the weights are conveniently positioned (e.g. on a table).',
                              3 => 'Pain prevents me from lifting heavy weights, but I can manage light to medium weights if they are conveniently positioned.',
                              4 => 'I can lift only very light weights.',
                              5 => 'I cannot lift or carry anything at all.'
                          ];
                          $modq_walking = [
                              0 => 'Pain does not prevent me from walking any distance.',
                              1 => 'Pain prevents me from walking more than 1 mile.',
                              2 => 'Pain prevents me from walking more than 1/2 (half) mile.',
                              3 => 'Pain prevents me from walking more than 1/4 (quarter) mile.',
                              4 => 'I can walk only with crutches or a cane.',
                              5 => 'I am in bed most of the time and have to crawl to the toilet.'
                          ];
                          $modq_sitting = [
                              0 => 'I can sit in any chair as long as I like.',
                              1 => 'I can only sit in my favourite chair as long as I like.',
                              2 => 'Pain prevents me from sitting for more than 1 hour.',
                              3 => 'Pain prevents me from sitting for more than 1/2 hour.',
                              4 => 'Pain prevents me from sitting for more than 10 minutes.',
                              5 => 'Pain prevents me from sitting at all.'
                          ];
                          $modq_standing = [
                              0 => 'I can stand as long as I want without increased pain.',
                              1 => 'I can stand as long as I want, but it increases my pain.',
                              2 => 'Pain prevents me from standing for more than 1 hour.',
                              3 => 'Pain prevents me from standing for more than 1/2 hour.',
                              4 => 'Pain prevents me from standing for more than 10 minutes.',
                              5 => 'Pain prevents me from standing at all.',
                          ];
                          $modq_sleeping = [
                              0 => 'Pain does not prevent me from sleeping well.',
                              1 => 'I can sleep well only by using pain medication.',
                              2 => 'Even when I take medication, I sleep less than 6 hours.',
                              3 => 'Even when I take medication, I sleep less than 4 hours.',
                              4 => 'Even when I take medication, I sleep less than 2 hours.',
                              5 => 'Pain prevents me from sleeping at all.',
                          ];
                          $modq_sociallife = [
                              0 => 'My social life is normal and does not increase my pain.',
                              1 => 'My social life is normal, but it increases my level of pain.',
                              2 => 'Pain prevents me from participating in more energetic activities (e.g. sport, dancing).',
                              3 => 'Pain prevents me from going out very often.',
                              4 => 'Pain has restricted my social life to my home.',
                              5 => 'I have hardly any social life because of my pain.',
                          ];   
                          $modq_travelling = [
                              0 => 'I can travel anywhere without increased pain.',
                              1 => 'I can travel anywhere, but it increases my pain.',
                              2 => 'My pain restricts my travel over 2 hours.',
                              3 => 'My pain restricts my travel over 1 hours.',
                              4 => 'My pain restricts my travel to short necessary journeys under 1/2 hours.',
                              5 => 'My pain prevents all travel except for visits to the physician/therapist or hospital.',
                          ]; 
                          $modq_emphome = [
                              0 => 'My normal homemaking/job activities do not cause pain.',
                              1 => 'My normal homemaking/job activities increase my pain, but i can still perform all that is required of me.',
                              2 => 'I can perform most of my homemaking/job duties, but pain prevents me from performing more physically stressful activities(e.g. lifting, vacuuming).',
                              3 => 'Pain prevents me from doing anything but light duties.',
                              4 => 'Pain prevents me from doing even light duties.',
                              5 => 'Pain prevents me from performing any job or homemaking chores.',
                          ];
                      @endphp
                      <div class="card">
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Information <label class="text-danger">
                            </label></h3>
                        </div>
                        <div class="card-header d-flex p-0">
                          <ul class="nav nav-pills ml-auto p-2">
                            @foreach ($Objs as $Obj)
                              <li class="nav-item"><a class="nav-link" href="#tab_{{ $i }}"
                                  data-toggle="tab">{{ ucfirst($Obj->data_type) }}</a>
                              </li>
                              @php
                                $i = $i + 1;
                              @endphp
                            @endforeach
                          </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content">
                            <!-- /.tab-pane -->
                            @foreach ($Objs as $Obj)
                              <div class="tab-pane" id="tab_{{ $j }}">
                                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                  <thead>
                                    <tr>
                                      <th>{{ ucfirst($Obj->data_type) }}</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <label>Opd ID*</label>
                                        </br>
                                        {{ $Obj->opd_id }}
                                      </td>
                                      <td>
                                        <label>In Patient ID*</label>
                                        </br>
                                        {{ $Obj->ipd_id }}
                                      </td>
                                      <td>
                                        <label>Admission Date*</label>
                                        </br>
                                        {{ $Obj->admission_date }}
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>
                                        <label>Pain Intensity</label>
                                        </br><label class="text-primary">
                                        @if($Obj->pain_intensity != null) {{ $painIntensity[$Obj->pain_intensity] }}  @endif
                                        </label>
                                      </td>
                                      <td>
                                        <label>Personal Care</label>
                                        </br><label class="text-primary">
                                        @if($Obj->personal_care != null) {{ $persCare[$Obj->personal_care] }} @endif
                                        </label>
                                      </td>
                                      <td>
                                        <label>Lifting</label>
                                        </br><label class="text-primary">
                                        @if($Obj->lifting != null) {{ $modq_lifting[$Obj->lifting] }} @endif
                                        </label>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>
                                        <label>Walking</label>
                                        </br><label class="text-primary">
                                        @if($Obj->walking != null) {{ $modq_walking[$Obj->walking] }} @endif
                                        </label>
                                      </td>
                                      <td>
                                        <label>Sitting</label>
                                        </br><label class="text-primary">
                                        @if($Obj->sitting != null) {{ $modq_sitting[$Obj->sitting] }} @endif
                                        </label>
                                      </td>
                                      <td>
                                        <label>Standing</label>
                                        </br><label class="text-primary">
                                        @if($Obj->standing != null) {{ $modq_standing[$Obj->standing] }} @endif
                                        </label>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>
                                        <label>Sleeping</label>
                                        </br><label class="text-primary">
                                        @if($Obj->sleeping != null) {{ $modq_sleeping[$Obj->sleeping] }} @endif
                                        </label>
                                      </td>
                                      <td>
                                        <label>Social Life</label>
                                        </br><label class="text-primary">
                                        @if($Obj->social_life != null) {{ $modq_sociallife[$Obj->social_life] }} @endif
                                        </label>
                                      </td>
                                      <td>
                                        <label>Travelling</label>
                                        </br><label class="text-primary">
                                        @if($Obj->travelling != null) {{ $modq_travelling[$Obj->travelling] }} @endif
                                        </label>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>
                                        <label>Employment Home Making</label>
                                        </br><label class="text-primary">
                                        @if($Obj->employment_home_making != null) {{ $modq_emphome[$Obj->employment_home_making] }} @endif
                                        </label>
                                      </td>
                                      <td>
                                        <label>Total</label>
                                        </br><label class="text-primary">
                                        {{ $Obj->total }}
                                        </label>
                                      </td>
                                      <td>
                                        <label>M O D Q  Score</label>
                                        </br><label class="text-primary">
                                        {{ $Obj->modq_score }}
                                        </label>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td colspan="2">
                                        <label>Comment</label>
                                        </br>
                                        {{ $Obj->comment_entered_by }}
                                      </td>
                                    </tr>
                                    <tr>
                                      <td colspan="1">
                                        <label>Entered By</label>
                                        </br>
                                        {{ $Obj->entered_by }}
                                      </td>
                                      <td colspan="1">
                                        <label>Entry Date</label>
                                        </br>
                                        {{ date('d-m-Y', strtotime($Obj->entry_date)) }}
                                      </td>
                                    </tr>

                                  </tbody>
                                </table>
                              </div>
                              @php
                                $j = $j + 1;
                              @endphp
                            @endforeach
                          </div><!-- ./End of Tab div -->
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

