<div>
    {{-- The best athlete wants his opponent at his best. --}}
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <!-- DIRECT CHAT -->
        <!-- /.card-header -->
        <div class="card-body">
          <!-- Conversations are loaded here -->
          <div class="direct-chat-messages">
            <!-- Message. Default to the left -->
            @foreach($chats as $chat)
                @if($chat->user_id != Auth::id())
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">{{ $chat->user->name }}</span>
                      <span class="direct-chat-timestamp float-right">
                        {{ date('d M g:i a'  ,strtotime($chat->created_at)) }}</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="{{asset('assets/dist/img/user3-128x128.jpg') }}" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        {{ $chat->message }}
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->
                @else
                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-right">{{ $chat->user->name }}</span>
                            <span class="direct-chat-timestamp float-left">{{ date('d M g:i a'  ,strtotime($chat->created_at)) }}</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="{{asset('assets/dist/img/user4-128x128.jpg')}}" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                            {{ $chat->message }}
                        </div>
                    <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
                @endif
            @endforeach
            <!-- Message. Default to the left -->
            <!-- /.direct-chat-msg -->
            <!-- Message to the right -->
            <!-- /.direct-chat-msg -->
          </div>
          <!--/.direct-chat-messages-->

          <!-- Contacts are loaded here -->
          <!-- Contacts are loaded here -->
          <div class="direct-chat-contacts">
            <ul class="contacts-list">
              @foreach($contacts as $contact)
              <!-- Begin Contact Item -->
              <li>
                <a href="#">
                  <img class="contacts-list-img" src="{{asset('profile/img/user4-128x128.jpg') }}" alt="User Avatar">
                  <div class="contacts-list-info">
                    <span class="contacts-list-name">
                      {{ $contact->name }}
                      <small class="contacts-list-date float-right">Last Login: {{ date('d-m-Y', strtotime($contact->last_login)) }}</small>
                    </span>
                    <span class="contacts-list-msg">{{ $contact->email }}</span>
                  </div>
                  <!-- /.contacts-list-info -->
                </a>
              </li>
              <!-- End Contact Item -->
              @endforeach
            </ul>
            <!-- /.contacts-list -->
          </div>
          <!-- /.direct-chat-pane -->
          <!-- /.direct-chat-pane -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <form action="#" method="post">
            <div class="input-group">
              <input type="text" wire:model="chat_msg" name="message" placeholder="Type Message ..." class="form-control">
              <span class="input-group-append">
                <button wire:click="postChatMessage" type="button" class="btn btn-primary">Send</button>
              </span>
            </div>
          </form>
        </div>
        <!-- /.card-footer-->


</div>
