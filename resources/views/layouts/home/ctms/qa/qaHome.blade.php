@extends('layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('layouts.home.commons.homePageTopHeader')
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          @include('layouts.home.ctms.qa.qaFlexWrap')
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          @include('layouts.home.ctms.qa.action-tables')
        </div>
        <!-- home page widgets -->
        @include('layouts.home.commons.homePageChatTodoCalendar')
        <!-- /End of widgets -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@extends('layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('layouts.home.commons.homePageTopHeader')
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          @include('layouts.home.ctms.qa.qaFlexWrap')
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            @include('layouts.home.ctms.qa.action-tables')
          </section>
          <!-- Right col -->
          <section class="col-lg-5 connectedSortable">
            @include('layouts.home.commons.homePageTodos')
            @include('layouts.home.commons.homePageChat')
          </section>
        </div>
        <!-- home page widgets -->
        <div class="row">
          <section class="col-lg-12">
            @include('layouts.home.commons.homePageCalendar')
          </section>
        </div>
        <!-- /End of widgets -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
