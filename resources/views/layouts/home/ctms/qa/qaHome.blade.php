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
