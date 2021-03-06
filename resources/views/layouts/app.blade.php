<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="_token" content="{!! csrf_token() !!}"/>

    <title>@yield('title')</title>
	<link rel="Shortcut Icon" type="image/png" href="{{asset('images/favicon.ico')}}">
    <!--CSS-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/themes/default/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/modal.css')}}">
	
	<!-- Stylesheet -->
	<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.ui.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.browser.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.fancyfields.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.fancybox.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.mousewheel.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.mcustomscrollbar.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.datatables.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.datatables.fixedcolumns.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.chosen.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.qtip.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/raphael.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/multiselect.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/autosize.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.ui.timepicker.js')}}"></script>

	<!-- Calendar -->
	<script type="text/javascript" src="{{asset('js/date.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.formbubble.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/fullcalendar.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/fullcalendar.viewmore.js')}}"></script>

	<!-- Global -->
	<script type="text/javascript" src="{{asset('js/script.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/script.navigation.js')}}"></script>

	<!-- Plugins -->
	<script type="text/javascript" src="{{asset('js/plugins/accordion-toggle.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/advanced-combobox.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/body-navigation.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/combobox.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/datepicker.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/editor.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/freeze-pane.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/fullcalendar.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/scrollbar.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/tabulation.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/tooltip.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/uploader.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/widgets.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/multiselect.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/modal.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/bootbox.min.js')}}"></script>

	<!-- Main JS -->
	<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('css/mycss.css')}}">
	<script type="text/javascript" src="{{asset('js/core/myscript.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/core/pagging.js')}}"></script>

	<!-- Google Chart -->
	<!--<script type="text/javascript" src="{{asset('https://www.google.com/jsapi')}}"></script>-->
	<script type="text/javascript" src="{{asset('js/googledata.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/script.google-chart.js')}}"></script>
	
	<script type="text/javascript">
	$.ajaxSetup({
	   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});
	</script>
