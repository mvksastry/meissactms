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
                  Form 1: Clinical Evaluation – Modified Oswestry Disability Questionnaire
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
                          <h3 class="card-title p-3">Information</h3>
                          <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Clinical</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">MODI Questionare</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Official</a></li>
                          </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
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
                                      <input wire:model="form.opd_id" id="opd_id" type="text" class="form-control" placeholder="Out Patient ID">
                                    </td>
                                    <td colspan="1">
                                      <label>In Patient ID*</label>
                                      <input wire:model.defer="form.in_patient_id" id="in_patient_id" type="text" class="form-control">
                                    </td>
                                    <td colspan="1">
                                      <label>Investigation Report Date*</label>
                                      <input wire:model="form.report_date" id="report_date" type="date" class="form-control" placeholder="Report Date">
                                    </td>
                                  </tr>
                                  <tr>
                                  <td colspan="1">
                                      <label>Admission Date*</label>
                                      <input wire:model.defer="form.aadhar_id" id="aadhar_id" type="text" value="null" class="form-control" placeholder="Aadhar ID">
                                    </td>
                                    <td colspan="1">
                                      <label>Discharge Date*</label>
                                      <input wire:model.defer="form.pan_num" id="pan_num" type="text" value="null" class="form-control" placeholder="PAN">
                                    </td>
                                    <td colspan="1">
                                      <label>Discharge Report*</label>
                                      <input wire:model.defer="form.other_id" id="other_id" type="text" value="null" class="form-control" placeholder="Other ID" >
                                    </td>
                                    <td colspan="1">
                                      <label>Discharge Report File*</label>
                                      <input wire:model.defer="form.dicharge_rep_file" id="dicharge_rep_file" type="text" value="null" class="form-control" placeholder="Other ID" >
                                    </td>
                                  </tr>  
                                </tbody>
                              </table>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">

                              <div class="form-group">
                                <label>Pain Intensity</label>
                                <div class="form-check">
                                  <input wire:model="pain_intensity" class="form-check-input" type="radio" value="0" id="pain_intensity" name="pain_intensity">
                                  <label class="form-check-label">I can tolerate the pain I have without having to use pain medication.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="pain_intensity" class="form-check-input" type="radio" value="1" id="pain_intensity" name="pain_intensity">
                                  <label class="form-check-label">The pain is bad, but I can manage without having to take pain medication.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="pain_intensity" class="form-check-input" type="radio" value="2" id="pain_intensity" name="pain_intensity">
                                  <label class="form-check-label">Pain medication provides me with complete relief from pain.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="pain_intensity" class="form-check-input" type="radio" value="3" id="pain_intensity" name="pain_intensity">
                                  <label class="form-check-label">Pain medication provides me with moderate relief from pain.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="pain_intensity" class="form-check-input" type="radio" value="4" id="pain_intensity" name="pain_intensity">
                                  <label class="form-check-label">Pain medication provides me with little relief from pain.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="pain_intensity" class="form-check-input" type="radio" value="5" id="pain_intensity" name="pain_intensity">
                                  <label class="form-check-label">Pain medication has no effect on my pain.</label>
                                </div>
                                <div class="form-check">
                                  <label class="form-check-label">Checked: {{ $pain_intensity }}</label>
                                </div>
                              </div>

                              <div class="form-group">
                                <label>Personal Care (eg. Washing, Dressing )</label>
                                <div class="form-check">
                                  <input wire:model="personal_care" class="form-check-input" type="radio" value="0" id="personal_care" name="personal_care">
                                  <label class="form-check-label">I can take care of myself normally without causing increased pain</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="personal_care" class="form-check-input" type="radio" value="1" id="personal_care" name="personal_care">
                                  <label class="form-check-label">I can take care of myself normally, but it increases my pain</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="personal_care" class="form-check-input" type="radio" value="2" id="personal_care" name="personal_care">
                                  <label class="form-check-label">It is painful to take care of myself, and I am slow and careful.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="personal_care" class="form-check-input" type="radio" value="3" id="personal_care" name="personal_care">
                                  <label class="form-check-label">I need help, but I am able to manage most of my personal care.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="personal_care" class="form-check-input" type="radio" value="4" id="personal_care" name="personal_care">
                                  <label class="form-check-label">I need help every day in most aspects of my care.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="personal_care" class="form-check-input" type="radio" value="5" id="personal_care" name="personal_care">
                                  <label class="form-check-label">I do not get dressed, I wash with difficulty, and I stay in bed.</label>
                                </div>
                                <div class="form-check">
                                  <label class="form-check-label">Checked: {{ $personal_care }}</label>
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Lifting</label>
                                <div class="form-check">
                                  <input wire:model="lifting" class="form-check-input" type="radio" value="0" id="lifting" name="lifting">
                                  <label class="form-check-label">I can lift heavy weights without increased pain.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="lifting" class="form-check-input" type="radio" value="1" id="lifting" name="lifting">
                                  <label class="form-check-label">I can life heavy weights, but it causes increased pain.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="lifting" class="form-check-input" type="radio" value="2" id="lifting" name="lifting">
                                  <label class="form-check-label">Pain prevents me from lifting heavy weights off the floor, but I can manage if the weights are conveniently positioned (e.g. on a table)
