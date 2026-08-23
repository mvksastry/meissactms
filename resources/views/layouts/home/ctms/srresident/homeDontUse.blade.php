@extends('layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('layouts.home.commons.homePageTopHeader')
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          @include('layouts.home.ctms.srresident.flexWrap')
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          @include('layouts.home.ctms.srresident.sr-dash-tables')
        </div>
        <!-- home page widgets -->
        <div class="row">

        </div>
        <div class="row">

        </div>
        <!-- /End of widgets -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
