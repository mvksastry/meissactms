<div>
    {{-- The whole world belongs to you. --}}
    {{-- In work, do what you enjoy. --}}

    <div class="card bg-gradient-white">
        <div class="card-header border-0">
          <h3 class="card-title">
            <i class="far fa-calendar-alt"></i>
            Calendar
          </h3>
          <!-- tools card -->
          <div class="card-tools">
            <!-- button with a dropdown -->
            <div class="btn-group">
              <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                <i class="fas fa-bars"></i>
              </button>
              <div class="dropdown-menu" role="menu">
                <a href="#" wire:click.prevent="addNewEvent" class="dropdown-item">Add new event</a>
                <a href="#" wire:click.prevent="clearEvent" class="dropdown-item">Clear events</a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">View calendar</a>
              </div>
            </div>
            <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
          <!-- /. tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body pt-0">
          <!--The calendar -->
          <div id='calendar-container'>
            <div id='calendar'></div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


<script>
    
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
         
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',

            headerToolbar: {
                center: 'title', // Year and Month
                left: 'prev',
                right: 'next'
            },

            selectable: true,   // Highlight days by clicking

            dateClick: function(info) {
                //alert('Clicked on: ' + info.dateStr);
                var title = prompt('Enter Event Title');
                var date = new Date(info.dateStr + 'T00:00:00');
                if(title != null && title != ''){
                    calendar.addEvent({
                        title: title,
                        start: date,
                        allDay: true
                    });
                    var eventAdd = {title: title,start: date};
                    Livewire.dispatch('date-selected', [eventAdd])
                    //Livewire.on('date-selected', (event) => {
                        alert('Great. Now, update your database...');
                    //});
                    //$(this).addevent(eventAdd);
                    
                }else{
                    alert('Event Title Is Required');
                }
            },

            editable: true,
            
            displayEventTime: false,
            droppable: true, // this allows things to be dropped onto the calendar
            drop: function(info) {
                // is the "remove after drop" checkbox checked?
                if (checkbox.checked) {
                // if so, remove the element from the "Draggable Events" list
                info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
            },


            eventDrop: info => this.eventDrop(info.event, info.oldEvent),
            loading: function(isLoading) {
                if (!isLoading) {
                    // Reset custom events
                    this.getEvents().forEach(function(e){
                        if (e.source === null) {
                            e.remove();
                        }
                    });
                }
            },

        });
      
        calendar.render();
      
    });

  </script>






</div>