.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="lifting" class="form-check-input" type="radio" value="3" id="lifting" name="lifting">
                                  <label class="form-check-label">Pain prevents me from lifting heavy weights, but I can manage light to medium weights if they are conveniently positioned.
.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="lifting" class="form-check-input" type="radio" value="4" id="lifting" name="lifting">
                                  <label class="form-check-label">I can lift only very light weights.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="lifting" class="form-check-input" type="radio" value="5" id="lifting" name="lifting">
                                  <label class="form-check-label">I cannot lift or carry anything at all.</label>
                                </div>
                                <div class="form-check">
                                  <label class="form-check-label">Checked: {{ $lifting }}</label>
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Walking</label>
                                <div class="form-check">
                                  <input wire:model="walking" class="form-check-input" type="radio" value="0" id="walking" name="walking">
                                  <label class="form-check-label">Pain does not prevent me from walking any distance.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="walking" class="form-check-input" type="radio" value="1" id="walking" name="walking">
                                  <label class="form-check-label">Pain prevents me from walking more than 1 mile.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="walking" class="form-check-input" type="radio" value="2" id="walking" name="walking">
                                  <label class="form-check-label">Pain prevents me from walking more than 1/2 (half) mile.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="walking" class="form-check-input" type="radio" value="3" id="walking" name="walking">
                                  <label class="form-check-label">Pain prevents me from walking more than 1/4 (quarter) mile.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="walking" class="form-check-input" type="radio" value="4" id="walking" name="walking">
                                  <label class="form-check-label">I can walk only with crutches or a cane.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="walking" class="form-check-input" type="radio" value="5" id="walking" name="walking">
                                  <label class="form-check-label">I am in bed most of the time and have to crawl to the toilet.</label>
                                </div>
                                <div class="form-check">
                                  <label class="form-check-label">Checked: {{ $walking }}</label>
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Sitting</label>
                                <div class="form-check">
                                  <input wire:model="sitting" class="form-check-input" type="radio" value="0" id="sitting" name="sitting">
                                  <label class="form-check-label">I can sit in any chair as long as I like.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="sitting" class="form-check-input" type="radio" value="1" id="sitting" name="sitting">
                                  <label class="form-check-label">I can only sit in my favourite chair as long as I like.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="sitting" class="form-check-input" type="radio" value="2" id="sitting" name="sitting">
                                  <label class="form-check-label">Pain prevents me from sitting for more than 1 hour.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="sitting" class="form-check-input" type="radio" value="3" id="sitting" name="sitting">
                                  <label class="form-check-label">Pain prevents me from sitting for more than 1/2 hour..</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="sitting" class="form-check-input" type="radio" value="4" id="sitting" name="sitting">
                                  <label class="form-check-label">Pain prevents me from sitting for more than 10 minutes.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="sitting" class="form-check-input" type="radio" value="5" id="sitting" name="sitting">
                                  <label class="form-check-label">Pain prevents me from sitting at all.</label>
                                </div>
                                <div class="form-check">
                                  <label class="form-check-label">Checked: {{ $sitting }}</label>
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Standing</label>
                                <div class="form-check">
                                  <input wire:model="standing" class="form-check-input" type="radio" value="0" id="standing" name="standing">
                                  <label class="form-check-label">I can stand as long as I want without increased pain.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="standing" class="form-check-input" type="radio" value="1" id="standing" name="standing">
                                  <label class="form-check-label">I can stand as long as I want, but it increases my pain.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="standing" class="form-check-input" type="radio" value="2" id="standing" name="standing">
                                  <label class="form-check-label">Pain prevents me from standing for more than 1 hour.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="standing" class="form-check-input" type="radio" value="3" id="standing" name="standing">
                                  <label class="form-check-label">Pain prevents me from standing for more than 1/2 hour.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="standing" class="form-check-input" type="radio" value="4" id="standing" name="standing">
                                  <label class="form-check-label">Pain prevents me from standing for more than 10 minutes.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="standing" class="form-check-input" type="radio" value="5" id="standing" name="standing">
                                  <label class="form-check-label">Pain prevents me from standing at all.</label>
                                </div>
                                <div class="form-check">
                                  <label class="form-check-label">Checked: {{ $standing }}</label>
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Sleeping</label>
                                <div class="form-check">
                                  <input wire:model="sleeping" class="form-check-input" type="radio" value="0" id="sleeping" name="sleeping">
                                  <label class="form-check-label">Pain does not prevent me from sleeping well.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="sleeping" class="form-check-input" type="radio" value="1" id="sleeping" name="sleeping">
                                  <label class="form-check-label">I can sleep well only by using pain medication.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="sleeping" class="form-check-input" type="radio" value="2" id="sleeping" name="sleeping">
                                  <label class="form-check-label">Even when I take medication, I sleep less than 6 hours.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="sleeping" class="form-check-input" type="radio" value="3" id="sleeping" name="sleeping">
                                  <label class="form-check-label">Even when I take medication, I sleep less than 4 hours.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="sleeping" class="form-check-input" type="radio" value="4" id="sleeping" name="sleeping">
                                  <label class="form-check-label">Even when I take medication, I sleep less than 2 hours.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="sleeping" class="form-check-input" type="radio" value="5" id="sleeping" name="sleeping">
                                  <label class="form-check-label">Pain prevents me from sleeping at all.</label>
                                </div>
                                <div class="form-check">
                                  <label class="form-check-label">Checked: {{ $sleeping }}</label>
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Social Life</label>
                                <div class="form-check">
                                  <input wire:model="social_life" class="form-check-input" type="radio" value="0" id="social_life" name="social_life">
                                  <label class="form-check-label">My social life is normal and does not increase my pain.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="social_life" class="form-check-input" type="radio" value="1" id="social_life" name="social_life">
                                  <label class="form-check-label">My social life is normal, but it increases my level of pain.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="social_life" class="form-check-input" type="radio" value="2" id="social_life" name="social_life">
                                  <label class="form-check-label">Pain prevents me from participating in more energetic activities (e.g. sport, dancing).</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="social_life" class="form-check-input" type="radio" value="3" id="social_life" name="social_life">
                                  <label class="form-check-label">Pain prevents me from going out very often.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="social_life" class="form-check-input" type="radio" value="4" id="social_life" name="social_life">
                                  <label class="form-check-label">Pain has restricted my social life to my home.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="social_life" class="form-check-input" type="radio" value="5" id="social_life" name="social_life">
                                  <label class="form-check-label">I have hardly any social life because of my pain.</label>
                                </div>
                                <div class="form-check">
                                  <label class="form-check-label">Checked: {{ $social_life }}</label>
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Travelling</label>
                                <div class="form-check">
                                  <input wire:model="travelling" class="form-check-input" type="radio" value="0" id="travelling" name="travelling">
                                  <label class="form-check-label">I can travel anywhere without increased pain.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="travelling" class="form-check-input" type="radio" value="1" id="travelling" name="travelling">
                                  <label class="form-check-label">I can travel anywhere, but it increases my pain.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="travelling" class="form-check-input" type="radio" value="2" id="travelling" name="travelling">
                                  <label class="form-check-label">My pain restricts my travel over 2 hours..</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="travelling" class="form-check-input" type="radio" value="3" id="travelling" name="travelling">
                                  <label class="form-check-label">My pain restricts my travel over 1 hours.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="travelling" class="form-check-input" type="radio" value="4" id="travelling" name="travelling">
                                  <label class="form-check-label">My pain restricts my travel to short necessary journeys under 1/2 hours.</label>
                                </div>
                                <div class="form-check">
                                  <input  wire:model="travelling" class="form-check-input" type="radio" value="5" id="travelling" name="travelling">
                                  <label class="form-check-label">My pain prevents all travel except for visits to the physician/therapist or hospital.</label>
                                </div>
                                <div class="form-check">
                                  <label class="form-check-label">Checked: {{ $travelling }}</label>
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Employment & Home Making</label>
                                <div class="form-check">
                                  <input  wire:model="emp_home" class="form-check-input" type="radio" value="0" id="emp_home" name="emp_home">
                                  <label class="form-check-label">My normal homemaking/job activities do not cause pain.</label>
                                </div>
                                <div class="form-check">
                                  <input  wire:model="emp_home" class="form-check-input" type="radio" value="1" id="emp_home" name="emp_home">
                                  <label class="form-check-label">My normal homemaking/job activities increase my pain, but i can still perform all that is required of me.</label>
                                </div>
                                <div class="form-check">
                                  <input  wire:model="emp_home" class="form-check-input" type="radio" value="2" id="emp_home" name="emp_home">
                                  <label class="form-check-label">I can perform most of my homemaking/job duties, but pain prevents me from
