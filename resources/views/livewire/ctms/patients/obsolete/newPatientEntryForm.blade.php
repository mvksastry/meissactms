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
                  Patient Primary Information
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
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="4" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td colspan="1">
                                      <label>Center*</label>
                                        <select wire:model="form.center_id" class="form-control">
                                        <option value="-1">Select</option>
                                        </select>
                                    </td>
                                    <td colspan="1">
                                      <label>Select Arm*</label>
                                      <select wire:model="form.ctarm_id" class="form-control">
                                        <option value="-1">Select</option>
                                      </select>
                                    </td>
                                    <td colspan="1">
                                      <label>Opd ID*</label>
                                      <input class="form-control" id="opd_id" wire:model="form.opd_id" type="text">
                                    </td>
                                    <td colspan="1">
                                      <label>In Patient ID*</label>
                                      <input placeholder="In Patient ID" class="form-control" wire:model.defer="form.in_patient_id" id="in_patient_id">
                                    </td>
                                    <td colspan="1">
                                      <label>Admission Date*</label>
                                      <input class="form-control" id="admission_date" wire:model="form.admission_date" type="text">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
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
                                    <td colspan="1">
                                      <label>Aadhar ID*</label>
                                      <input wire:model.defer="form.aadhar_id" id="aadhar_id" type="text" value="null" class="form-control" placeholder="Aadhar ID">
                                    </td>
                                    <td colspan="1">
                                      <label>PAN*</label>
                                      <input wire:model.defer="form.pan_num" id="pan_num" type="text" value="null" class="form-control" placeholder="PAN">
                                    </td>
                                    <td colspan="1">
                                      <label>Other ID*</label>
                                      <input wire:model.defer="form.other_id" id="other_id" type="text" value="null" class="form-control" placeholder="Other ID" >
                                    </td>
                                    <td colspan="1">
                                      <label>Occupation*</label>
                                      <input wire:model.defer="form.other_id" id="other_id" type="text" value="null" class="form-control" placeholder="Occupation" >
                                    </td>
                                  </tr>  
                                  <tr>
                                    <td colspan="4"> 
                                      <label>Patient Primary Information*</label>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="1">
                                      <label>Name*</label>
                                      <input wire:model="form.name" id="name" type="text" value="null" class="form-control" placeholder="Full Name">
                                    </td>
                                    <td colspan="1">
                                      <label>Nick Name*</label>
                                      <input wire:model="form.nick_name" id="item_desc" type="text" value="null" class="form-control" placeholder="Nick Name">
                                    </td>
                                    <td colspan="1">
                                      <label>Alias Name*</label>
                                      <input wire:model="form.alias_name" id="description" type="text" value="null" class="form-control" placeholder="Alias Name">
                                    </td>
                                    <td colspan="1">
                                      <label>Gender*</label>
                                      <input wire:model.defer="form.gender" id="item_desc" type="text" value="null" class="form-control" placeholder="Gender">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="1">
                                      <label>Date of Birth*</label>
                                      <input wire:model="form.date_of_birth" id="date_of_birth" type="text" value="null" class="form-control" placeholder="Date of Birth">
                                    </td>
                                    <td colspan="1">
                                      <label>Age*</label>
                                      <input wire:model.defer="form.age" id="age" type="text"  class="form-control" placeholder="Age">
                                    </td>
                                    <td colspan="1">
                                      <label>Primary Phone*</label>
                                      <input wire:model="form.primary_phone_number" id="primary_phone_number" type="text" value="null" class="form-control" placeholder="Primary Phone Number">
                                    </td>
                                    <td colspan="1">
                                      <label>Alternate Phone*</label>
                                      <input wire:model.defer="form.alternate_phone_number" id="alternate_phone_number" type="text" value="null" class="form-control"  placeholder="Alternate Phone Numer">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="1">
                                      <label>Address*</label>
                                      <input wire:model="form.address" id="address" type="text" value="null" class="form-control" placeholder="Address">
                                    </td>
                                    <td colspan="1">
                                      <label>Land Mark*</label>
                                      <input wire:model.defer="form.age" id="age" type="text"  class="form-control" placeholder="Age">
                                    </td>
                                    <td colspan="1">
                                      <label>Taluka/Haveli*</label>
                                      <input wire:model="form.taluka_haveli" id="taluka_haveli" type="text" value="null" class="form-control" placeholder="taluka_haveli">
                                    </td>
                                    <td colspan="1">
                                      <label>State*</label>
                                      <input wire:model.defer="form.state" id="state" type="text" value="null" class="form-control"  placeholder="State">
                                    </td>
                                  </tr>                                  
                                </tbody>
                              </table>
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
                                    <td>
                                      <label>Emergency Contact Name*</label>
                                      <input wire:model="form.emergency_contact_name" id="emergency_contact_name" type="text" value="null" class="form-control" placeholder="Emergency Contact Name">
                                    </td>
                                    <td>
                                      <label>Emergency Contact Phone*</label>
                                      <input wire:model="form.emergency_contact_phone" id="emergency_contact_phone" type="text" value="null" class="form-control" placeholder="Emergency Contact Phone">
                                    </td>
                                    <td>
                                      <label>Alternate Contact Name*</label>
                                      <input wire:model.defer="form.alternate_contact_name"  id="alternate_contact_name" type="text" value="null" class="form-control" placeholder="Alternate Contact Name">
                                    </td>
                                    <td>
                                      <label>Alternate Contact Phone*</label>
                                      <input wire:model.defer="form.alternate_contact_phone" id="alternate_contact_phone" type="text" value="null" class="form-control" placeholder="Alternate Contact Phone">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="tab-pane" id="tab_4">
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="4" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td colspan="1">
                                      <label>Height*</label>
                                      <input wire:model="form.height" id="height" type="text" value="null" class="form-control" placeholder="Height">
                                    </td>
                                    <td colspan="1">
                                      <label>Height Unit*</label>
                                      <input wire:model.defer="form.height_unit" id="height_unit" type="text" Value="centimeters" class="form-control" placeholder="Height Unit" >
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="1">
                                      <label>Weight*</label>
                                      <input wire:model="form.weight" id="weight" type="text" value="null" class="form-control" placeholder="Weight">
                                    </td>
                                    <td colspan="1">
                                      <label>Weight Unit*</label>
                                      <input wire:model.defer="form.weight_unit" id="item_desc" type="text" Value="kilo gram" class="form-control" placeholder="Weight Unit">
                                    </td>
                                    <td colspan="1">
                                      <label>BMI*</label>
                                      <input wire:model.defer="form.bmi" id="item_desc" type="text" value="null" class="form-control" placeholder="BMI" >
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
                                    <th colspan="4" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody>        
                                  <tr>
                                    <td colspan="2">
                                      <label>Consent Status*</label>
                                      <input wire:model="form.consent_status" id="consent_status"  type="text" value="null" class="form-control" placeholder="Consent Status">
                                    </td>
                                    <td colspan="2">
                                      <label>Consent Date*</label>
                                      <input wire:model="form.consent_date" id="consent_date"  type="date" class="form-control" placeholder="Consent Date">
                                    </td>
                                    <td colspan="2">
                                      <label>Consent Audio/Video*</label>
                                      <input wire:model.defer="form.consent_av" id="item_desc" type="text" value="null" class="form-control" value="null" placeholder="Consent A V">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <label>Consent Approval Date*</label>
                                      <input wire:model="form.consent_approval_date" id="consent_approval_date" type="text" value="null" class="form-control" placeholder="Consent Approval Date">
                                    </td>
                                    <td colspan="2">
                                      <label>Consent Approval Reference*</label>
                                      <input wire:model="form.consent_approval_reference" id="consent_approval_reference" type="text" value="null" class="form-control" placeholder="Consent Approval Reference">
                                    </td>
                                    <td colspan="2">
                                      <label>Consent Approval File*</label>
                                      <input wire:model.defer="form.consent_approval_file" id="item_desc" type="text" value="null" class="form-control" placeholder="Consent Approval File">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="tab-pane" id="tab_6">
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="4" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody>        
                                  <tr>
                                    <td colspan="4">
                                      <label>General Surgical Information*</label>
                                      <input wire:model="form.gen_surgical_info" id="description" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>At Lumbar Region*</label>
                                      <input wire:model="form.surgery_at_lumbar" id="description" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="1">
                                      <label>Malignancies*</label>
                                      <input wire:model.defer="form.malignancies" id="item_desc" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>General Medical History*</label>
                                      <input wire:model="form.general_medical_history" id="description" type="text"  Value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Infections Suffered*</label>
                                      <input wire:model="form.infections_suffered" id="description" type="text"  Value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>General Inflammatory Diseases*</label>
                                      <input wire:model.defer="form.general_inflammatory_diseases" id="item_desc" type="text" Value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Ankylosing Spondylosis*</label>
                                      <input wire:model.defer="form.ankylosing_spondylosis" id="item_desc" type="text"  value="null" class="form-control"placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Rheumatoid Arthritis*</label>
                                      <input wire:model.defer="form.rheumatoid_arthritis" id="item_desc" type="text"  value="null" class="form-control"placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Chronic Kidney Issues*</label>
                                      <input wire:model.defer="form.chronic_kidney_issues" id="item_desc" value="null" type="text" value="null" class="form-control" placeholder="Description" >
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Chronic Liver Issues*</label>
                                      <input wire:model.defer="form.chronic_liver_issues" id="item_desc" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>HIV*</label>
                                      <input wire:model.defer="form.hiv" id="item_desc" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>AIDS*</label>
                                      <input wire:model.defer="form.aids" id="item_desc" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Hepatitis B*</label>
                                      <input wire:model.defer="form.hepatitis_b" id="item_desc" value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Hepatitis C*</label>
                                      <input wire:model.defer="form.hepatitis_c" id="item_desc" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Diabetes Mellitus Self*</label>
                                      <input wire:model.defer="form.diabetes_mellitus_self" id="item_desc" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Diabetes Mellitus Family*</label>
                                      <input wire:model.defer="form.diabetes_mellitus_family" id="item_desc" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Hypertension Self*</label>
                                      <input wire:model.defer="form.hypertension_self" id="item_desc" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Hypertension Family*</label>
                                      <input  wire:model.defer="form.hypertension_family" id="item_desc" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>IHD Self*</label>
                                      <input wire:model.defer="form.ihd_self" id="item_desc" type="text" value="null" class="form-control"placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>IHD Family*</label>
                                      <input wire:model.defer="form.ihd_family" id="item_desc" type="text" value="null" class="form-control" placeholder="Description" >
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Paralysis Self*</label>
                                      <input wire:model.defer="form.paralysis_self" id="item_desc" type="text" value="null" class="form-control" placeholder="Description" >
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Paralysis Family*</label>
                                      <input wire:model.defer="form.paralysis_family" id="item_desc" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>


                            <div class="tab-pane" id="tab_7">
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="4" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody>        
                                  <tr>
                                    <td colspan="4">
                                      <label>Past Complaints*</label>
                                      <input wire:model="form.past_complaints" id="past_complaints" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Present Complaint(s)*</label>
                                      <input wire:model="form.present_complaints" id="present_complaints" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="1">
                                      <label>Medications - Past*</label>
                                      <input wire:model.defer="form.past_medications" id="past_medications" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Medications - Present*</label>
                                      <input wire:model="form.present_medications" id="present_medications" type="text"  Value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Addictive Substances*</label>
                                      <input wire:model="form.addictive_substance_use" id="addictive_substance_use" type="text"  Value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Non Addictive Substances*</label>
                                      <input wire:model.defer="form.non_addictive_substance_use" id="non_addictive_substance_use" type="text" Value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Past History*</label>
                                      <input wire:model.defer="form.past_history" id="past_history" type="text"  value="null" class="form-control"placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Family History Notable*</label>
                                      <input wire:model.defer="form.notable_family_history" id="notable_family_history" type="text"  value="null" class="form-control"placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Before Problem Occupation*</label>
                                      <input wire:model.defer="form.before_problem_occupation" id="before_problem_occupation" value="null" type="text" value="null" class="form-control" placeholder="Description" >
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Habits*</label>
                                      <input wire:model.defer="form.general_habits" id="general_habits" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>


                            <div class="tab-pane" id="tab_8">
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="3" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody>        
                                  <tr>
                                    <td colspan="1">
                                      <label>Consumption Non Tobacco Gutka Pan*</label>
                                      <input wire:model="form.consumption_non_tgp" id="consumption_non_tgp" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                    <td colspan="1">
                                      <label>Tobacco*</label>
                                      <input wire:model="form.consumption_tobacco" id="consumption_tobacco" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                    <td colspan="1">
                                      <label>Gutka*</label>
                                      <input wire:model.defer="form.consumption_gutka" id="consumption_gutka" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="1">
                                      <label>Pan / Masala*</label>
                                      <input wire:model="form.consumption_pan" id="consumption_pan_masala" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                    <td colspan="2">
                                      <label>Any Other*</label>
                                      <input wire:model="form.anyother_habbits" id="anyother_habbits" type="text" value="null" class="form-control" placeholder="Description">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="tab_9">
                              @include('livewire.ctms.patients.controls')
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