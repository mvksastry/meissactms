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
            </br>{{ $patientPrimaryInfo->height }}
          </td>
          <td colspan="1">
            <label>Height Unit*</label>
            </br>{{ $patientPrimaryInfo->height_unit }}
          </td>
        </tr>
        <tr>
          <td colspan="1">
            <label>Weight*</label>
            </br>{{ $patientPrimaryInfo->weight }}
          </td>
          <td colspan="1">
            <label>Weight Unit*</label>
            </br>{{ $patientPrimaryInfo->weight_unit }}            
          </td>
          <td colspan="1">
            <label>BMI*</label>
            </br>{{ $patientPrimaryInfo->bmi }}
          </td>
        </tr>
      </tbody>
  </table>