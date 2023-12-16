<!DOCTYPE html>
<html lang="en">

@include('theme.web.head')
@yield('css')
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
	
	<div class="page-loader flex-column">
		<img alt="Logo" style="width:5%;" class="max-h-25px" src="{{ asset('img/web/logo.png') }}" />
		<div class="d-flex align-items-center mt-5">
			<span class="spinner-border text-primary" role="status"></span>
			<span class="text-muted fs-6 fw-bold ms-5">Tunggu Sebentar...</span>
		</div>
	</div>

	<div class="d-flex flex-column flex-root">

		<div class="page d-flex flex-row flex-column-fluid">

				@include('theme.web.side')

			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

					@include('theme.web.header')

				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

					<div class="post d-flex flex-column-fluid" id="kt_post">

						<div id="kt_content_container" class="container-xxl">

							{{ $slot }}
							
						</div>

					</div>

				</div>

				<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">

					@include('theme.web.footer')

				</div>

			</div>

		</div>
	
	</div>
	@include('theme.web.js')
	@yield('custom_js')
</body>


</html>