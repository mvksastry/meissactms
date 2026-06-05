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

			@hasexactroles('director')
			@include('layouts.menus.ctms.director')
			@endhasexactroles

			@hasexactroles('ctms_incharge')
			@include('layouts.menus.ctms.incharge')
			@endhasexactroles	
			
			@hasexactroles('cro')
			@include('layouts.menus.ctms.cro')
			@endhasexactroles

			@hasexactroles('clinical_manager')
			@include('layouts.menus.ctms.clinical_manager')
			@endhasexactroles

			@hasexactroles('senior_resident')
			@include('layouts.menus.ctms.senior_resident')
			@endhasexactroles

			@hasexactroles('junior_resident')
			@include('layouts.menus.ctms.junior_resident')
			@endhasexactroles
			
			@hasexactroles('clinical_dataentry')
			@include('layouts.menus.ctms.cde_operator')
			@endhasexactroles
			<!-- /.Main Sidebar Container -->

			@hasexactroles('guest')
			@include('layouts.menus.no-role-menu')
			@endhasexactroles

			@hasexactroles('ctms_guest')
			@include('layouts.menus.no-role-menu')
			@endhasexactroles

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
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	</body>
</html>