</head>
<body>
	<div id="page" class="main-container">
		<header class="header" id="header">
			<div class="header-top">
				<div class="container">
					<section class="logo table-layout">
						<a href="{{url('index.php')}}" class="logo-image table-cell valign-middle auto-width">
							<span class="image-container">
								<img src="{{asset('images/logo.png')}}" alt="Logo">
							</span>
						</a>
						<a href="{{url('index.php')}}" class="logo-text table-cell valign-middle">
							<span class="site-name">
								Universitas Pancasila
							</span>
						</a>
					</section>
				</div>
			</div>
			<div class="header-border">
				<div class="row">
					<div class="column one-eight" style="background: #777777;"></div>
					<div class="column one-eight" style="background: #70bbdb;"></div>
					<div class="column one-eight" style="background: #f4381b;"></div>
					<div class="column one-eight" style="background: #725196;"></div>
					<div class="column one-eight" style="background: #f67a22;"></div>
					<div class="column one-eight" style="background: #4b4b7f;"></div>
					<div class="column one-eight" style="background: #e66ba1;"></div>
					<div class="column one-eight" style="background: #ffda06;"></div>
				</div>
			</div>
			<div class="header-bottom">
				<div class="container">
					<section class="top-navigation">
						<nav class="navigation">
							<div class="container">
								<ul class="menu left">
									<li class="expand-menu expand-item-menu">
										<a href="{{url('#')}}" class="expand-action-menu">
											<i class="icon icon-burger-menu"></i>
											<span class="label">Menu</span>
										</a>
										<div class="expand-menu-container">
											<ul class="sub-menu main-menu primary-menu">
												<li><a href="{{url('index.php')}}">Dashboard</a></li>
												<li class="has-menu">
													<a href="{{url('#')}}">Samples</a>
													<ul class="sub-sub-menu">
														<li><a href="{{url('sample-archive.php')}}">Archive</a></li>
														<li><a href="{{url('sample-forms.php')}}">Forms</a></li>
														<li><a href="{{url('sample-icons.php')}}">Icons</a></li>
														<li><a href="{{url('login.php')}}">Login Page</a></li>
														<li><a href="{{url('sample-notification.php')}}">Notification</a></li>
														<li class="has-menu">
															<a href="{{url('#')}}">Others</a>
															<ul class="sub-sub-menu">
																<li><a href="{{url('sample-toogle-table.php')}}">Toggle Table</a></li>
															</ul>
														</li>
														<li><a href="{{url('sample-page.php')}}">Single Page</a></li>
													</ul>
												</li>
												<li class="has-menu">
													<a href="{{url('#')}}">Documentation</a>
													<ul class="sub-sub-menu">
														<li><a href="{{url('getting-started.php')}}">Getting Started</a></li>
														<li><a href="{{url('documentation-widgets.php')}}">Widgets</a></li>
														<li><a href="{{url('documentation-forms.php')}}">Forms</a></li>
														<li><a href="{{url('documentation-grids.php')}}">Grid System</a></li>
														<li class="has-menu">
															<a href="{{url('#')}}">Pre Content</a>
															<ul class="sub-sub-menu">
																<li><a href="{{url('documentation-agenda-navigation.php')}}">Agenda Navigation</a></li>
																<li><a href="{{url('documentation-body-navigation.php')}}">Body Navigation</a></li>
																<li><a href="{{url('documentation-breadcrumb.php')}}">Breadcrumb</a></li>
																<li><a href="{{url('documentation-user-content.php')}}">User Content</a></li>
															</ul>
														</li>
														<li class="has-menu">
															<a href="{{url('#')}}">Contents</a>
															<ul class="sub-sub-menu">
																<li><a href="{{url('documentation-button.php')}}">Button</a></li>
																<li><a href="{{url('documentation-table.php')}}">Table</a></li>
																<li><a href="{{url('documentation-typography.php')}}">Typography</a></li>
															</ul>
														</li>
														<li class="has-menu">
															<a href="{{url('#')}}">Components</a>
															<ul class="sub-sub-menu">
																<li><a href="{{url('documentation-advanced-combobox.php')}}">Advanced Combobox</a></li>
																<li><a href="{{url('documentation-accordion-toggle.php')}}">Accordion &amp; Toggle</a></li>
																<li><a href="{{url('documentation-content-editor.php')}}">Content Editor</a></li>
																<li><a href="{{url('documentation-form-loader.php')}}">Form Loader</a></li>
																<li><a href="{{url('documentation-freeze-pane.php')}}">Freeze Pane</a></li>
																<li><a href="{{url('documentation-fullcalendar.php')}}">Fullcalendar</a></li>
																<li><a href="{{url('documentation-input-group.php')}}">Input Group</a></li>
																<li><a href="{{url('documentation-legend.php')}}">Legend</a></li>
																<li><a href="{{url('documentation-pagination.php')}}">Pagination</a></li>
																<li><a href="{{url('documentation-popup.php')}}">Popup</a></li>
																<li><a href="{{url('documentation-search-filter.php')}}">Search Filter</a></li>
																<li><a href="{{url('documentation-tabulation.php')}}">Tabulation</a></li>
																<li><a href="{{url('documentation-tooltip.php')}}">Tooltip</a></li>
															</ul>
														</li>
													</ul>
												</li>
												<li>
													<a href="{{url('download-349584q13NX08pNHA8g8n6qh4i.php')}}">Download Package</a>
												</li>
												<li class="has-menu">
													<a href="{{url('#')}}">Sub Menu</a>
													<ul class="sub-sub-menu">
														<li class="has-menu">
															<a href="{{url('#')}}">Level 2 Item</a>
															<ul class="sub-sub-menu">
																<li class="has-menu">
																	<a href="{{url('#')}}">Level 3 Item</a>
																	<ul class="sub-sub-menu">
																		<li><a href="{{url('#')}}">Level 4 Item</a></li>
																	</ul>
																</li>
															</ul>
														</li>
													</ul>
												</li>
											</ul>
										</div>
									</li>
								</ul>

								<ul class="menu right">
									<li class="expand-notification expand-item has-child">
										<a href="{{url('#')}}" class="expand-action">
											<i class="icon icon-notification"></i>
											<span class="notif-count">999</span>
										</a>
										<ul class="sub-menu">
											<li class="sub-title">
												Notification
												<a href="{{url('#')}}">Read All</a>
											</li>
											<li class="list-notification">
												<div class="notification">
													<span class="thumbnail">
														<img src="{{asset('images/statics/avatar.png')}}" alt="">
													</span>
													<span class="details">
														<span class="description">
															New Comment on <a href="{{url('#')}}">Designing Web Interface</a>
														</span>
														<span class="date">28 Oktober 2014 | 11.00 pm</span>
													</span>
												</div>
												<div class="notification">
													<span class="thumbnail">
														<img src="{{asset('images/statics/avatar.png')}}" alt="">
													</span>
													<span class="details">
														<span class="description">
															New Comment on <a href="{{url('#')}}">Designing Web Interface</a>
														</span>
														<span class="date">28 Oktober 2014 | 11.00 pm</span>
													</span>
												</div>
											</li>
											<li class="view-all">
												<a href="{{url('sample-notification.php')}}">View All Notification</a>
											</li>
										</ul>
									</li>
									<li class="expand-settings expand-item has-child">
										<a href="{{url('#')}}" class="expand-action">
											<span class="label">Rebecca Setiadi</span>
											<img src="{{asset('images/statics/avatar.png')}}" alt="">
										</a>
										<ul class="sub-menu">
											<li class="sub-title">Profile</li>
											<li class="setting-content">
												<div class="avatar"><img src="{{asset('images/statics/avatar.png')}}" alt=""></div>
												<div class="details">
													<span class="student-name">Rebecca Setiadi</span>
													<span class="email-address">rsetiadi@gmail.com</span>
													<span class="link">
														<a href="{{url('#')}}">Dashboard</a>
													</span>
													<span class="link">
														<a href="{{url('#')}}">Account Settings</a>
													</span>
												</div>
											</li>
											<li class="logout">
												<a href="{{url('logout.php')}}">Log Out</a>
											</li>
										</ul>
									</li>
									<li class="expand-search-form">
										<span class="wrapper">
											<span class="icon-click-area"></span>
											<i class="icon icon-search"></i>
											<form action="get" action="index.php" class="search-form">
												<span class="search-wrap">
													<input type="text" name="search-keyword" id="search-keyword" class="search-form-field" placeholder="Type and press enter..">
												</span>
											</form>
										</span>
									</li>
								</ul>
							</div>
						</nav>
					</section>
				</div>
			</div>
		</header>
		
		@yield('content')
		
		<footer class="footer new-layout" id="footer">

		<section class="footer-widget">
		<div class="container">
			<div class="group-item">
				<div class="item middle-direction has-padding-right">
					<div class="footer-title">
						<h2 class="title" title="Social Media tooltip">Social Media</h2>
					</div>
					<div class="social-media">
						<a href="{{url('#')}}" class="icon icon-twitter"></a>
						<a href="{{url('#')}}" class="icon icon-facebook"></a>
						<a href="{{url('#')}}" class="icon icon-google-plus"></a>
						<a href="{{url('#')}}" class="icon icon-youtube"></a>
						<a href="{{url('#')}}" class="icon icon-linkedin"></a>
						<a href="{{url('#')}}" class="icon icon-instagram"></a>
					</div>
				</div>
				<div class="item middle-direction has-padding-left bottom-direction">
					<div class="corporate-logo">
						<img src="{{asset('images/logo.png')}}" alt="Logo">
					</div>
					<div class="corporate-area">
						<h1 class="main-title">Universitas Pancasila</h1>
						<h3 class="pre-title">Copyright &copy; 2016</h3>
					</div>
				</div>
				<div class="item middle-direction has-padding">
					<div class="footer-title">
						<h2 class="title">Feedback &amp; Bug</h2>
					</div>
					<div class="feedback-area">
						<a href="{{url('#')}}" class="button button-primary wide" id="show-form-feedback">Report Feedback &amp; Bug</a>
						<div class="feedback-popup">
							<a href="{{url('#')}}" class="feedback-close" id="close-form-feedback"></a>
							<form action="#" method="post">
								<p>
									<input type="text" name="input[]" placeholder="Subject">
								</p>
								<p>
									<textarea name="input[]" row="2" placeholder="Message"></textarea>
								</p>
								<p>
									<input type="submit" class="button button-primary wide" value="Send">
								</p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		</section><!-- .footer-widget -->

		</footer><!-- #footer -->
	</div>
</body>
</html>
