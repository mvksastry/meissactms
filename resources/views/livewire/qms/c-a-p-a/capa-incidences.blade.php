<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
        <section class="content mx-2">
        <div class="container-fluid">
            <!-- COLOR PALETTE -->
            <div class="card card-default color-palette-box ">
                <div class="card-header">
                    <h3 class="card-title">
                    <i class="fas fa-tag"></i>
                    Register Correction Action - Preventive Action
                    </h3>
                </div>
                <div class="card-body">

                    <table id="userIndex2" class="table table-sm table-bordered table-hover">
                        <tbody> 
                            <tr>
                                <td>
                                    <div class="form-group">
                                    <label for="exampleSelectRounded0"><code>Origin </code> of CA-PA*</label>
                                    <select wire:model="icapa.capa_origin" class="custom-select rounded-0" id="exampleSelectRounded0">
                                        <option value="-1">Select</option>
                                        <option value="int_obs">Internal Obs</option>
                                        <option value="audits">Auditing</option>
                                        <option value="Ext_report">External Report</option>
                                    </select>
                                    </div>   
                                </td>
                                <td>
                                    <div class="form-group">
                                    <label for="exampleSelectRounded0"><code>CA PA</code> Type</label>
                                    <select wire:model="icapa.capa_type" class="custom-select rounded-0" id="exampleSelectRounded0">
                                        <option value="-1">Select</option>
                                        <option value="corrective">Corrective</option>
                                        <option value="preventive">Preventive</option>
                                        
                                    </select>
                                    </div>   
                                </td>
                                <td>
                                    <div class="form-group">
                                    <label for="exampleSelectRounded0"><code>Reference</code> Number</label>
                                    <input wire:model="icapa.reference_no" type="text" value="null" class="form-control" id="exampleSelectRounded0">
                                        
                                    
                                    </div>   
                                </td>
                                <td>
                                    <div class="form-group">
                                    <label for="exampleSelectRounded0"><code>Division</code> Reported By</label>
                                    <select wire:model="icapa.div_reported" class="custom-select rounded-0" id="exampleSelectRounded0">
                                        <option value="-1">Select</option>
                                        @foreach($divs as $row)
                                        <option value="{{ $row->division_id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>   
                                </td>

                            </tr>

                            <tr>
                                
                                <td>
                                    <label>Role Raised*</label>
                                    <input wire:model="icapa.role_raised" id="in_patient_id" type="text" class="form-control" placeholder="In Patient ID">
                                </td>
                                <td>
                                    <label>Reported By*</label>
                                    <input wire:model="icapa.reported_by" id="aadhar_id" type="text" value="null" class="form-control" placeholder="Admission Date">
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleSelectRounded0"><code>Status</code> Current</label>
                                        <select wire:model="icapa.capa_status" class="custom-select rounded-0" id="exampleSelectRounded0">
                                            <option value="-1">Select</option>
                                            <option value="open" selected>Open</option>
                                            <option value="pv">Pending Verif</option>
                                            <option value="in_progress">In Progress</option>
                                            <option value="closed">Closed</option>                                        
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table id="userIndex2" class="table table-sm table-bordered table-hover">
                        <tbody> 
                            <tr>
                                <td colspan="3">
                                <label>Description</label>
                                <input wire:model.defer="icapa.description" type="text"  class="form-control" placeholder="NC Description">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Reported Date*</label>
                                    <input wire:model="icapa.reported_date" type="date" value="null" class="form-control" placeholder="Admission Date">
                                </td>
                                <td>
                                    <label>Target Date (+21 days)</label>
                                    <input wire:model="icapa.target_date" type="date" value="null" class="form-control" placeholder="Admission Date">
                                </td>
                                <td>
                                    <label>Closure Date (+28 days) </label>
                                    <input wire:model="icapa.closure_date" type="date" value="null" class="form-control" placeholder="Admission Date">
                                </td>
                            </tr>
                            <tr>

                            </tr>                                    
                        </tbody>
                    </table>
                    <button wire:click="fnSaveNewCAPA()" class="btn btn-success font-normal mt-3 rounded">REGISTER CA-PA</button>
                </div>
            </div>
        </div>
    </section>
</div>
