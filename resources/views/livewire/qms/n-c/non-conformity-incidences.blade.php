<div>
    <section class="content mx-2">
        <div class="container-fluid">
            <!-- COLOR PALETTE -->
            <div class="card card-default color-palette-box ">
                <div class="card-header">
                    <h3 class="card-title">
                    <i class="fas fa-tag"></i>
                    Enter Fresh Non-Conformity
                    </h3>
                </div>
                <div class="card-body">

                    <table id="userIndex2" class="table table-sm table-bordered table-hover">
                        <tbody> 
                            <tr>
                                <td>
                                    <div class="form-group">
                                    <label for="exampleSelectRounded0"><code>Origin </code> of Non-Conformity*</label>
                                    <select wire:model="nc.nc_origin" class="custom-select rounded-0" id="exampleSelectRounded0">
                                        <option value="-1">Select</option>
                                        <option value="int_obs">Internal Obs</option>
                                        <option value="Ext_report">External Report</option>
                                    </select>
                                    </div>   
                                </td>
                                <td>
                                    <div class="form-group">
                                    <label for="exampleSelectRounded0"><code>Route</code> of NC</label>
                                    <select wire:model="nc.nc_route" class="custom-select rounded-0" id="exampleSelectRounded0">
                                        <option value="-1">Select</option>
                                        <option value="e-mail">E-mail</option>
                                        <option value="feedback">Feedback</option>
                                        <option value="internal">Internal</option>
                                    </select>
                                    </div>   
                                </td>
                                <td>
                                    <div class="form-group">
                                    <label for="exampleSelectRounded0"><code>Division</code> Reported By</label>
                                    <select wire:model="nc.div_reported_by" class="custom-select rounded-0" id="exampleSelectRounded0">
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
                                    <div class="form-group">
                                    <label for="exampleSelectRounded0"><code>Division</code> Addressed To</label>
                                    <select wire:model="nc.div_addressed_to" class="custom-select rounded-0" id="exampleSelectRounded0">
                                        <option value="-1">Select</option>
                                        @foreach($divs as $row)
                                        <option value="{{ $row->division_id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>   
                                </td>
                                <td>
                                    <label>Role Raised*</label>
                                    <input wire:model="nc.role_raised" id="in_patient_id" type="text" class="form-control" placeholder="In Patient ID">
                                </td>
                                <td>
                                    <label>Reported By*</label>
                                    <input wire:model="nc.reported_by" id="aadhar_id" type="text" value="null" class="form-control" placeholder="Admission Date">
                                </td>

                            </tr>
                        </tbody>
                    </table>
                    <table id="userIndex2" class="table table-sm table-bordered table-hover">
                        <tbody> 
                            <tr>
                                <td colspan="3">
                                <label>Description</label>
                                <input wire:model.defer="nc.description" type="text"  class="form-control" placeholder="NC Description">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Reported Date*</label>
                                    <input wire:model="nc.reported_date" id="aadhar_id" type="date" value="null" class="form-control" placeholder="Admission Date">
                                </td>

                                <td>
                                    <div class="form-group">
                                        <label for="exampleSelectRounded0"><code>Status</code> Current</label>
                                        <select wire:model="nc.nc_status" class="custom-select rounded-0" id="exampleSelectRounded0">
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
                    <button wire:click="fnSaveNewNC()" class="btn btn-success font-normal mt-3 rounded">ADD NON CONFORMITY</button>
                </div>
            </div>
        </div>
    </section>
</div>



