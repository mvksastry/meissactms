<?php

return [

        'stages_status' => [

          'pre-enrollment' => "sealed",
          'discectomy'    => "discectmy_done",
          'sample_collection' => "sample_collection_done",
          'manufacturing' => "mfg_initiated",


        ],

        'abort_codes' => [
            '1'	=> '2',
            '2' => '5',
            '3'	=> '7',
            '4'	=> '11',
            '5'	=> '14',
            '6'	=> '16',
            '7'	=> '20',
            '8'	=> '22',
            '9'	=> '24',
            '10'	=> '27'

        ],

        'steps' => [   
                '1' => 'on-boarding-began',
        '2' => 'on-boarding-aborted',
                '3' => 'on-boarding-complete',
                '4' => 'pre-enrollment-data',
        '5' => 'pre-enrollment-aborted',
                '6' => 'pre-enrollment-data-capture-complete',
        '7' => 'patient-aborted-at-discectomy',	
                '8' => 'discectomy-completed',
                '9' => 'discectomy-sample-collected',
                '10' => 'discectomy-sample-evaluated',
        '11' => 'discectomy-sample-status-fail',
                '12' => 'discectomy-sample-status-success',
                '13' => 'QC-check-1-success',
        '14' => 'QC-check-1-failed',
                '15' => 'mfg-started',
        '16' => 'mfg-aborted',
                '17' => 'mfg-success',
                '18' => 'mfg-status-evaluated',
                '19' => 'QC-check-2-success',
        '20' => 'QC-check-2-fail',
                '21' => 'QA-accepted',
        '22' => 'QA-rejected',
                '23' => 'enrollment-done',
        '24' => 'enrollment-aborted',
                '25' => 'admin-assigned-control-numbers',
                '26' => 'transplantation-done',
        '27' => 'transplantation-aborted',
                '28' => 'follow-up-1',
                '29' => 'follow-up-2',
                '30' => 'follow-up-3',
                '31' => 'follow-up-4',
                '32' => 'follow-up-5',
                '33' => 'closure-initiated',
                '34' => 'patient-exited'
        ]

];