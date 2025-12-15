<table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="4" align="center">General History 1</th>
      </tr>
    </thead>
    <tbody>        
      <tr>
        <td colspan="4">
          <label>General Surgical Information*</label>
          <input wire:model="form.gen_surgical_info" class="form-control" value="{{ $patientPrimaryInfo->gen_surgical_info }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>At Lumbar Region*</label>
          <input wire:model="form.surgery_at_lumbar" class="form-control" value="{{ $patientPrimaryInfo->surgery_at_lumbar }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Malignancies*</label>
          <input wire:model="form.malignancies" class="form-control" value="{{ $patientPrimaryInfo->malignancies }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>General Medical History*</label>
          <input wire:model="form.general_medical_history" class="form-control" value="{{ $patientPrimaryInfo->general_medical_history }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Infections Suffered*</label>
          <input wire:model="form.infections_suffered" class="form-control" value="{{ $patientPrimaryInfo->infections_suffered }}"  type="text">
       </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>General Inflammatory Diseases*</label>
          <input wire:model="form.general_inflammatory_diseases" class="form-control" value="{{ $patientPrimaryInfo->general_inflammatory_diseases }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Ankylosing Spondylosis*</label>
          <input wire:model="form.ankylosing_spondylosis" class="form-control" value="{{ $patientPrimaryInfo->ankylosing_spondylosis }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Rheumatoid Arthritis*</label>
          <input wire:model="form.rhematoid_arthiritis" class="form-control" value="{{ $patientPrimaryInfo->rheumatoid_arthritis }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Chronic Kidney Issues*</label>
          <input wire:model="form.chronic_kidney_issues" class="form-control" value="{{ $patientPrimaryInfo->chronic_kidney_issues }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Chronic Liver Issues*</label>
          <input wire:model="form.chronic_liver_issues" class="form-control" value="{{ $patientPrimaryInfo->chronic_liver_issues }}"  type="text">
       </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>HIV*</label>
          <input wire:model="form.hiv" class="form-control" value="{{ $patientPrimaryInfo->hiv }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>AIDS*</label>
          <input wire:model="form.aids" class="form-control" value="{{ $patientPrimaryInfo->aids }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Hepatitis B*</label>
          <input wire:model="form.hepatitis_b" class="form-control" value="{{ $patientPrimaryInfo->hepatitis_b }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Hepatitis C*</label>
          <input wire:model="form.hepatitis_c" class="form-control" value="{{ $patientPrimaryInfo->hepatitis_c }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Diabetes Mellitus Self*</label>
          <input wire:model="form.diabetes_mellitus_self" class="form-control" value="{{ $patientPrimaryInfo->diabetes_mellitus_self }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Diabetes Mellitus Family*</label>
          <input wire:model="form.diabetes_mellitus_family" class="form-control" value="{{ $patientPrimaryInfo->diabetes_mellitus_family }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Hypertension Self*</label>
          <input wire:model="form.hypertension_self" class="form-control" value="{{ $patientPrimaryInfo->hypertension_self }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Hypertension Family*</label>
          <input wire:model="form.hypertension_family" class="form-control" value="{{ $patientPrimaryInfo->hypertension_family }}"  type="text">
       </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>IHD Self*</label>
          <input wire:model="form.ihd_self" class="form-control" value="{{ $patientPrimaryInfo->ihd_self }}"  type="text">
       </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>IHD Family*</label>
          <input wire:model="form.ihd_family" class="form-control" value="{{ $patientPrimaryInfo->ihd_family }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Paralysis Self*</label>
          <input wire:model="form.paralysis_self" class="form-control" value="{{ $patientPrimaryInfo->paralysis_self }}"  type="text">
         </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Paralysis Family*</label>
          <input wire:model="form.paralysis_family" class="form-control" value="{{ $patientPrimaryInfo->paralysis_family }}"  type="text">
        </td>
      </tr>
    </tbody>
  </table>