performing more physically stressful activities(e.g. lifting, vacuuming).</label>
                                </div>
                                <div class="form-check">
                                  <input  wire:model="emp_home" class="form-check-input" type="radio" value="3" id="emp_home" name="emp_home">
                                  <label class="form-check-label">Pain prevents me from doing anything but light duties.</label>
                                </div>
                                <div class="form-check">
                                  <input  wire:model="emp_home" class="form-check-input" type="radio" value="4" id="emp_home" name="emp_home">
                                  <label class="form-check-label">Pain prevents me from doing even light duties.</label>
                                </div>
                                <div class="form-check">
                                  <input wire:model="emp_home" class="form-check-input" type="radio" value="5" id="emp_home" name="emp_home">
                                  <label class="form-check-label">Pain prevents me from performing any job or homemaking chores.</label>
                                </div>
                                <div class="form-check">
                                  <label class="form-check-label">Checked: {{ $emp_home }}</label>
                                </div>
                              </div>

                              
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="3" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody>        
                                  <tr>
                                    <td colspan="1">
                                      <label>Entered By*</label>
                                      <input wire:model="form.entered_by" id="entered_by" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                    <td colspan="1">
                                      <label>Entry Date*</label>
                                      <input wire:model="form.entry_date" id="entry_date" type="date" value="null" class="form-control" placeholder="Description">
                                    </td>
                                    <td colspan="1">
                                      <label>Verified By*</label>
                                      <input wire:model.defer="form.verified_by" id="consumption_gutka" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                    <td colspan="1">
                                      <label>Verified Date*</label>
                                      <input wire:model.defer="form.verified_date" id="consumption_gutka" type="date" value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="1">
                                      <label>Entry Sealed By*</label>
                                      <input wire:model="form.entry_sealed_by" id="entry_sealed_by" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                    <td colspan="2">
                                      <label>Sealed Date*</label>
                                      <input wire:model="form.entry_sealed_date" id="entry_sealed_date" type="date" value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <!-- /.tab-pane -->
                            <!-- /.tab-content -->
                          </div>
                          <button wire:click="fnSavePrimaryInfo()" class="btn btn-success text-white font-normal mt-3 rounded">ADD PRIMARY INFO</button>
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