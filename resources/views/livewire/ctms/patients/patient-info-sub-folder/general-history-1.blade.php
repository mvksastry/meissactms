<table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="4" align="center">General History 1</th>
      </tr>
    </thead>
    <tbody>        
      <tr>
        <td colspan="4">
          <label>General Surgical Information</label>
          <input wire:model="form.gen_surgical_info" id="description" type="text" value="null" class="form-control" placeholder="General Surgical Information">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>At Lumbar Region</label>
          <input wire:model="form.surgery_at_lumbar" id="description" type="text" value="null" class="form-control" placeholder="At Lumbar Region">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Malignancies</label>
          <input wire:model.defer="form.malignancies" id="item_desc" type="text" value="null" class="form-control" placeholder="Malignancies Description">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>General Medical History</label>
          <input wire:model="form.general_medical_history" id="description" type="text"  Value="null" class="form-control" placeholder="General Medical History">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Infections Suffered</label>
          <input wire:model="form.infections_suffered" id="description" type="text"  Value="null" class="form-control" placeholder="Infections Suffered">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>General Inflammatory Diseases</label>
          <input wire:model.defer="form.general_inflammatory_diseases" id="item_desc" type="text" Value="null" class="form-control" placeholder="General Inflammatory Diseases">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Ankylosing Spondylosis</label>
          <input wire:model.defer="form.ankylosing_spondylosis" id="item_desc" type="text"  value="null" class="form-control"placeholder="Ankylosing Spondylosis Description">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Rheumatoid Arthritis</label>
          <input wire:model.defer="form.rheumatoid_arthritis" id="item_desc" type="text"  value="null" class="form-control"placeholder="Rheumatoid Arthritis Description">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Chronic Kidney Issues</label>
          <input wire:model.defer="form.chronic_kidney_issues" id="item_desc" value="null" type="text" value="null" class="form-control" placeholder="Chronic Kidney Issues Description" >
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Chronic Liver Issues</label>
          <input wire:model.defer="form.chronic_liver_issues" id="item_desc" type="text" value="null" class="form-control" placeholder="Chronic Liver Issues Description">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>HIV</label>
          <input wire:model.defer="form.hiv" id="hiv_status" type="text" value="null" class="form-control" placeholder="HIV Description">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>AIDS</label>
          <input wire:model.defer="form.aids" id="aids_status" type="text" value="null" class="form-control" placeholder="AIDS Description">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Hepatitis B</label>
          <input wire:model.defer="form.hepatitis_b" id="hepatitis_b" value="null" class="form-control" placeholder="Hepatitis B Description">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Hepatitis C</label>
          <input wire:model.defer="form.hepatitis_c" id="hepatitis_c" type="text" value="null" class="form-control" placeholder="Hepatitis C Description">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Diabetes Mellitus Self</label>
          <input wire:model.defer="form.diabetes_mellitus_self" id="item_desc" type="text" value="null" class="form-control" placeholder="Diabetes Mellitus Self Description">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Diabetes Mellitus Family</label>
          <input wire:model.defer="form.diabetes_mellitus_family" id="item_desc" type="text" value="null" class="form-control" placeholder="Diabetes Mellitus Family Description">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Hypertension Self</label>
          <input wire:model.defer="form.hypertension_self" id="item_desc" type="text" value="null" class="form-control" placeholder="Hypertension Self Description">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Hypertension Family</label>
          <input  wire:model.defer="form.hypertension_family" id="item_desc" type="text" value="null" class="form-control" placeholder="Hypertension Family Description">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>IHD Self</label>
          <input wire:model.defer="form.ihd_self" id="item_desc" type="text" value="null" class="form-control"placeholder="IHD Self Description">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>IHD Family</label>
          <input wire:model.defer="form.ihd_family" id="item_desc" type="text" value="null" class="form-control" placeholder="IHD Family Description" >
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Paralysis Family</label>
          <input wire:model.defer="form.paralysis_family" id="item_desc" type="text" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
    </tbody>
  </table>