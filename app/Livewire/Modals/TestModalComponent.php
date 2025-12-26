<?php

namespace App\Livewire\Modals;

use Livewire\Component;

class TestModalComponent extends Component
{
    public bool $open = false;
    public ? string $component = null;
    public array $params = [];
    public $show;
    public $data;


    public function render()
    {
        return view('livewire.modals.test-modal-component');
    }

    #[On('open-modal')]
    public function show($params = [])
    {
        dd("reached");
        $this->open = true;
        $this->component = $params['component'] ?? null;
        $this->params = $params ?? [];
    }

    #[On('close-modal')]
    public function hide()
    {
        $this->open = false;
        $this->component = null;
        $this->params = [];
    }


    protected $listeners = ['showModal' => 'showModal'];

    public function mount($data) {
        $this->data = $data;
        //dd($data);
        $this->show = false;
    }

    public function showModal($data) {
        $this->data = $data;
        //dd($data);
        $this->doShow();
    }

    public function doShow() {
        $this->show = true;
    }

    public function doClose() {
        $this->show = false;
    }

    public function doSomething() {
        // Do Something With Your Modal
        //dd("modal opening");
        // Close Modal After Logic
        $this->doClose();
    }

}
