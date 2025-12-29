<div class="p-2 mt-3 border rounded shadow">
		<table id="userIndex2" class="table table-sm table-bordered table-hover">
			<thead>
				<tr>
					<th colspan="4">Part1: Controls</th>
				</tr>
			</thead>
			<tbody> 
				<tr>
					<td colspan="2">
					  <label>Made By</label>
            </br>
						{{ Auth::user()->name }}
					</td>
					<td>
					  <label>Date</label>
            </br>
						{{ date('Y-m-d') }}
					</td>
					<td>
					  <label>Code</label>
            </br>
						{{ $reagentCode }}
					</td>
				</tr>
				<tr>
					<td colspan="2">
					  <label class="form-class" for="sampdesc">Name*</label>
					  <input placeholder="Name" class="form-control" wire:model.defer="reagent_name">
					</td>
					<td colspan="2">
					  <label>Nickname*</label>
					  <input placeholder="Nickname" class="form-control" wire:model.defer="reagent_nickname">
					</td>
				</tr>
				<tr>
					<td colspan="4">
					  <label>Description*</label>
            </br>
					  <input wire:model.defer="reagent_desc" placeholder="Description" class="form-control">
					</td>
				</tr>
				<tr>
					<td colspan="4">
					  <label>Classification*</label>
            </br>
            <select wire:model="reagentClassCode" class="form-control">
                <option value="-1">Select</option>
                <option value="1">Custom</option>
                <option value="2">Bulk Media-Buffers-Solutions</option>
            </select>
					</td>										
				</tr>
			</tbody>
		</table>
	</div>	
	<div class="p-2 mt-3 border rounded shadow">
		<table id="userIndex2" class="table table-sm table-bordered table-hover">
			<thead>
			</thead>
			<tbody>	
				<tr>
					<td colspan="4">
						<label>
            </br>
							Part 2: Ingradients*  (Select from inventory panel)
						</label>
					</td>
				</tr>	
			</tbody>
		</table>
		
		@if($searchResultBox1)
			<div class="p-2 mt-3 border rounded shadow">
				<table id="userIndex2" class="table table-sm table-bordered table-hover">
					<thead>
						<tr>
              Part 2: Slected Items*  (Select from inventory panel)
						</tr>
					</thead>
					<tbody>
						@foreach($inputs as $key1 => $row)
							<tr>
								<td> Pack Mark Code</td>
								<td>
									{{ $inputs[$key1]['pmc'] }}
								</td>
							</tr>
							<tr>
								<td>Name</td>
								<td>
									{{ $inputs[$key1]['name'] }}
								</td>
							</tr>
							<tr>
								<td>Quantity</td>
								<td>      
									<input type="text" class="form-control"  wire:model="quantityProd.{{ $key1 }}" placeholder="Used">
										@if($inputs[$key1]['unit_desc1'] == 'm') &#956; @endif{{ $inputs[$key1]['unit_desc2'] }}
										@error('usageProd.'.$row['usage']) 
										<span class="text-danger error">{{ $message }}</span>
										@enderror
									
								</td>
							</tr>
							<tr>
								<td>Usage</td>
								<td>      
									<input type="text" class="form-control"  wire:model="usageProd.{{ $key1 }}" placeholder="Description">
										@error('usageProd.'.$row['usage']) 
										<span class="text-danger error">{{ $message }}</span>
										@enderror
								</td>
							</tr>
							<tr class="pb-2">
								<td colspan="2">
									<button class="bg-pink-500 w-30 hover:bg-blue-800 text-white font-normal py-2 px-3 mx-3  rounded" wire:click.prevent="remove({{$key1}})">Remove</button>
								</td>
							</tr>								
						@endforeach
					</tbody>    
				</table>
			</div>
		@endif

		<table id="userIndex3" class="table table-sm table-bordered table-hover">
			<thead>
			</thead>
			<tbody>		
				<tr>
					<td >
					  <label>Quantity Made*</label>
          </br>
					  <input class="form-control" placeholder="Number only" wire:model="quantity_made" type="text">
					</td>
					<td>
						<label>Unit Desc</label>
						<div class="relative h-8 w-full min-w-[200px]">
							<select wire:model="units_desc" class="form-control">
								<option value="-1">Select</option>
									@foreach($units as $unit)
									<option value="{{ $unit->unit_id }}">{{ ucfirst($unit->description) }}</option>
									@endforeach
							</select>
						</div>
					</td>
					<td>
					  <label>Expiry Date*</label>
					  <input class="form-control" id="description" wire:model="expirty_date" type="date">
					</td>											
				</tr>
			</tbody>
		</table>
	</div>

	<div class="p-2 mt-3 border rounded shadow">
		<table id="userIndex2" class="table table-sm table-bordered table-hover">
			<thead>
			</thead>
			<tbody>			
				<tr>
					<td colspan="4"> 
						<label>Part 4: Storage Information*</label>
					</td>
				</tr>
				
				<tr>
					<td colspan="2">
						<label>Container*</label>
						<div class="relative h-8 w-72 min-w-[200px]">
							<select wire:model="container_id" class="form-control">
								<option value="-1">Select</option>
                @if(count($repositories) > 0)
                  @foreach($repositories as $row)
                  <option value="{{ $row->repository_id }}">{{ $row->repository_type }}</option>
                  @endforeach
                @endif
							</select>
						</div>
					</td>
					<td colspan="2">
						<label>Compartment ID*</label>
						<input size="15" placeholder="Compartment" class="form-control" id="validTill" wire:model="rack_shelf" type="text">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<label>Box/Sack ID*</label>
						<input size="15" placeholder="Box or Sack" class="form-control" id="validTill" wire:model="box_sack" type="text">
					</td>
					<td colspan="2">
						<label>Location ID</label>
						<input size="15" placeholder="Location" class="form-control" id="approvedRef" wire:model="location_code" type="text">
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="p-2 mt-3 border rounded shadow">
		<table id="userIndex2" class="table table-sm table-bordered table-hover">
			<thead>
			</thead>
			<tbody>			
				<tr>
					<td colspan="4"> 
						<label>
							Open or Restricted
						</label>   
					</td>
				</tr>
        <tr>
					<td>
            <div class="form-check">
							<input wire:model="openrestriced" value="1" class="form-check-input" type="radio"/>
               <label>Open</label>
            </div>
							
					</td>
					<td>
            <div class="form-check">
							<input wire:model="openrestriced" value="0" class="form-check-input" type="radio"/>
							<label>Restricted</label>
            </div>
					</td>
				</tr>
				
				<tr>
					<td colspan="4">
						<label>Notes, If any</label>
						<input placeholder="Sample remarks, if any" class="form-control" wire:model.defer="note_remark">
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<table id="userIndex2" class="table table-sm table-bordered table-hover">
		<thead>
			<tr>
				<th align="center">
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				 <td colspan="3" class="text-sm text-gray-900">
					</br>
					@hasanyrole('ctms_incharge|director')
					  <button wire:click="postReagentInfo()" class="btn btn-success text-white font-normal mx-3 mb-3 rounded">Post Reagent</button>
					@endhasanyrole
				 </td>
			</tr>
		</tbody>    
	</table>