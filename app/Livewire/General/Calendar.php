<?php

namespace App\Livewire\General;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use App\Models\Common\Event;

//traits
use App\Traits\Base;

//Uuid import class
use Illuminate\Support\Str;
//forms
use App\Livewire\Forms\Forms\General\EventForm;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Calendar extends Component
{

    //Form bindings
    public EventForm $form;

    public $events = '';

    public $evenAdd, $evenDate, $calEvent;

    public $selectedDate;
    public $showModal = false;

    // Listen for JS event


    protected $listeners = [
        'calendarDateClicked' => 'handleDateClick',
        'refreshCalEvent' => '$refresh',
        ];

    public function handleDateClick($date)
    {
        //dd($args);
        //$date = $data['date'] ?? null;
        //LivewireAlert::title("reached calendar event place")->info()->show();
        // Trigger modal opening (LivewireUI Modal example)
        $this->dispatch('new-cal-event', date : $date);
    }


    #[On('date-selected')]
    public function selectedDate()
    {
        //dd($calEvent);
        $this->dispatch("new-cal-event");
        //dd("data selected", $eventAdd);
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function getevent()
    {       
        $events = Event::select('id','title','start')->get();

        return  json_encode($events);
    }

    public function updateEventInfo()
    {
        dd("reached");
    }

    public function addNewEvent()
    {
        dd("adding event");
        $this->dispatch('new-cal-event');
        //dd("adding new Event");
    }

    public function clearEvent()
    {
        //dd("clearing event");
    }

    /**
    * Write code on Method
    *
    * @return response()
    */ 
    public function addevent($event)
    {
        //dd('reached');
        $input['title'] = $event['title'];
        $input['start'] = $event['start'];
        //Event::create($input);
    }

    public function postEventInfo()
    {
        //dd("reached");
        
        $this->form->validate();
        $input = $this->form->all();
        $ne = new Event();
        $ne->fill($input);
        //dd($input, $ne);
        $ne->save();
        $this->form->reset();
        $this->evenGetQuery();
        $this->dispatch('refreshCalEvent');


    }
    /**
    * Write code on Method
    *
    * @return response()
    */
    public function eventDrop($event, $oldEvent)
    {
      $eventdata = Event::find($event['id']);
      $eventdata->start = $event['start'];
      $eventdata->save();
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function render()
    {       
        $this->evenGetQuery();
        /*
        //$events = Event::select('id','title','start_date')->get();
        $events = Event::select('id', 'title', 
                                'start_date', 'start_hour', 'start_min', 
                                'end_date', 'end_hour', 'end_min' )
                            ->get()
                            ->map(function ($event) {
                                return [
                                    'id'     => $event->id,
                                    'title'  => $event->title,
                                    // Combine date + time into ISO 8601 format
                                    'start' => sprintf(
                                        '%sT%02d:%02d:00',
                                        date('Y-m-d', strtotime($event->start_date)),
                                        $event->start_hour,
                                        $event->start_min
                                    ),
                                    'end'   => sprintf(
                                        '%sT%02d:%02d:00',
                                        date('Y-m-d', strtotime($event->end_date)),
                                        $event->end_hour,
                                        $event->end_min
                                    )
                                ];
            });
            */
        //$this->events = json_encode($events);

                // Pass to view as JSON
        return view('livewire.general.calendar', [
            'events' => $this->events->toJson()
        ]);
        //return view('livewire.general.calendar');
    }

    public function evenGetQuery()
    {
                //$events = Event::select('id','title','start_date')->get();
        $this->events = Event::select('id', 'title', 
                                'start_date', 'start_hour', 'start_min', 
                                'end_date', 'end_hour', 'end_min' )
                            ->get()
                            ->map(function ($event) {
                                return [
                                    'id'     => $event->id,
                                    'title'  => $event->title,
                                    // Combine date + time into ISO 8601 format
                                    'start' => sprintf(
                                        '%sT%02d:%02d:00',
                                        date('Y-m-d', strtotime($event->start_date)),
                                        $event->start_hour,
                                        $event->start_min
                                    ),
                                    'end'   => sprintf(
                                        '%sT%02d:%02d:00',
                                        date('Y-m-d', strtotime($event->end_date)),
                                        $event->end_hour,
                                        $event->end_min
                                    )
                                ];
            });
    }

}
