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

    public $showModal = false;

    // Listen for JS event
    protected $listeners = [
        'calendarDateClicked' => 'handleDateClick',
        'refreshCalEvent' => '$refresh',
        ];

    public function mount()
    {
        $this->evenGetQuery();
    }

    public function getevent()
    {       
        $events = Event::select('id','title','start')->get();

        return  json_encode($events);
    }

    public function updateEventInfo()
    {

    }

    public function addNewEvent()
    {
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
        $this->dispatch('refreshWithNewEvent', events: $this->events);
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
        //$this->events = json_encode($events);

                // Pass to view as JSON
        return view('livewire.general.calendar', [
            'events' => $this->events->toJson()
        ]);
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
