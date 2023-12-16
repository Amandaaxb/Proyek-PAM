<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{{ asset('metronic/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('metronic/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('metronic/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="{{ asset('img/logo.png') }}">
	<!--end::Global Stylesheets Bundle-->
	<link href="{{asset('keenthemes/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('keenthemes/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/confirm.css') }}"  rel="stylesheet" type="text/css">
	<link href="{{ asset('metronic/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
	

	<title>{{config('app.name') . ': ' .$title ?? config('app.name')}}</title>
	<style>
		.aside-menu .menu .menu-item .menu-link .menu-title{
			color: #ffffff !important;
		}
		.aside-menu .menu .menu-item .menu-link .menu-title:hover{
			color: #ffffff !important;
		}
	</style>
</head>