<?php

namespace App\Livewire\General;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use App\Models\Common\Todo;

//traits
use App\Traits\Base;

//Uuid import class
use Illuminate\Support\Str;

class TodoList extends Component
{
    use Base;

    public $message;
    public $todo_item;
    public $todo_list = [];

    public function render()
    {
        $this->todo_list = Todo::all();
        foreach($this->todo_list as $item)
        {
            $start = date('Y-m-d H:i:s');
            $end = $item->created_at;
            $et = $this->elapsedTime($start, $end);
            $item->elapsed_time = $et;
        }
        //dd($this->todo_list);
        return view('livewire.general.todo-list');
    }

    public function setTodoItem()
    {
        $validatedData     = $this->validate(
        [
            'todo_item'           => 'required|string|regex:/^[A-Za-z0-9-_,. ]+$/|max:200',
        ],
        [
            'todo_item.required'  => 'Error: The :attribute cannot be empty.',
            'todo_item.todo_item' => 'Error: The :attribute must be letters, dash and underscore only.',			
        ],
        [ 
            'todo_item'           => 'To do item',
        ]);

        $newTodo = new Todo();
        $newTodo->uuid = Str::uuid()->toString();
        $newTodo->user_id = Auth::id();
        $newTodo->message = $this->todo_item;
        $newTodo->is_seen = 0;
        //dd($newTodo);
        $newTodo->save();
        $this->todo_list = Todo::all();
        $newTodo = null;
        $this->todo_item = null;
    }

    public function markAsDone($id)
    {
        $res = Todo::where('uuid', $id)->first();
        $res->is_seen = true;
        $res->update();
        $this->todo_list = Todo::all();
        //dd($id);
    }

    public function deleteItem()
    {
        dd("deleting");
    }
    
}
