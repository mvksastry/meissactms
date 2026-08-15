<div>
  <section id="top1" class="content">
    <div class="container-fluid">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section id="top2" class="col-lg-4 connectedSortable">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                ADD EVENT
              </h3>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item"></li>
                  <li class="nav-item"></li>
                </ul>
              </div>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <tr>
                    <th colspan="6">
                      <!-- Validation Errors -->
                    </th>
                  </tr>
                  <tbody>
                    <tr>
                      <td colspan="3">
                        <label>Event title</label>
                        <input wire:model.defer="form.title" id="title" name="title" type="text"
                          class="form-control input-sm">
                        @error('form.title')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <label>Description</label>
                        <input wire:model.defer="form.description" id="description" name="description" type="text"
                          class="form-control input-sm">
                        @error('form.description')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Start Date</label>
                        <input wire:model.defer="form.start_date" id="start_date" name="start_date" type="date"
                          class="form-control input-sm">
                        @error('form.start_date')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                      <td>
                        <label>Start Hour</label>
                        <input wire:model.defer="form.start_hour" id="start_hour" name="start_hour" type="text"
                          class="form-control input-sm">
                        @error('form.start_hour')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                      <td>
                        <label>Status Min</label>
                        <input wire:model.defer="form.start_min" id="start_min" name="start_min" type="text"
                          class="form-control input-sm">
                        @error('form.start_min')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <label>End Date</label>
                        <input wire:model.defer="form.end_date" id="end_date" name="end_date" type="date"
                          class="form-control input-sm">
                        @error('form.end_date')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                      <td>
                        <label>End Hour</label>
                        <input wire:model.defer="form.end_hour" id="end_hour" name="end_hour" type="text"
                          class="form-control input-sm">
                        @error('form.end_hour')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                      <td>
                        <label>End Min</label>
                        <input wire:model.defer="form.end_min" id="end_min" name="end_min" type="text"
                          class="form-control input-sm">
                        @error('form.end_min')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Resource</label>
                        <input wire:model.defer="form.resource_id" id="resource_id" name="resource_id" type="text"
                          value="0" class="form-control input-sm">
                        @error('form.resource_id')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                      <td>
                        <label>Priority</label>
                        <input wire:model.defer="form.priority" id="priority" name="priority" type="text"
                          class="form-control input-sm">
                        @error('form.priority')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                      <td>
                        <label>Posted By</label>
                        <input wire:model.defer="form.created_by" id="created_by" name="created_by" type="text"
                          class="form-control input-sm">
                        @error('form.created_by')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <button wire:click="postEventInfo()"
                          class="btn btn-success text-white font-normal mt-3 rounded">ADD
                          EVENT</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </section>

        <section id="top2" class="col-lg-8 connectedSortable">
          <div class="card bg-gradient-white card-outline">
            <div class="card-header border-0">
              <h3 class="card-title">
                <i class="far fa-calendar-alt"></i>
                Calendar
              </h3>
              <!-- tools card -->
              <div class="card-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"
                    data-offset="-52">
                    <i class="fas fa-bars"></i>
                  </button>
                  <div class="dropdown-menu" role="menu">
                    <a href="#" wire:click.prevent="addNewEvent()" class="dropdown-item">Add new event</a>
                    <a href="#" wire:click.prevent="clearEvent()" class="dropdown-item">Clear events</a>
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
        </section>
      </div>
    </div>
  </section>

</div>
<!-- /.card -->

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var events = {!! $events !!};
    console.log(events);
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: events, // Directly use Laravel data
      headerToolbar: {
        center: 'title', // Year and Month
        left: 'prev',
        right: 'next'
      },

      selectable: true, // Highlight days by clicking

      dateClick: function(info) {
        //alert('Clicked on: ' + info.dateStr);
        //Livewire.dispatch('calendarDateClicked', {
        //  date: info.dateStr
        //});
        //Livewire.dispatch('openDateModal', { date: info.dateStr });
        // Send event to Livewire component
        Livewire.dispatch('date-selected');
        /*
          var title = prompt('Enter Event Title');
          var date = new Date(info.dateStr + 'T00:00:00');
          if (title != null && title != '') {
            calendar.addEvent({
              title: title,
              start: date,
              allDay: true
            });
            var calEvent = {
              title: title,
              start: date
            };


            //Livewire.on('date-selected', (eventAdd) => {
            //  alert('Great. Now, update your database...');
            //});

            //

          } else {
            alert('Event Title Is Required');
          }
            */
        //$(this).addevent(events);
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
          this.getEvents().forEach(function(e) {
            if (e.source === null) {
              e.remove();
            }
          });
        }
      },

    });
    calendar.render();
    Livewire.on('refreshCalEvent', function(events) {
      calendar.removeAllEvents();
      calendar.addEventSource(events);
    });
  });
</script>
</div>
