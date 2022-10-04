<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<title>Konsultasi Online Pusbin JFA</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="<?php echo e(asset('adminlte/dist/img/pusbin.png')); ?>" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="<?php echo e(asset('metronic/plugins/custom/fullcalendar/fullcalendar.bundle.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('metronic/plugins/custom/datatables/datatables.bundle.css')); ?>" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="<?php echo e(asset('metronic/plugins/global/plugins.bundle.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('metronic/css/style.bundle.css')); ?>" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-extended header-fixed header-tablet-and-mobile-fixed">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header">
						<!--begin::Header top-->
						<div class="header-top d-flex align-items-stretch flex-grow-1">
							<!--begin::Container-->
							<div class="d-flex container-xxl w-100">
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack align-items-stretch w-100">
									<!--begin::Brand-->
									<div class="d-flex align-items-center align-items-lg-stretch me-5">
										<!--begin::Heaeder navs toggle-->
										<button class="d-lg-none btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-35px h-35px h-md-40px w-md-40px ms-n2 me-2" id="kt_header_navs_toggle">
											<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
													<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</button>
										<!--end::Heaeder navs toggle-->
										<!--begin::Logo-->
										<a href="" class="d-flex align-items-center">
											<img alt="Logo" src="<?php echo e(asset('/adminlte/dist/img/bpkp.png')); ?>" class="h-25px h-lg-30px" />
										</a>
										<!--end::Logo-->
										<div class="align-self-end" id="kt_brand_tabs">
											<!--begin::Header tabs-->
											<div class="header-tabs overflow-auto mx-4 ms-lg-10 mb-5 mb-lg-0" id="kt_header_tabs" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_header_navs_wrapper', lg: '#kt_brand_tabs'}">
												<ul class="nav flex-nowrap">
													<li class="nav-item">
														<a class="nav-link active" data-bs-toggle="tab" href="#kt_header_navs_tab_1">Beranda</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" data-bs-toggle="tab" href="#kt_header_navs_tab_2">Daftar Konsultasi</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" data-bs-toggle="tab" href="#kt_header_navs_tab_5">Pengaturan</a>
													</li>
												</ul>
											</div>
											<!--end::Header tabs-->
										</div>
									</div>
									<!--end::Brand-->
									<!--begin::Topbar-->
									<div class="d-flex align-items-center flex-shrink-0">
										<!--begin::User-->
										<div class="d-flex align-items-center ms-1" id="kt_header_user_menu_toggle">
											<!--begin::User info-->
											<div class="btn btn-flex align-items-center bg-hover-white bg-hover-opacity-10 py-2 px-2 px-md-3" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
												<!--begin::Name-->
												<div class="d-none d-md-flex flex-column align-items-end justify-content-center me-2 me-md-4">
													<span class="text-white opacity-75 fs-8 fw-bold lh-1 mb-1">Wiranti Octaviani</span>
													<span class="text-white fs-8 fw-bolder lh-1">Admin</span>
												</div>
												<!--end::Name-->
												<!--begin::Symbol-->
												<div class="symbol symbol-30px symbol-md-40px">
													<img src="<?php echo e(asset('metronic/media/avatars/150-26.jpg')); ?>" alt="image" />
												</div>
												<!--end::Symbol-->
											</div>
											<!--end::User info-->
											<!--begin::Menu-->
											<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
												<!--begin::Menu item-->
												<div class="menu-item px-3">
													<div class="menu-content d-flex align-items-center px-3">
														<!--begin::Avatar-->
														<div class="symbol symbol-50px me-5">
															<img alt="Logo" src="<?php echo e(asset('metronic/media/avatars/150-26.jpg')); ?>" />
														</div>
														<!--end::Avatar-->
														<!--begin::Username-->
														<div class="d-flex flex-column">
															<div class="fw-bolder d-flex align-items-center fs-5">Wiranti Octaviani</div>
															<a href="#" class="fw-bold text-muted text-hover-primary fs-7">199610072020122009</a>
														</div>
														<!--end::Username-->
													</div>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu separator-->
												<div class="separator my-2"></div>
												<!--end::Menu separator-->
												<!--begin::Menu item-->
												<!-- <div class="menu-item px-5">
													<a href="../../demo20/dist/account/overview.html" class="menu-link px-5">My Profile</a>
												</div> -->
												<!--end::Menu item-->
												<!--begin::Menu separator-->
												<!-- <div class="separator my-2"></div> -->
												<!--end::Menu separator-->
												<!--begin::Menu item-->
												<div class="menu-item px-5">
													<a href="../../demo20/dist/authentication/flows/basic/sign-in.html" class="menu-link px-5">Sign Out</a>
												</div>
												<!--end::Menu item-->
											</div>
											<!--end::Menu-->
										</div>
										<!--end::User -->
										<!--begin::Heaeder menu toggle-->
										<!--end::Heaeder menu toggle-->
									</div>
									<!--end::Topbar-->
								</div>
								<!--end::Wrapper-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Header top-->
						<!--begin::Header navs-->
						<div class="header-navs d-flex align-items-stretch flex-stack h-lg-70px w-100 py-5 py-lg-0" id="kt_header_navs" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_header_navs_toggle" data-kt-swapper="true" data-kt-swapper-mode="append" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header'}">
							<!--begin::Container-->
							<div class="d-lg-flex container-xxl w-100">
								<!--begin::Wrapper-->
								<div class="d-lg-flex flex-column justify-content-lg-center w-100" id="kt_header_navs_wrapper">
									<!--begin::Header tab content-->
									<div class="tab-content" data-kt-scroll="true" data-kt-scroll-activate="{default: true, lg: false}" data-kt-scroll-height="auto" data-kt-scroll-offset="70px">
										<!--begin::Tab panel-->
										<div class="tab-pane fade active show" id="kt_header_navs_tab_1">
											<!--begin::Menu wrapper-->
											<div class="header-menu flex-column align-items-stretch flex-lg-row">
												<!--begin::Menu-->
												<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold align-items-stretch flex-grow-1" id="#kt_header_menu" data-kt-menu="true">
													<div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item here show menu-lg-down-accordion me-lg-1">
														<!-- <a class="menu-link active py-3" href="../../demo20/dist/index.html">
															<span class="menu-title">Beranda</span>
														</a> -->
														<a class="btn btn-sm btn-light-primary fw-bolder" href="../../demo20/dist/documentation/getting-started.html">Beranda</a>
													</div>
												</div>
												<!--end::Menu-->
											</div>
											<!--end::Menu wrapper-->
										</div>
										<!--end::Tab panel-->
										<!--begin::Tab panel-->
										<div class="tab-pane fade" id="kt_header_navs_tab_2">
											<!--begin::Wrapper-->
											<div class="d-flex flex-stack">
												<div class="d-flex gap-2">
													<a class="btn btn-sm btn-light-primary fw-bolder" href="../../demo20/dist/documentation/base/forms/controls.html">Semua Tiket</a>
													<a class="btn btn-sm btn-light-success fw-bolder" href="../../demo20/dist/documentation/base/forms/advanced.html"><i>Open</i> Tiket</a>
													<!-- <a class="btn btn-sm btn-light-danger fw-bolder" href="../../demo20/dist/documentation/base/forms/floating-labels.html">Floating Labels</a> -->
												</div>
												<!-- <div class="d-flex gap-2">
													<a class="btn btn-sm btn-light-info fw-bolder" href="../../demo20/dist/documentation/forms/autosize.html">More Components</a>
												</div> -->
											</div>
											<!--end::Wrapper-->
										</div>
										<!--end::Tab panel-->
										<!--begin::Tab panel-->
										<div class="tab-pane fade" id="kt_header_navs_tab_4"></div>
										<!--end::Tab panel-->
										<!--begin::Tab panel-->
										<div class="tab-pane fade" id="kt_header_navs_tab_5">
											<!--begin::Wrapper-->
											<div class="d-flex flex-stack">
												<div class="d-flex gap-2">
													<a class="btn btn-sm btn-light-primary fw-bolder" href="../../demo20/dist/documentation/getting-started.html"><i>Manage User</i></a>
													<a class="btn btn-sm btn-light-primary fw-bolder" href="../../demo20/dist/documentation/getting-started.html"><i>Manage </i>Layanan</a>
													<a class="btn btn-sm btn-light-primary fw-bolder" href="../../demo20/dist/documentation/getting-started.html"><i>Manage </i>FAQ</a>
													<!-- <a class="btn btn-sm btn-light-success fw-bolder" href="../../demo20/dist/documentation/getting-started/video-tutorials.html">Video Tutorials</a> -->
													<!-- <a class="btn btn-sm btn-light-danger fw-bolder" href="https://preview.keenthemes.com/metronic8/demo20/layout-builder.html">Layout Builder</a> -->
												</div>
												<div class="d-flex gap-2">
													<a class="btn btn-sm btn-light-info fw-bolder" href="../../demo20/dist/documentation/getting-started/changelog.html">Changelog</a>
												</div>
											</div>
											<!--end::Wrapper-->
										</div>
										<!--end::Tab panel-->
									</div>
									<!--end::Header tab content-->
								</div>
								<!--end::Wrapper-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Header navs-->
					</div>
					<!--end::Header-->
					<!--begin::Toolbar-->
					<!-- <div class="toolbar mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar"> -->
						<!--begin::Container-->
						<!-- <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2"> -->
							<!--begin::Page title-->
							<!-- <div class="page-title d-flex flex-column align-items-start me-3 gap-2"> -->
								<!--begin::Title-->
								<!-- <h1 class="d-flex text-dark fw-bolder m-0 fs-3">Beranda</h1> -->
								<!--end::Title-->
							<!-- </div> -->
							<!--end::Page title-->
						<!-- </div> -->
						<!--end::Container-->
					<!-- </div> -->
					<!--end::Toolbar-->
					<!--begin::Container-->
					<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
						<!--begin::Post-->
						<div class="content flex-row-fluid" id="kt_content">
							<!--begin::About card-->
							<div class="card">
								<!--begin::Body-->
								<div class="card-body p-lg-17">
									<!--begin::About-->
									<div class="mb-18">
										<!--begin::Wrapper-->
										<div class="mb-10">
											<!--begin::Top-->
											<div class="text-center mb-15">
												<!--begin::Text-->
												<div class="fs-5 text-muted fw-bold"><?php echo e($mytime); ?> <span id="span"></span></div>
												<!--end::Text-->
												<!--begin::Title-->
												<h3 class="fs-2hx text-dark mb-5">Media Layanan Konsultasi Online</h3>
												<h4>Pusat Pembinaan Jabatan Fungsional Auditor</h4>
												<!--end::Title-->
											</div>
											<!--end::Top-->
										</div>
										<!--end::Wrapper-->
									</div>
									<!--end::About-->
									<!--begin::Statistics-->
									<div class="card bg-light mb-18">
										<!--begin::Body-->
										<div class="card-body py-15">
											<!--begin::Wrapper-->
											<!--begin::Row-->
												<div class="row g-5 g-xl-8">
													<div class="col-xl-3">
														<!--begin::Statistics Widget 1-->
														<div class="card bgi-no-repeat card-xl-stretch mb-xl-8" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-4.svg">
															<!--begin::Body-->
															<div class="card-body">
																<a href="#" class="card-title fw-bolder text-muted text-hover-primary fs-4" style="text-align: center;">Formasi atau Perhitungan Kebutuhan JFA</a>
																<!-- <div class="fw-bolder text-primary my-6">3:30PM - 4:20PM</div>
																<p class="text-dark-75 fw-bold fs-5 m-0">Create a headline that is informative
																<br />and will capture readers</p> -->
																<br>
																<div class="row">
																	<div class="col-md-4">
																		Open
																	</div>
																	<div class="col-md-4">
																		Proses
																	</div>
																	<div class="col-md-4">
																		Closed
																	</div>
																</div>
															</div>
															<!--end::Body-->
														</div>
														<!--end::Statistics Widget 1-->
													</div>
													<div class="col-xl-3">
														<!--begin::Statistics Widget 1-->
														<div class="card bgi-no-repeat card-xl-stretch mb-xl-8" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-2.svg">
															<!--begin::Body-->
															<div class="card-body">
																<a href="#" class="card-title fw-bolder text-muted text-hover-primary fs-4">Meeting Schedule</a>
																<div class="fw-bolder text-primary my-6">03 May 2020</div>
																<p class="text-dark-75 fw-bold fs-5 m-0">Great blog posts don’t just happen Even the best bloggers need it</p>
															</div>
															<!--end::Body-->
														</div>
														<!--end::Statistics Widget 1-->
													</div>
													<div class="col-xl-3">
														<!--begin::Statistics Widget 1-->
														<div class="card bgi-no-repeat card-xl-stretch mb-xl-8" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-2.svg">
															<!--begin::Body-->
															<div class="card-body">
																<a href="#" class="card-title fw-bolder text-muted text-hover-primary fs-4">Meeting Schedule</a>
																<div class="fw-bolder text-primary my-6">03 May 2020</div>
																<p class="text-dark-75 fw-bold fs-5 m-0">Great blog posts don’t just happen Even the best bloggers need it</p>
															</div>
															<!--end::Body-->
														</div>
														<!--end::Statistics Widget 1-->
													</div>
													<div class="col-xl-3">
														<!--begin::Statistics Widget 1-->
														<div class="card bgi-no-repeat card-xl-stretch mb-5 mb-xl-8" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg">
															<!--begin::Body-->
															<div class="card-body">
																<a href="#" class="card-title fw-bolder text-muted text-hover-primary fs-4">UI Conference</a>
																<div class="fw-bolder text-primary my-6">10AM Jan, 2021</div>
																<p class="text-dark-75 fw-bold fs-5 m-0">AirWays - A Front-end solution for airlines build with ReactJS</p>
															</div>
															<!--end::Body-->
														</div>
														<!--end::Statistics Widget 1-->
													</div>
												</div>
												<!--end::Row-->
												
											<!--end::Wrapper-->
											<!--begin::Testimonial-->
											<div class="fs-2 fw-bold text-muted text-center mb-3">
											<span class="fs-1 lh-1 text-gray-700">“</span>When you care about your topic, you’ll write about it in a
											<br />
											<span class="text-gray-700 me-1">more powerful</span>, emotionally expressive way
											<span class="fs-1 lh-1 text-gray-700">“</span></div>
											<!--end::Testimonial-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Statistics-->
								</div>
								<!--end::Body-->
							</div>
							<!--end::About card-->
						</div>
						<!--end::Post-->
					</div>
					<!--end::Container-->
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-xxl d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted fw-bold me-1">2021©</span>
								<a href="" target="_blank" class="text-gray-800 text-hover-primary">Sibijak DevTeam - Pusbin JFA</a>
							</div>
							<!--end::Copyright-->
							<!--begin::Menu-->
							<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
								<li class="menu-item">
									<a href="https://pusbinjfa.bpkp.go.id/" target="_blank" class="menu-link px-2">Website Pusbin JFA</a>
								</li>
								<!-- <li class="menu-item">
									<a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
								</li>
								<li class="menu-item">
									<a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
								</li> -->
							</ul>
							<!--end::Menu-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="<?php echo e(asset('metronic/plugins/global/plugins.bundle.js')); ?>"></script>
		<script src="<?php echo e(asset('metronic/js/scripts.bundle.js')); ?>"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="<?php echo e(asset('metronic/plugins/custom/fullcalendar/fullcalendar.bundle.js')); ?>"></script>
		<script src="<?php echo e(asset('metronic/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="<?php echo e(asset('metronic/js/custom/widgets.js')); ?>"></script>
		<script src="<?php echo e(asset('metronic/js/custom/apps/chat/chat.js')); ?>"></script>
		<script src="<?php echo e(asset('metronic/js/custom/modals/upgrade-plan.js')); ?>"></script>
		<script src="<?php echo e(asset('metronic/js/custom/modals/create-campaign.js')); ?>"></script>
		<script src="<?php echo e(asset('metronic/js/custom/modals/create-app.js')); ?>"></script>
		<script src="<?php echo e(asset('metronic/js/custom/modals/users-search.js')); ?>"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
		<script>
	      var span = document.getElementById('span');

	      function time() {
	        var d = new Date();
	        var s = d.getSeconds();
	        var m = d.getMinutes();
	        var h = d.getHours();
	        span.textContent = 
	          ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);
	      }

	      setInterval(time, 1000);
	    </script>
	</body>
	<!--end::Body-->
</html><?php /**PATH D:\web\konsultasi\resources\views/Admins/homepage.blade.php ENDPATH**/ ?>