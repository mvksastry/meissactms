<!DOCTYPE html>
<html lang="en">
	<head>
		@include('layouts.partials.header')
	</head>
	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">
			<!-- preloader -->
			@include('layouts.partials.preloader')
			<!-- /.preloader -->

			<!-- Navbar -->
			@include('layouts.partials.navbar')
			<!-- /.navbar -->

			<!-- Main Sidebar Container -->
			@hasexactroles('sys_admin')
			@include('layouts.menus.sysadmin.admin')
			@endhasexactroles

			@hasexactroles('ctms_incharge')
			@include('layouts.menus.ctms.incharge')
			@endhasexactroles	
			@hasexactroles('director')
			@include('layouts.menus.ctms.director')
			@endhasexactroles
			<!-- /.Main Sidebar Container -->
			
			<!-- Dynamic content -->
			@yield('content')  		
			<!-- /.Dynamic content -->
					  
			@include('layouts.partials.footer')

			<!-- Control Sidebar -->
			@include('layouts.partials.csidebar')
			<!-- /.control-sidebar -->
			

		</div>
		<!-- scripts -->
    
		@include('layouts.partials.scripts')
      
		<!-- /.scripts -->
	</body>
</html>
