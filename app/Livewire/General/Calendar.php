<?php

namespace App\Livewire\General;

use Livewire\Component;
use App\Models\Common\Event;
use Livewire\Attributes\On;

class Calendar extends Component
{


    public $events = '';

    public $evenAdd;

    #[On('date-selected')]
    public function selectedDate($eventAdd)
    {
        $this->dispatch("openModal", 'modals.modal-pagegel',
					["experiment_id" => $experiment_id]);
        //dd("data selected", $eventAdd);
    }

    public function getevent()
    {       
        $events = Event::select('event_id','title','start')->get();

        return  json_encode($events);
    }

    public function addNewEvent()
    {
        dd("adding new Event");
    }

    public function clearEvent()
    {
        dd("clearing event");
    }

    /**
    * Write code on Method
    *
    * @return response()
    */ 
    public function addevent($event)
    {
        dd('reached');
        $input['title'] = $event['title'];
        $input['start'] = $event['start'];
        //Event::create($input);
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
        $events = Event::select('id','title','start_date')->get();

        $this->events = json_encode($events);

        return view('livewire.general.calendar');
    }

}
