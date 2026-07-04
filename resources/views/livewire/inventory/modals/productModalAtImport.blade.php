      <div wire:ignore.self id="exampleModal2" class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            @if($pObj != null)
              <div class="modal-header">
                  
                  <h4 class="modal-title">Details of Entry ID: {{ $pObj->temp_product_id }}</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <tr>
                    <th colspan="6">
                      <!-- Validation Errors -->
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </th>
                  </tr>
                  <tbody> 
                    <tr>
                      <td>
                        <label>Pack Mark Code</label>
                        <input wire:model="form.pack_mark_code" type="text" class="form-control input-sm">
                          @error('form.pack_mark_code')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label>Category*</label>
                        <input wire:model="form.category_id" type="text" class="form-control input-sm"  >
                          @error('form.category_id')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label>Gen./Patient Link*</label>
                        <select wire:model="form.resproject_id" type="text" class="form-control input-sm">
                          <option value="-1">Select</option>
                          <option value="0">General</option>
                        </select>
                        @error('form.resproject_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                      <td>
                        <label>Grade*</label>
                          <select wire:model="form.grade" type="text" class="form-control input-sm">
                          <option value="-1">Select</option>
                            <option value="CT">Clinical Trial</option>
                            <option value="RG">Research Grade</option>
                            <option value="MG">Misc. Grade</option>
                          </select>
                          @error('form.grade')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label>Status: Open/Unopened</label>
                        </br>
                        {{ $pObj->status_open_unopened }}
                      </td>
                      <td>
                        <label>Status Date</label>
                        </br>
                        {{ $pObj->status_date }}
                      </td>
                    </tr>

                    <tr>
                      <td colspan="6"> 
                        <label>Product Information*</label>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <label>Catalog Num*</label>
                        <input wire:model="form.catalog_id" type="text" class="form-control">
                          @error('form.catalog_id')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label>Name*</label>
                        <input wire:model.defer="form.name" type="text" class="form-control">
                          @error('form.name')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label>Pack Size</label>
                        <input wire:model="form.pack_size" type="text" class="form-control">
                        @error('form.pack_size')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                      <td>
                        <label>Unit Desc</label>
                          <select wire:model="form.unit_id" type="text" class="form-control">
                            <option value="-1">Select</option>
                            @foreach($units as $row)
                            <option value="{{ $row->unit_id }}">{{ $row->description }}</option>
                            @endforeach
                          </select>
                          @error('form.unit_id')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </td>
                      <td>
                        <label class="text-danger">Num Packs</label>
                        <input wire:model="form.num_packs" type="text" class="form-control bg-gradient" border-color="#E6E6FA">
                        @error('form.num_packs')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>

                      <td>
                        <label>Vendor</label>
                        <select wire:model="form.supplier_id" type="text" class="form-control">
                          <option value="-1">Select</option>
                          <option value="1">Some Company</option>
                        </select>
                        @error('form.supplier_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <label>Batch Code</label>
                        <input wire:model="form.batch_code" type="text" class="form-control">
                        @error('form.batch_code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                      <td>
                        <label>Unit Cost</label>
                        <input wire:model="form.vial_cost" type="text" class="form-control">
                          @error('form.vial_cost')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label for="bulkcode">Currency</label>
                        <select wire:model="form.item_currency" type="select" class="custom-select rounded-0">
                          <option value="-1">Select</option> 
                          @foreach($currencies as $row)
                          <option value="{{ $row->currency_id }}">{{ $row->description }}</option>
                          @endforeach           
                        </select>
                        @error('form.item_currency')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                      <td>
                        <label>Item Cost</label>
                        <input wire:model="form.item_cost" type="text" class="form-control" >
                          @error('form.item_cost')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label>Date MFD</label>
                          <input wire:model="form.mfd_date" type="date" class="form-control">
                          @error('form.mfd_date')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      
                      <td>
                        <label>Expiry date</label>
                        <input wire:model="form.expiry_date" type="date" class="form-control">
                          @error('form.expiry_date')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                    </tr>
                    
                    <tr>
                      <td colspan="6"> 
                        <label>Storage Information*</label>
                      </td>
                    </tr>
                    
                    <tr>
                      <td>
                        <label  for="username">Container*</label>
                        
                          <select wire:model="form.storage_container_id" type="date" class="form-control">
                            <option value="-1">Select</option>
                            <option value="1">Some Container</option>
                          </select>
                          @error('form.storage_container_id')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label>Comp ID*</label>
                        <input size="15" wire:model="form.shelf_rack_id" type="text" class="form-control">
                          @error('form.shelf_rack_id')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label>Box/SackID*</label>
                        <input size="15" wire:model="form.box_id" value="{{ $pObj->box_id }}" type="text" class="form-control">
                          @error('form.box_id')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label>LocationID</label>
                        <input wire:model="form.box_position_id" type="text" class="form-control">
                          @error('form.box_position_id')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td>
                        <label>Open Storage</label>
                        <input wire:model="form.open_storage" type="text" class="form-control">
                          @error('form.open_storage')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                    </tr>
                    
                    <tr>
                      <td colspan="3">
                        <label>Notes, If any</label>
                        <input wire:model.defer="form.notes" type="text" class="form-control" >
                          @error('form.notes')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                      <td colspan="3">
                        <label>Upload CoA File</label>
                        <input wire:model.defer="product_coa" type="file"  class="form-control" placeholder="Report File" > 
                          @error('product_coa')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </td>
                    </tr>
                  </tbody>    
                </table>	
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- button wire:click="uploadCoAFile()" class="btn btn-info text-white font-normal rounded">Upload FIle</button> -->
                <button wire:click="updateProductInfo()" type="button" class="btn btn-primary">Save changes</button>
              </div>
            @endif
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->