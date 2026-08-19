<?php

return [

        'stages_status' => [

          'pre-enrollment' => "sealed",
          'discectomy'    => "discectmy_done",
          'sample_collection' => "sample_collection_done",
          'manufacturing' => "mfg_initiated",


        ],

        'abort_codes' => [
            1	=> 12,
            2	=> 22,
            3	=> 30,
            4	=> 50,
            5	=> 55,
            6	=> 65,
            7	=> 85,
            8	=> 95,
            9	=> 105,
            117	=> 117
        ],

        'steps' => [   
                      "10" => 'pre-enrollment', 
                      "20" => 'follow-up-1', 
                      "30" => 'follow-up-2', 
                      "40" => 'follow-up-3', 
                      "50" => 'follow-up-4', 
                      "60" => 'follow-up-5', 
                      "70" => 'extra',
        ]

];