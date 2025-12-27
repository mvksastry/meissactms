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
                  Edit Form 1: Clinical Evaluation – Modified Oswestry Disability Questionnaire -
                </h3>
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Date Created: {{ ($modq_obj != null) ? $modq_obj->created_at : null }}
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
                        @if($sys_panel)
                          @include('livewire.error-alerts-callouts')
                        @endif
                        @if($msg_panel)
                          @include('livewire.error-alerts-callouts')
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
                      <div class="card">
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Information</h3>
                          <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">MODI Questionare</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Score</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Clinical</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Official</a></li>
                          </ul>
                        </div><!-- /.card-header -->


                        <div class="card-body">
                          <div class="tab-content">
                            <!-- /.tab-pane -->
                            <div class="tab-pane active" id="tab_1">
                              <div class="row">
                                <div class="col-6">
                                  <div class="card-body">
                                    <label class="form-check-label">Make Selections.</label>
                                    <div class="form-group">
                                      <label>Pain Intensity</label>
                                      <div class="form-check">
                                        <input wire:model.live="pain_intensity" class="form-check-input" type="radio" value="0" id="pain_intensity" name="pain_intensity">
                                        <label class="form-check-label">I can tolerate the pain I have without having to use pain medication.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="pain_intensity" class="form-check-input" type="radio" value="1" id="pain_intensity" name="pain_intensity">
                                        <label class="form-check-label">The pain is bad, but I can manage without having to take pain medication.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="pain_intensity" class="form-check-input" type="radio" value="2" id="pain_intensity" name="pain_intensity">
                                        <label class="form-check-label">Pain medication provides me with complete relief from pain.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="pain_intensity" class="form-check-input" type="radio" value="3" id="pain_intensity" name="pain_intensity">
                                        <label class="form-check-label">Pain medication provides me with moderate relief from pain.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="pain_intensity" class="form-check-input" type="radio" value="4" id="pain_intensity" name="pain_intensity">
                                        <label class="form-check-label">Pain medication provides me with little relief from pain.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="pain_intensity" class="form-check-input" type="radio" value="5" id="pain_intensity" name="pain_intensity">
                                        <label class="form-check-label">Pain medication has no effect on my pain.</label>
                                      </div>
                                      <div class="form-check">
                                        <label class="form-check-label">Checked:{{ $painIntensitySelected }}</label>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Personal Care (eg. Washing, Dressing )</label>
                                      <div class="form-check">
                                        <input wire:model.live="personal_care" class="form-check-input" type="radio" value="0" id="personal_care" name="personal_care">
                                        <label class="form-check-label">I can take care of myself normally without causing increased pain</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="personal_care" class="form-check-input" type="radio" value="1" id="personal_care" name="personal_care">
                                        <label class="form-check-label">I can take care of myself normally, but it increases my pain</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="personal_care" class="form-check-input" type="radio" value="2" id="personal_care" name="personal_care">
                                        <label class="form-check-label">It is painful to take care of myself, and I am slow and careful.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="personal_care" class="form-check-input" type="radio" value="3" id="personal_care" name="personal_care">
                                        <label class="form-check-label">I need help, but I am able to manage most of my personal care.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="personal_care" class="form-check-input" type="radio" value="4" id="personal_care" name="personal_care">
                                        <label class="form-check-label">I need help every day in most aspects of my care.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="personal_care" class="form-check-input" type="radio" value="5" id="personal_care" name="personal_care">
                                        <label class="form-check-label">I do not get dressed, I wash with difficulty, and I stay in bed.</label>
                                      </div>
                                      <div class="form-check">
                                        <label class="form-check-label">Checked: {{ $personalCareSelected }}</label>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Lifting</label>
                                      <div class="form-check">
                                        <input wire:model.live="lifting" class="form-check-input" type="radio" value="0" id="lifting" name="lifting">
                                        <label class="form-check-label">I can lift heavy weights without increased pain.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="lifting" class="form-check-input" type="radio" value="1" id="lifting" name="lifting">
                                        <label class="form-check-label">I can life heavy weights, but it causes increased pain.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="lifting" class="form-check-input" type="radio" value="2" id="lifting" name="lifting">
                                        <label class="form-check-label">Pain prevents me from lifting heavy weights off the floor, but I can manage if the weights are conveniently positioned (e.g. on a table)
      .</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="lifting" class="form-check-input" type="radio" value="3" id="lifting" name="lifting">
                                        <label class="form-check-label">Pain prevents me from lifting heavy weights, but I can manage light to medium weights if they are conveniently positioned.
      .</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="lifting" class="form-check-input" type="radio" value="4" id="lifting" name="lifting">
                                        <label class="form-check-label">I can lift only very light weights.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="lifting" class="form-check-input" type="radio" value="5" id="lifting" name="lifting">
                                        <label class="form-check-label">I cannot lift or carry anything at all.</label>
                                      </div>
                                      <div class="form-check">
                                        <label class="form-check-label">Checked: {{ $liftingSelected }}</label>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Walking</label>
                                      <div class="form-check">
                                        <input wire:model.live="walking" class="form-check-input" type="radio" value="0" id="walking" name="walking">
                                        <label class="form-check-label">Pain does not prevent me from walking any distance.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="walking" class="form-check-input" type="radio" value="1" id="walking" name="walking">
                                        <label class="form-check-label">Pain prevents me from walking more than 1 mile.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="walking" class="form-check-input" type="radio" value="2" id="walking" name="walking">
                                        <label class="form-check-label">Pain prevents me from walking more than 1/2 (half) mile.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="walking" class="form-check-input" type="radio" value="3" id="walking" name="walking">
                                        <label class="form-check-label">Pain prevents me from walking more than 1/4 (quarter) mile.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="walking" class="form-check-input" type="radio" value="4" id="walking" name="walking">
                                        <label class="form-check-label">I can walk only with crutches or a cane.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="walking" class="form-check-input" type="radio" value="5" id="walking" name="walking">
                                        <label class="form-check-label">I am in bed most of the time and have to crawl to the toilet.</label>
                                      </div>
                                      <div class="form-check">
                                        <label class="form-check-label">Checked: {{ $walkingSelected }}</label>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Sitting</label>
                                      <div class="form-check">
                                        <input wire:model.live="sitting" class="form-check-input" type="radio" value="0" id="sitting" name="sitting">
                                        <label class="form-check-label">I can sit in any chair as long as I like.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="sitting" class="form-check-input" type="radio" value="1" id="sitting" name="sitting">
                                        <label class="form-check-label">I can only sit in my favourite chair as long as I like.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="sitting" class="form-check-input" type="radio" value="2" id="sitting" name="sitting">
                                        <label class="form-check-label">Pain prevents me from sitting for more than 1 hour.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="sitting" class="form-check-input" type="radio" value="3" id="sitting" name="sitting">
                                        <label class="form-check-label">Pain prevents me from sitting for more than 1/2 hour..</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="sitting" class="form-check-input" type="radio" value="4" id="sitting" name="sitting">
                                        <label class="form-check-label">Pain prevents me from sitting for more than 10 minutes.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="sitting" class="form-check-input" type="radio" value="5" id="sitting" name="sitting">
                                        <label class="form-check-label">Pain prevents me from sitting at all.</label>
                                      </div>
                                      <div class="form-check">
                                        <label class="form-check-label">Checked: {{ $sittingSelected }}</label>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Standing</label>
                                      <div class="form-check">
                                        <input wire:model.live="standing" class="form-check-input" type="radio" value="0" id="standing" name="standing">
                                        <label class="form-check-label">I can stand as long as I want without increased pain.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="standing" class="form-check-input" type="radio" value="1" id="standing" name="standing">
                                        <label class="form-check-label">I can stand as long as I want, but it increases my pain.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="standing" class="form-check-input" type="radio" value="2" id="standing" name="standing">
                                        <label class="form-check-label">Pain prevents me from standing for more than 1 hour.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="standing" class="form-check-input" type="radio" value="3" id="standing" name="standing">
                                        <label class="form-check-label">Pain prevents me from standing for more than 1/2 hour.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="standing" class="form-check-input" type="radio" value="4" id="standing" name="standing">
                                        <label class="form-check-label">Pain prevents me from standing for more than 10 minutes.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="standing" class="form-check-input" type="radio" value="5" id="standing" name="standing">
                                        <label class="form-check-label">Pain prevents me from standing at all.</label>
                                      </div>
                                      <div class="form-check">
                                        <label class="form-check-label">Checked: {{ $standingSelected }}</label>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Sleeping</label>
                                      <div class="form-check">
                                        <input wire:model.live="sleeping" class="form-check-input" type="radio" value="0" id="sleeping" name="sleeping">
                                        <label class="form-check-label">Pain does not prevent me from sleeping well.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="sleeping" class="form-check-input" type="radio" value="1" id="sleeping" name="sleeping">
                                        <label class="form-check-label">I can sleep well only by using pain medication.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="sleeping" class="form-check-input" type="radio" value="2" id="sleeping" name="sleeping">
                                        <label class="form-check-label">Even when I take medication, I sleep less than 6 hours.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="sleeping" class="form-check-input" type="radio" value="3" id="sleeping" name="sleeping">
                                        <label class="form-check-label">Even when I take medication, I sleep less than 4 hours.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="sleeping" class="form-check-input" type="radio" value="4" id="sleeping" name="sleeping">
                                        <label class="form-check-label">Even when I take medication, I sleep less than 2 hours.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="sleeping" class="form-check-input" type="radio" value="5" id="sleeping" name="sleeping">
                                        <label class="form-check-label">Pain prevents me from sleeping at all.</label>
                                      </div>
                                      <div class="form-check">
                                        <label class="form-check-label">Checked: {{ $sleepingSelected }}</label>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Social Life</label>
                                      <div class="form-check">
                                        <input wire:model.live="social_life" class="form-check-input" type="radio" value="0" id="social_life" name="social_life">
                                        <label class="form-check-label">My social life is normal and does not increase my pain.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="social_life" class="form-check-input" type="radio" value="1" id="social_life" name="social_life">
                                        <label class="form-check-label">My social life is normal, but it increases my level of pain.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="social_life" class="form-check-input" type="radio" value="2" id="social_life" name="social_life">
                                        <label class="form-check-label">Pain prevents me from participating in more energetic activities (e.g. sport, dancing).</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="social_life" class="form-check-input" type="radio" value="3" id="social_life" name="social_life">
                                        <label class="form-check-label">Pain prevents me from going out very often.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="social_life" class="form-check-input" type="radio" value="4" id="social_life" name="social_life">
                                        <label class="form-check-label">Pain has restricted my social life to my home.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="social_life" class="form-check-input" type="radio" value="5" id="social_life" name="social_life">
                                        <label class="form-check-label">I have hardly any social life because of my pain.</label>
                                      </div>
                                      <div class="form-check">
                                        <label class="form-check-label">Checked: {{ $socialLifeSelected }}</label>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Travelling</label>
                                      <div class="form-check">
                                        <input wire:model.live="travelling" class="form-check-input" type="radio" value="0" id="travelling" name="travelling">
                                        <label class="form-check-label">I can travel anywhere without increased pain.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="travelling" class="form-check-input" type="radio" value="1" id="travelling" name="travelling">
                                        <label class="form-check-label">I can travel anywhere, but it increases my pain.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="travelling" class="form-check-input" type="radio" value="2" id="travelling" name="travelling">
                                        <label class="form-check-label">My pain restricts my travel over 2 hours..</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="travelling" class="form-check-input" type="radio" value="3" id="travelling" name="travelling">
                                        <label class="form-check-label">My pain restricts my travel over 1 hours.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="travelling" class="form-check-input" type="radio" value="4" id="travelling" name="travelling">
                                        <label class="form-check-label">My pain restricts my travel to short necessary journeys under 1/2 hours.</label>
                                      </div>
                                      <div class="form-check">
                                        <input  wire:model.live="travelling" class="form-check-input" type="radio" value="5" id="travelling" name="travelling">
                                        <label class="form-check-label">My pain prevents all travel except for visits to the physician/therapist or hospital.</label>
                                      </div>
                                      <div class="form-check">
                                        <label class="form-check-label">Checked: {{ $travelSelected }}</label>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Employment & Home Making</label>
                                      <div class="form-check">
                                        <input  wire:model.live="employment_home_making" class="form-check-input" type="radio" value="0" id="emp_home" name="emp_home">
                                        <label class="form-check-label">My normal homemaking/job activities do not cause pain.</label>
                                      </div>
                                      <div class="form-check">
                                        <input  wire:model.live="employment_home_making" class="form-check-input" type="radio" value="1" id="emp_home" name="emp_home">
                                        <label class="form-check-label">My normal homemaking/job activities increase my pain, but i can still perform all that is required of me.</label>
                                      </div>
                                      <div class="form-check">
                                        <input  wire:model.live="employment_home_making" class="form-check-input" type="radio" value="2" id="emp_home" name="emp_home">
                                        <label class="form-check-label">I can perform most of my homemaking/job duties, but pain prevents me from
      performing more physically stressful activities(e.g. lifting, vacuuming).</label>
                                      </div>
                                      <div class="form-check">
                                        <input  wire:model.live="employment_home_making" class="form-check-input" type="radio" value="3" id="emp_home" name="emp_home">
                                        <label class="form-check-label">Pain prevents me from doing anything but light duties.</label>
                                      </div>
                                      <div class="form-check">
                                        <input  wire:model.live="employment_home_making" class="form-check-input" type="radio" value="4" id="emp_home" name="emp_home">
                                        <label class="form-check-label">Pain prevents me from doing even light duties.</label>
                                      </div>
                                      <div class="form-check">
                                        <input wire:model.live="employment_home_making" class="form-check-input" type="radio" value="5" id="emp_home" name="emp_home">
                                        <label class="form-check-label">Pain prevents me from performing any job or homemaking chores.</label>
                                      </div>
                                      <div class="form-check">
                                        <label class="form-check-label">Checked: {{ $empHomeSelected }}</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-6">
                                  <div class="card-body">
                                    <label>Values Previously Selected</label>
                                    <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                      <thead>
                                        <tr>
                                          <th colspan="2" align="center"></th>
                                        </tr>
                                      </thead>
                                      <tbody> 
                                        <tr>
                                          <td>
                                            <label class="form-check-label">Pain Itensity </label>
                                          </td>
                                          <td>
                                            <label class="form-check-label">{{ ($modq_obj->pain_intensity != null) ? $painIntensity[$modq_obj->pain_intensity] : null}}</label>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <label class="form-check-label">Personal Care </label>
                                          </td>
                                          <td>
                                            <label class="form-check-label">{{ ($modq_obj->personal_care != null) ? $persCare[$modq_obj->personal_care] : null }}</label>
                                          </td>
                                        </tr>

                                        <tr>
                                          <td>
                                            <label class="form-check-label">Lifting</label>
                                          </td>
                                          <td>
                                            <label class="form-check-label">{{ ($modq_obj->lifting != null) ? $modq_lifting[$modq_obj->lifting] : null }}</label>
                                          </td>
                                        </tr>

                                        <tr>
                                          <td>
                                            <label class="form-check-label">Walking</label>
                                          </td>
                                          <td>
                                            <label class="form-check-label">{{ ($modq_obj->walking != null) ? $modq_walking[$modq_obj->walking] : null}}</label>
                                          </td>
                                        </tr>
                                        
                                        <tr>
                                          <td>
                                            <label class="form-check-label">Sitting </label>
                                          </td>
                                          <td>
                                            <label class="form-check-label">{{ ($modq_obj->sitting != null) ? $modq_sitting[$modq_obj->sitting] : null }} </label>
                                          </td>
                                        </tr>
                                        
                                        <tr>
                                          <td>
                                            <label class="form-check-label">Standing </label>
                                          </td> 
                                          <td>
                                            <label class="form-check-label">{{ ($modq_obj->standing != null) ? $modq_standing[$modq_obj->standing] : null }}</label>
                                          </td>
                                        </tr>
                                        
                                        <tr>
                                          <td>
                                            <label class="form-check-label">Sleeping </label>
                                          </td>
                                          <td>
                                            <label class="form-check-label">{{ ($modq_obj->sleeping != null) ? $modq_sleeping[$modq_obj->sleeping] : null}}</label>
                                          </td>
                                        </tr>
                                        
                                        <tr>
                                          <td>
                                            <label class="form-check-label">Social Life</label>
                                          </td>
                                          <td>
                                            <label class="form-check-label">{{ ($modq_obj->social_life) ? $modq_sociallife[$modq_obj->social_life] : null }} </label>
                                          </td>
                                        </tr>

                                        <tr>
                                          <td>
                                            <label class="form-check-label">Travelling</label>
                                          </td>
                                          <td>
                                            <label class="form-check-label">{{ ($modq_obj->travelling != null) ? $modq_travelling[$modq_obj->travelling] : null}}</label>
                                          </td>
                                        </tr>

                                        <tr>
                                          <td>
                                            <label class="form-check-label">Emp & Home Mkg:</label>
                                          </td>
                                          <td>
                                            <label class="form-check-label">{{ ($modq_obj->employment_home_making != null) ? $modq_emphome[$modq_obj->employment_home_making] : null }}</label>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                                                                
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- /.tab-pane -->
                            
                            <div class="tab-pane" id="tab_2">
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="4" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td>
                                      <label class="form-check-label">Pain Intensity: </label>
                                    </td>
                                    <td>
                                      {{ $painIntensitySelected }}
                                    </td>
                                  </tr>

                                  <tr>
                                    <td>
                                      <label class="form-check-label">Personal Care: </label>
                                    </td>
                                    <td>
                                      {{ $personalCareSelected }}
                                    </td>
                                  </tr>

                                  <tr>
                                    <td>
                                      <label class="form-check-label">Lifiting: </label>
                                    </td>
                                    <td>
                                      {{ $liftingSelected }}
                                    </td>
                                  </tr>

                                  <tr>
                                    <td>
                                      <label class="form-check-label">Walking: </label>
                                    </td>
                                    <td>
                                       {{ $walkingSelected }}
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>
                                      <label class="form-check-label">Sitting: </label>
                                    </td>
                                    <td>
                                      {{ $sittingSelected }}
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>
                                      <label class="form-check-label">Standing: </label>
                                    </td>
                                    <td>
                                      {{ $standingSelected }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label class="form-check-label">Sleeping: </label>
                                    </td>
                                    <td>
                                      {{ $sleepingSelected }}
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>
                                      <label class="form-check-label">Social Life: </label>
                                    </td>
                                    <td>
                                      {{ $socialLifeSelected }}
                                    </td>
                                  </tr>                                  
                                  <tr>
                                    <td>
                                      <label class="form-check-label">Travelling: </label>
                                    </td>
                                    <td>
                                      {{ $travelSelected }}
                                    </td>
                                  </tr> 
                                  <tr>
                                    <td>
                                      <label class="form-check-label">Employment & Home: </label>
                                    </td>
                                    <td>
                                      {{ $empHomeSelected }}
                                    </td>
                                  </tr>     
                                  <tr>
                                    <td>
                                      <label class="form-check-label">Total Sections Answere: </label>
                                    </td>
                                    <td>
                                      {{ $selectedCount }}
                                    </td>
                                  </tr>   
                                  <tr>
                                    <td>
                                      <label class="form-check-label">MOD Score: </label>
                                    </td>
                                    <td>
                                      Previous Total {{ ($modq_obj != null) ? $modq_obj->total  : null }}
                                    </br>
                                      Previous MODQ Score: {{ ($modq_obj != null) ? $modq_obj->modq_score  : null }}
                                  </br>
                                      Current: {{ $modq_score }} %
                                    </td>
                                  </tr>                         
                                </tbody>
                              </table>

                              <div class="form-check">
                              </div>
                            </div> 
                            <div class="tab-pane" id="tab_3">
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="4" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td colspan="1">
                                      <label>Opd ID*</label>
                                      <input wire:model="form.opd_id" class="form-control" placeholder="Out Patient ID">
                                    </td>
                                    <td colspan="1">
                                      <label>In Patient ID*</label>
                                      <input wire:model.defer="form.in_patient_id" type="text" class="form-control" placeholder="In Patient ID">
                                    </td>
                                    <td colspan="1">
                                      <label>Admission Date*</label>
                                      <input wire:model.defer="form.admission_date" type="date" class="form-control" placeholder="Admission Date">
                                    </td>
                                  </tr> 
                                </tbody>
                              </table>
                              
                            </div>                           
                            <div class="tab-pane" id="tab_4">

                                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th colspan="2" align="center"></th>
                                    </tr>
                                    </thead>
                                    <tbody>        
                                      <tr>
                                        <td colspan="2">
                                        <label>Comment*</label>
                                        <input wire:model="form.comment_entered_by" type="text" class="form-control" placeholder="Description">
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="1">
                                        <label>Entered By*</label>
                                        <input wire:model="form.entered_by" type="text" class="form-control" placeholder="Description">
                                        </td>
                                        <td colspan="1">
                                        <label>Entry Date*</label>
                                        <input wire:model="form.entry_date" type="date" class="form-control" placeholder="Description">
                                        </td>
                                      </tr>
                                    </tbody>
                                </table>

                             
                              <button wire:click="fnEditModqScoreData()" class="btn btn-warning font-normal mt-3 rounded">EDIT MODQ INFO</button>
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
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
</div>
