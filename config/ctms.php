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
                '100' => 'on-boarding-began',
        '120' => 'on-boarding-aborted',
                '130' => 'on-boarding-complete',
                '140' => 'pre-enrollment-data',
        '150' => 'pre-enrollment-aborted',
                '160' => 'pre-enrollment-data-capture-complete',

        '170' => 'patient-aborted-at-discectomy',	
                '180' => 'discectomy-completed',
                '190' => 'discectomy-sample-collected',
                '200' => 'discectomy-sample-passed-to-process',

        '210' => 'discectomy-sample-status-fail',
                '220' => 'discectomy-sample-status-success',

        '230' => 'QC-check-1-failed',
                '240' => 'QC-check-1-success',

                '250' => 'mfg-started',
        '260' => 'mfg-aborted',
                '270' => 'mfg-success',
                '280' => 'mfg-status-evaluated',
        '290' => 'QC-check-2-fail',
                '300' => 'QC-check-2-success',

        '310' => 'QA-rejected',
                '320' => 'QA-accepted',

        '330' => 'enrollment-aborted',
                '340' => 'enrollment-completed',

                '350' => 'admin-assigned-control-numbers',

        '360' => 'transplantation-aborted',
                '370' => 'transplantation-done',
                
                '380' => 'follow-up-1',
                '390' => 'follow-up-2',
                '400' => 'follow-up-3',
                '410' => 'follow-up-4',
                '420' => 'follow-up-5',
                '430' => 'closure-initiated',
                '440' => 'patient-exited'
        ],

        'abort_steps' => [
                '120', 
                '150',
                '170',
                '210',
                '230',
                '260',
                '290',
                '310',
                '330',
                '360'
        ],


        'modq_painIntensity' => [
                0 => 'I can tolerate the pain I have without having to use pain medication.', 
                1 => 'The pain is bad, but I can manage without having to take pain medication.', 
                2 => 'Pain medication provides me with complete relief from pain.', 
                3 => 'Pain medication provides me with moderate relief from pain.', 
                4 => 'Pain medication has no effect on my pain.', 
                5 => 'Pain medication has no effect on my pain.'
        ],

        'modq_persCare' => [
                0 => 'I can take care of myself normally without causing increased pain',
                1 => 'I can take care of myself normally, but it increases my pain',
                2 => 'It is painful to take care of myself, and I am slow and careful.',
                3 => 'I need help, but I am able to manage most of my personal care.',
                4 => 'I need help every day in most aspects of my care.',
                5 => 'I do not get dressed, I wash with difficulty, and I stay in bed.'
        ],


        'modq_lifting' => [
                0 => 'I can lift heavy weights without increased pain.',
                1 => 'I can life heavy weights, but it causes increased pain.',
                2 => 'Pain prevents me from lifting heavy weights off the floor, but I can manage if the weights are conveniently positioned (e.g. on a table).',
                3 => 'Pain prevents me from lifting heavy weights, but I can manage light to medium weights if they are conveniently positioned.',
                4 => 'I can lift only very light weights.',
                5 => 'I cannot lift or carry anything at all.'
        ],

        'modq_walking'=> [
                0 => 'Pain does not prevent me from walking any distance.',
                1 => 'Pain prevents me from walking more than 1 mile.',
                2 => 'Pain prevents me from walking more than 1/2 (half) mile.',
                3 => 'Pain prevents me from walking more than 1/4 (quarter) mile.',
                4 => 'I can walk only with crutches or a cane.',
                5 => 'I am in bed most of the time and have to crawl to the toilet.'
        ],

        'modq_sitting' => [
                0 => 'I can sit in any chair as long as I like.',
                1 => 'I can only sit in my favourite chair as long as I like.',
                2 => 'Pain prevents me from sitting for more than 1 hour.',
                3 => 'Pain prevents me from sitting for more than 1/2 hour.',
                4 => 'Pain prevents me from sitting for more than 10 minutes.',
                5 => 'Pain prevents me from sitting at all.'
        ],

        'modq_standing' => [
                0 => 'I can stand as long as I want without increased pain.',
                1 => 'I can stand as long as I want, but it increases my pain.',
                2 => 'Pain prevents me from standing for more than 1 hour.',
                3 => 'Pain prevents me from standing for more than 1/2 hour.',
                4 => 'Pain prevents me from standing for more than 10 minutes.',
                5 => 'Pain prevents me from standing at all.',
        ],


        'modq_sleeping' => [
                0 => 'Pain does not prevent me from sleeping well.',
                1 => 'I can sleep well only by using pain medication.',
                2 => 'Even when I take medication, I sleep less than 6 hours.',
                3 => 'Even when I take medication, I sleep less than 4 hours.',
                4 => 'Even when I take medication, I sleep less than 2 hours.',
                5 => 'Pain prevents me from sleeping at all.',
        ],

        'modq_sociallife' => [
                0 => 'My social life is normal and does not increase my pain.',
                1 => 'My social life is normal, but it increases my level of pain.',
                2 => 'Pain prevents me from participating in more energetic activities (e.g. sport, dancing).',
                3 => 'Pain prevents me from going out very often.',
                4 => 'Pain has restricted my social life to my home.',
                5 => 'I have hardly any social life because of my pain.',
        ],  


        'modq_travelling' => [
                0 => 'I can travel anywhere without increased pain.',
                1 => 'I can travel anywhere, but it increases my pain.',
                2 => 'My pain restricts my travel over 2 hours.',
                3 => 'My pain restricts my travel over 1 hours.',
                4 => 'My pain restricts my travel to short necessary journeys under 1/2 hours.',
                5 => 'My pain prevents all travel except for visits to the physician/therapist or hospital.',
        ], 


        'modq_emphome' => [
                0 => 'My normal homemaking/job activities do not cause pain.',
                1 => 'My normal homemaking/job activities increase my pain, but i can still perform all that is required of me.',
                2 => 'I can perform most of my homemaking/job duties, but pain prevents me from performing more physically stressful activities(e.g. lifting, vacuuming).',
                3 => 'Pain prevents me from doing anything but light duties.',
                4 => 'Pain prevents me from doing even light duties.',
                5 => 'Pain prevents me from performing any job or homemaking chores.',
        ],

        'rmqreplies' => [
                1 => "I stay at home most of the time because of my back.",
                2 => "I change position frequently to try to get my back comfortable.",
                3 => "I walk more slowly than usual because of my back. ", 
                4 => "Because of my back, I am not doing any jobs that I usually do around the house.", 
                5 => "Because of my back, I use a handrail to get upstairs. ", 
                6 => "Because of my back, I lie down to rest more often.  ", 
                7 => "Because of my back, I have to hold on to something to get out of an easy chair.", 
                8 => "Because of my back, I try to get other people to do things for me.", 
                9 => "I get dressed more slowly than usual because of my back.", 
                10 => "I only stand up for short periods of time because of my back.", 
                11 => "Because of my back, I try not to bend or kneel down.  ", 
                12 => "I find it difficult to get out of a chair because of my back.", 
                13 => "My back is painful almost all of the time.", 
                14 => "I find it difficult to turn over in bed because of my back.", 
                15 => "My appetite is not very good because of my back.", 
                16 => "I have trouble putting on my socks (or stockings) because of the pain in my back.", 
                17 => "I can only walk short distances because of my back pain.", 
                18 => "I sleep less well because of my back.", 
                19 => "Because of my back pain, I get dressed with the help of someone else.", 
                20 => "I sit down for most of the day because of my back.", 
                21 => "I avoid heavy jobs around the house because of my back.", 
                22 => "Because of back pain, I am more irritable and bad tempered with people than usual.", 
                23 => "Because of my back, I go upstairs more slowly than usual.", 
                24 => "I stay in bed most of the time because of my back.",
        ]

];