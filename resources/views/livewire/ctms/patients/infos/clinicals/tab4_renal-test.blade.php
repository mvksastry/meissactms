   {{-- The Master doesn't talk, he acts. --}}
   <table id="userIndex2" class="table table-sm table-bordered table-hover">
     <thead>
       <tr>
         <th colspan="3" align="center">Renal Functions</th>
       </tr>
     </thead>
     <tbody>
       <tr>
         <td colspan="1">
           <label>Opd ID*</label>
           </br>{{ $ci13Obj->opd_id }}
         </td>
         <td colspan="1">
           <label>In Patient ID*</label>
           </br>{{ $ci13Obj->in_patient_id }}
         </td>
         <td colspan="1">
           <label>Admission Date*</label>
           </br>{{ $ci13Obj->admission_date }}
           </d>
       </tr>
       <tr>
         <td>
           <label>Sr.Uric Acd</label>
           </br>{{ $ci13Obj->uric_acid }}
         </td>
       </tr>
       <tr>
         <td colspan="2">
           <label>Comment By Entered</label>
           </br>{{ $ci13Obj->comment_entered_by }}
         </td>
       </tr>
       <tr>
         <td>
           <label>Entered By*</label>
           </br>{{ $ci13Obj->entered_by }}
         </td>
         <td>
           <label>Entry Date*</label>
           </br>{{ $ci13Obj->entry_date }}
         </td>
       </tr>
     </tbody>
   </table>

   </br>

   {{-- The Master doesn't talk, he acts. --}}
   <table id="userIndex2" class="table table-sm table-bordered table-hover">
     <thead>
       <tr>
         <th colspan="3" align="center">Blood Urea Nitrogen</th>
       </tr>
     </thead>
     <tbody>
       <tr>
         <td colspan="1">
           <label>Opd ID*</label>
           </br>{{ $ci13Obj->opd_id }}
         </td>
         <td colspan="1">
           <label>In Patient ID*</label>
           </br>{{ $ci13Obj->in_patient_id }}
         </td>
         <td colspan="1">
           <label>Admission Date*</label>
           </br>{{ $ci13Obj->admission_date }}
           </d>
       </tr>
       <tr>
         <td>
           <label>Urea (mg/ml)</label>
           </br>{{ $ci3Obj->urea }}
         </td>
         <td>
           <label>Blood Urea Nitrogen (mg/ml)</label>
           </br>{{ $ci3Obj->blood_urea_nitrogen }}
         </td>
       </tr>
       <tr>
         <td colspan="2">
           <label>Comment By Entered</label>
           </br>{{ $ci3Obj->comment_entered_by }}
         </td>
       </tr>
       <tr>
         <td>
           <label>Entered By*</label>
           </br>{{ $ci3Obj->entered_by }}
         </td>
         <td>
           <label>Entry Date*</label>
           </br>{{ $ci3Obj->entry_date }}
         </td>
       </tr>
     </tbody>
   </table>

   </br>

   <table id="userIndex2" class="table table-sm table-bordered table-hover">
     <thead>
       <tr>
         <th colspan="6" align="center"> Creatinine</th>
       </tr>
     </thead>
     <tbody>
       <tr>
         <td>
           <label>Creatinine (mg/dL)</label>
           </br>{{ $ci5Obj->serum_creatinine }}
         </td>
       </tr>
       <tr>
         <td colspan="2">
           <label>Comment By Entered</label>
           </br>{{ $ci5Obj->comment_entered_by }}
         </td>
       </tr>
       <tr>
         <td>
           <label>Entered By*</label>
           </br>{{ $ci5Obj->entered_by }}
         </td>
         <td>
           <label>Entry Date*</label>
           </br>{{ $ci5Obj->entry_date }}
         </td>
       </tr>
     </tbody>
   </table>
