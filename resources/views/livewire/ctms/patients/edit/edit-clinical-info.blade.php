<div>
    {{-- The whole world belongs to you. --}}
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
                  Edit Clinical Investigations - Date Created {{ ($clinical_info != null) ? $clinical_info->created_at : ""; }}
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
                      <div class="card">
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Information</h3>
                          <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link {{ $activeTab === 'tab_1' ? 'active' : '' }}" href="#tab_1" wire:click.prevent="setActiveTab('tab_1')" data-toggle="tab">Cryptic</a></li>
                            <li class="nav-item"><a class="nav-link {{ $activeTab === 'tab_2' ? 'active' : '' }}" href="#tab_2" wire:click.prevent="setActiveTab('tab_2')" data-toggle="tab">BR</a></li>
                            <li class="nav-item"><a class="nav-link {{ $activeTab === 'tab_3' ? 'active' : '' }}" href="#tab_3" wire:click.prevent="setActiveTab('tab_3')" data-toggle="tab">LFT&Elec</a></li>
                            <li class="nav-item"><a class="nav-link {{ $activeTab === 'tab_4' ? 'active' : '' }}" href="#tab_4" wire:click.prevent="setActiveTab('tab_4')" data-toggle="tab">RFT</a></li>
                            <li class="nav-item"><a class="nav-link {{ $activeTab === 'tab_5' ? 'active' : '' }}" href="#tab_5" wire:click.prevent="setActiveTab('tab_5')" data-toggle="tab">BS/CRP/IL6</a></li>
                            <li class="nav-item"><a class="nav-link {{ $activeTab === 'tab_6' ? 'active' : '' }}" href="#tab_6" wire:click.prevent="setActiveTab('tab_6')" data-toggle="tab">PLI</a></li>
                            <li class="nav-item"><a class="nav-link {{ $activeTab === 'tab_7' ? 'active' : '' }}" href="#tab_7" wire:click.prevent="setActiveTab('tab_7')" data-toggle="tab">CE</a></li>
                            <li class="nav-item"><a class="nav-link {{ $activeTab === 'tab_8' ? 'active' : '' }}" href="#tab_8" wire:click.prevent="setActiveTab('tab_8')" data-toggle="tab">ME</a></li>
                            <li class="nav-item"><a class="nav-link {{ $activeTab === 'tab_9' ? 'active' : '' }}" href="#tab_9" wire:click.prevent="setActiveTab('tab_9')" data-toggle="tab">UR</a></li>
                            <li class="nav-item"><a class="nav-link {{ $activeTab === 'tab_10' ? 'active' : '' }}" href="#tab_10" wire:click.prevent="setActiveTab('tab_10')" data-toggle="tab">Drugs</a></li>
                            <li class="nav-item"><a class="nav-link {{ $activeTab === 'tab_11' ? 'active' : '' }}" href="#tab_11" wire:click.prevent="setActiveTab('tab_10')" data-toggle="tab">GS</a></li>
                          </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content">
                            <div class="tab-pane {{ $activeTab === 'tab_1' ? 'active' : '' }}" id="tab_1">
                              @include('livewire.ctms.patients.edit.clinicals.tab1_cryptic')
                            </div>
                            <div class="tab-pane {{ $activeTab === 'tab_2' ? 'active' : '' }}" id="tab_2">
                              @include('livewire.ctms.patients.clinicals.blood-routine-component')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane {{ $activeTab === 'tab_3' ? 'active' : '' }}" id="tab_3">
                              @include('livewire.ctms.patients.clinicals.liver-functions')
                              @include('livewire.ctms.patients.clinicals.electrolyte-component')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane {{ $activeTab === 'tab_4' ? 'active' : '' }}" id="tab_4">
                              @include('livewire.ctms.patients.clinicals.renal-function-component')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane {{ $activeTab === 'tab_5' ? 'active' : '' }}" id="tab_5">
                              @include('livewire.ctms.patients.clinicals.blood-sugar-component')
                              @include('livewire.ctms.patients.clinicals.crp-component')
                              @include('livewire.ctms.patients.clinicals.il6-component')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane {{ $activeTab === 'tab_6' ? 'active' : '' }}" id="tab_6">
                              @include('livewire.ctms.patients.clinicals.laboratory-exams')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane {{ $activeTab === 'tab_7' ? 'active' : '' }}" id="tab_7">
                              @include('livewire.ctms.patients.clinicals.chemical-exam-component')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane {{ $activeTab === 'tab_8' ? 'active' : '' }}" id="tab_8">
                              @include('livewire.ctms.patients.clinicals.microscopic-exams')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane {{ $activeTab === 'tab_9' ? 'active' : '' }}" id="tab_9">
                              @include('livewire.ctms.patients.clinicals.urine-routine-component')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane {{ $activeTab === 'tab_10' ? 'active' : '' }}" id="tab_10">
                              @include('livewire.ctms.patients.clinicals.edit-drug-usage-details')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane {{ $activeTab === 'tab_11' ? 'active' : '' }}" id="tab_11">
                              @include('livewire.ctms.patients.clinicals.general-summary-component')
                            </div>
                            <!-- /.tab-pane -->
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
