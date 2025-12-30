<div>
    {{-- Be like water. --}}
    {{-- In work, do what you enjoy. --}}
    <!-- TO DO List -->

        <!-- /.card-header -->
        <div class="card-body">
            <ul class="todo-list" data-widget="todo-list">
                @foreach($todo_list as $item)
                    <li>
                        <!-- drag handle -->
                        <span class="handle">
                        <i class="fas fa-ellipsis-v"></i>
                        <i class="fas fa-ellipsis-v"></i>
                        </span>
                        <!-- checkbox -->
                        <div  class="icheck-primary d-inline ml-2">
                        <input type="checkbox" value=""
                        @if($item->is_seen)
                        checked="checked"
                        @endif
                        name="todo1" id="todoCheck1">
                        <label for="todoCheck1"></label>
                        </div>
                        <!-- todo text -->
                    
                        @if($item->is_seen)
                        <span class="text-decoration-line-through"><del>{{ $item->message }}</del></span>
                        @else
                        <span class="text" >{{ $item->message }}</span>
                        @endif
                        
                        <!-- Emphasis label -->
                        <small class="badge badge-warning"><i class="far fa-clock"></i> {{ $item->elapsed_time }}</small>
                        <!-- General tools such as edit or delete-->
                        <div class="tools">
                        <i wire:click="markAsDone('{{ $item->uuid }}')" class="fas fa-edit"></i>
                        <i wire:click="deleteItem" class="fas fa-trash"></i>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="card-footer">
              <div class="input-group">
                <input type="text" name="message" wire:model="todo_item" placeholder="Add To do item..." class="form-control">
                <span class="input-group-append">
                  <button type="button" wire:click="setTodoItem" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add item</button>
                </span>
              </div>
        </div>
        <!-- /.card-body -->
    
        <!-- /.card -->

</div>
