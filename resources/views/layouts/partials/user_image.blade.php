<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <div class="image">
    <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
  </div>
  <div class="info">
    <a href="#" class="d-block">{{ Auth::user()->name }} </br>
      Role : {{ ucfirst(Auth::user()->roles->pluck('name')[0] ?? '') }}</a>
  </div>
</div>
