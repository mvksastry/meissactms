<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="bg-danger disabled color-palette"><span class="mx-3">Reviews</span></div>           
    <?php $op3 = $nc_review->isEmpty(); //dd($op3);?>
    @if( !$op3 )
      <table id="userIndex2" class="table table-sm table-bordered table-hover">
        <thead>
          <tr>
              <th>Review Stage</th>
              <th width="45%">Summary</th>
              <th>Capa Required</th>
              <th>Reviewed By </br> Rviewed At</th>
              <th>Locked By </br>Locked On</th> 
              <th>Time Stamps</th>  
                                  
          </tr>
        </thead>
        <tbody> 
          @foreach($nc_review as $row)
            <tr>
                <td>{{ ucfirst($row->review_stage) }}</td>
                <td>{{ $row->summary }}</td>
                <td>{{ ucfirst($row->capa_required) }}</td>
                <td>{{ ucfirst($row->reviewed_by) }} </br> {{ $row->reviewed_at }}</td>
                <td>{{ ucfirst($row->locked) }}</br>{{ ucfirst($row->locked_by) }}</br>{{ $row->locked_on }}</td>
                <td>Created At: {{ $row->created_at }}</br>Updated At: {{ $row->updated_at }}</td>
            </tr>  
          @endforeach                                  
        </tbody>
      </table>
    @else
      <table id="userIndex2" class="table table-sm table-bordered table-hover">
        <tbody>
          <tr>
            <td>
              <code>Reviews NOT Found</code>
            </td>
          </tr>
        </tbody>
      </table>
    @endif

  Post Review

 </br>
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <tbody>
      <tr>
          <td colspan="4">
          <code>Enter Review for Nc ID: {{ $nc_id }}</code>
          </td>
      </tr>
      <tr>
        <td>
            <div class="">
              <label for="">Review Stage</label>
              <select class="custom-select rounded-0" wire:model="ncRevs.review_stage" id="exampleSelectRounded0">
                <option value="-1">Select</option>
                <option value="preliminary">Preliminary</option>
                <option value="final">Final</option>
              </select>
              @error('ncRevs.review_stage')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>        
        </td>
        <td>
          <label>Reviewed By</label>
          <input wire:model="ncRevs.reviewed_by" id="aadhar_id" type="text" value="null" class="form-control" placeholder="Remarks">
        </td>
        <td>
          <div class="">
              <label for="">CA_PA Required</label>
              <select class="custom-select rounded-0" wire:model="ncRevs.capa_required" id="exampleSelectRounded0">
                <option value="-1">Select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
              @error('ncRevs.visible_to')
                <span class="text-danger">{{ $message }}</span>
              @enderror
          </div> 
        </td>
      </tr>
     
      <tr>
        <td colspan="3">
          <label>Summary*</label>
          <input wire:model="ncRevs.summary" id="aadhar_id" type="text" value="null" class="form-control" placeholder="Remarks">
        </td>
      </tr>

      <tr>
        <td>
          <div class="form-check">
            <label class="form-check-label" for="exampleCheck1">If CAPA yes, auto entry is executed</label>
          </div>
        </td>
      </tr>

      <tr>
        <td width="25%">
          <button wire:click="fnPostNCReview()" type="button" class="btn btn-block btn-danger"><i class="ion ion-person"></i>&nbsp Post Review</button>
        </td>
      </tr>
    </tbody>
  </table>


</div>
