<div id="kt_aside" class="aside hijau aside-dark aside-hoverable" data-kt-drawer="true"
	data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}"
	data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
	data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
	<div class="aside-logo hijau flex-column-auto" id="kt_aside_logo">
		<a href="#">
			<img alt="Logo" src="{{ asset('img/logo.png') }}" class="h-50px logo" />
		</a>
	</div>
	<div class="aside-menu flex-column-fluid">
		<div class="my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
			data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
			data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
			data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
			<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
				id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<span class="menu-link">
						<span class="menu-icon">
							<span class="svg-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
									viewBox="0 0 24 24" fill="none">
									<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
									<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
										fill="currentColor" />
									<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
										fill="currentColor" />
									<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
										fill="currentColor" />
								</svg>
							</span>
						</span>
						<span class="menu-title">Dashboards</span>
						<span class="menu-arrow"></span>
					</span>
					<div class="menu-sub menu-sub-accordion menu-active-bg">
						<div class="menu-item">
							<a class="menu-link" href="{{ route('user.index') }}">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Dashboard</span>
							</a>
						</div>
					</div>
				</div>
				<div class="menu-item">
					<div class="menu-content pt-8 pb-2">
						<span class="menu-section text-muted text-uppercase fs-8 ls-1">Apps</span>
					</div>
				</div>
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					{{-- <a href="{{ route('crud.index') }}"><span class="menu-link">
						<span class="menu-icon">
							<!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
							<span class="svg-icon svg-icon-2">
								<i class="bi bi-calendar-check fs-2"></i>
							</span>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-title">CRUD</span>
					</span></a> --}}
					<a href="{{ route('koperasi.index') }}"><span class="menu-link">
						<span class="menu-icon">
							<!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
							<span class="svg-icon svg-icon-2">
								<i class="bi bi-calendar-check fs-2"></i>
							</span>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-title">Barang Koperasi</span>
					</span></a>
					<a href="{{ route('datapulsa.index') }}"><span class="menu-link">
						<span class="menu-icon">
							<!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
							<span class="svg-icon svg-icon-2">
								<i class="bi bi-calendar-check fs-2"></i>
							</span>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-title">Pulsa</span>
					</span></a>
				</div>
			</div>
			<!--end::Menu-->
		</div>
		<!--end::Aside Menu-->
	</div>
	<!--end::Aside menu-->
	
</div>