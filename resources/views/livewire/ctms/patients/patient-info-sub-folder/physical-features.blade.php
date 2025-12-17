<table id="userIndex2" class="table table-sm table-bordered table-hover">
      <thead>
        <tr>
          <th colspan="4" align="center">Physical Features</th>
        </tr>
      </thead>
      <tbody> 
        <tr>
          <td colspan="1">
            <label>Height*</label>
            <input wire:model="form.height" id="height" type="number" class="form-control" placeholder="Height">
          </td>
          <td colspan="1">
            <label>Height Unit*</label>
            <input wire:model.defer="form.height_unit" id="height_unit" type="text" Value="centimeters" class="form-control" placeholder="Height Unit" >
          </td>
        </tr>
        <tr>
          <td colspan="1">
            <label>Weight*</label>
            <input wire:model="form.weight" id="weight" type="number" class="form-control" placeholder="Weight">
          </td>
          <td colspan="1">
            <label>Weight Unit*</label>
            <input wire:model.defer="form.weight_unit" id="item_desc" type="text" class="form-control" placeholder="Weight Unit">
          </td>
          <td colspan="1">
            <label>BMI*</label>
            <input wire:model.defer="form.bmi" id="item_desc" type="number" class="form-control" placeholder="BMI" >
          </td>
        </tr>
      </tbody>
  </table>