<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="_token" content="{!! csrf_token() !!}"/>

    <title>@yield('title')</title>
	<link rel="Shortcut Icon" type="image/png" href="images/favicon.ico">
    <!--CSS-->
		<link rel="stylesheet" type="text/css" href="css/themes/default/css/style.css">
		<link rel="stylesheet" type="text/css" href="css/modal.css">
		
		<!-- Stylesheet -->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.ui.js"></script>
		<script type="text/javascript" src="js/jquery.browser.js"></script>
		<script type="text/javascript" src="js/jquery.fancyfields.js"></script>
		<script type="text/javascript" src="js/jquery.fancybox.js"></script>
		<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="js/jquery.mcustomscrollbar.js"></script>
		<script type="text/javascript" src="js/jquery.datatables.js"></script>
		<script type="text/javascript" src="js/jquery.datatables.fixedcolumns.js"></script>
		<script type="text/javascript" src="js/jquery.chosen.js"></script>
		<script type="text/javascript" src="js/jquery.qtip.js"></script>
		<script type="text/javascript" src="js/raphael.js"></script>
		<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="js/multiselect.js"></script>
		<script type="text/javascript" src="js/autosize.js"></script>
		<script type="text/javascript" src="js/jquery.ui.timepicker.js"></script>

		<!-- Calendar -->
		<script type="text/javascript" src="js/date.js"></script>
		<script type="text/javascript" src="js/jquery.formbubble.js"></script>
		<script type="text/javascript" src="js/fullcalendar.js"></script>
		<script type="text/javascript" src="js/fullcalendar.viewmore.js"></script>

		<!-- Global -->
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/script.navigation.js"></script>

		<!-- Plugins -->
		<script type="text/javascript" src="js/plugins/accordion-toggle.js"></script>
		<script type="text/javascript" src="js/plugins/advanced-combobox.js"></script>
		<script type="text/javascript" src="js/plugins/body-navigation.js"></script>
		<script type="text/javascript" src="js/plugins/combobox.js"></script>
		<script type="text/javascript" src="js/plugins/datepicker.js"></script>
		<script type="text/javascript" src="js/plugins/editor.js"></script>
		<script type="text/javascript" src="js/plugins/freeze-pane.js"></script>
		<script type="text/javascript" src="js/plugins/fullcalendar.js"></script>
		<script type="text/javascript" src="js/plugins/scrollbar.js"></script>
		<script type="text/javascript" src="js/plugins/tabulation.js"></script>
		<script type="text/javascript" src="js/plugins/tooltip.js"></script>
		<script type="text/javascript" src="js/plugins/uploader.js"></script>
		<script type="text/javascript" src="js/plugins/widgets.js"></script>
		<script type="text/javascript" src="js/plugins/multiselect.js"></script>
		<script type="text/javascript" src="js/plugins/modal.js"></script>
		<script type="text/javascript" src="js/plugins/bootbox.min.js"></script>

		<!-- Main JS -->
		<script type="text/javascript" src="js/main.js"></script>
		<link rel="stylesheet" type="text/css" href="css/mycss.css">
		<script type="text/javascript" src="js/core/myscript.js"></script>
		<script type="text/javascript" src="js/core/pagging.js"></script>

		<!-- Google Chart -->
		<!--<script type="text/javascript" src="https://www.google.com/jsapi"></script>-->
		<script type="text/javascript" src="js/googledata.js"></script>
		<script type="text/javascript" src="js/script.google-chart.js"></script>
		
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
						<a href="index.php" class="logo-image table-cell valign-middle auto-width">
							<span class="image-container">
								<img src="images/logo.png" alt="Logo">
							</span>
						</a>
						<a href="index.php" class="logo-text table-cell valign-middle">
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
										<a href="#" class="expand-action-menu">
											<i class="icon icon-burger-menu"></i>
											<span class="label">Menu</span>
										</a>
										<div class="expand-menu-container">
											<ul class="sub-menu main-menu primary-menu">
												<li><a href="index.php">Dashboard</a></li>
												<li class="has-menu">
													<a href="#">Samples</a>
													<ul class="sub-sub-menu">
														<li><a href="sample-archive.php">Archive</a></li>
														<li><a href="sample-forms.php">Forms</a></li>
														<li><a href="sample-icons.php">Icons</a></li>
														<li><a href="login.php">Login Page</a></li>
														<li><a href="sample-notification.php">Notification</a></li>
														<li class="has-menu">
															<a href="#">Others</a>
															<ul class="sub-sub-menu">
																<li><a href="sample-toogle-table.php">Toggle Table</a></li>
															</ul>
														</li>
														<li><a href="sample-page.php">Single Page</a></li>
													</ul>
												</li>
												<li class="has-menu">
													<a href="#">Documentation</a>
													<ul class="sub-sub-menu">
														<li><a href="getting-started.php">Getting Started</a></li>
														<li><a href="documentation-widgets.php">Widgets</a></li>
														<li><a href="documentation-forms.php">Forms</a></li>
														<li><a href="documentation-grids.php">Grid System</a></li>
														<li class="has-menu">
															<a href="#">Pre Content</a>
															<ul class="sub-sub-menu">
																<li><a href="documentation-agenda-navigation.php">Agenda Navigation</a></li>
																<li><a href="documentation-body-navigation.php">Body Navigation</a></li>
																<li><a href="documentation-breadcrumb.php">Breadcrumb</a></li>
																<li><a href="documentation-user-content.php">User Content</a></li>
															</ul>
														</li>
														<li class="has-menu">
															<a href="#">Contents</a>
															<ul class="sub-sub-menu">
																<li><a href="documentation-button.php">Button</a></li>
																<li><a href="documentation-table.php">Table</a></li>
																<li><a href="documentation-typography.php">Typography</a></li>
															</ul>
														</li>
														<li class="has-menu">
															<a href="#">Components</a>
															<ul class="sub-sub-menu">
																<li><a href="documentation-advanced-combobox.php">Advanced Combobox</a></li>
																<li><a href="documentation-accordion-toggle.php">Accordion &amp; Toggle</a></li>
																<li><a href="documentation-content-editor.php">Content Editor</a></li>
																<li><a href="documentation-form-loader.php">Form Loader</a></li>
																<li><a href="documentation-freeze-pane.php">Freeze Pane</a></li>
																<li><a href="documentation-fullcalendar.php">Fullcalendar</a></li>
																<li><a href="documentation-input-group.php">Input Group</a></li>
																<li><a href="documentation-legend.php">Legend</a></li>
																<li><a href="documentation-pagination.php">Pagination</a></li>
																<li><a href="documentation-popup.php">Popup</a></li>
																<li><a href="documentation-search-filter.php">Search Filter</a></li>
																<li><a href="documentation-tabulation.php">Tabulation</a></li>
																<li><a href="documentation-tooltip.php">Tooltip</a></li>
															</ul>
														</li>
													</ul>
												</li>
												<li>
													<a href="download-349584q13NX08pNHA8g8n6qh4i.php">Download Package</a>
												</li>
												<li class="has-menu">
													<a href="#">Sub Menu</a>
													<ul class="sub-sub-menu">
														<li class="has-menu">
															<a href="#">Level 2 Item</a>
															<ul class="sub-sub-menu">
																<li class="has-menu">
																	<a href="#">Level 3 Item</a>
																	<ul class="sub-sub-menu">
																		<li><a href="#">Level 4 Item</a></li>
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
										<a href="#" class="expand-action">
											<i class="icon icon-notification"></i>
											<span class="notif-count">999</span>
										</a>
										<ul class="sub-menu">
											<li class="sub-title">
												Notification
												<a href="#">Read All</a>
											</li>
											<li class="list-notification">
												<div class="notification">
													<span class="thumbnail">
														<img src="images/statics/avatar.png" alt="">
													</span>
													<span class="details">
														<span class="description">
															New Comment on <a href="#">Designing Web Interface</a>
														</span>
														<span class="date">28 Oktober 2014 | 11.00 pm</span>
													</span>
												</div>
												<div class="notification">
													<span class="thumbnail">
														<img src="images/statics/avatar.png" alt="">
													</span>
													<span class="details">
														<span class="description">
															New Comment on <a href="#">Designing Web Interface</a>
														</span>
														<span class="date">28 Oktober 2014 | 11.00 pm</span>
													</span>
												</div>
											</li>
											<li class="view-all">
												<a href="sample-notification.php">View All Notification</a>
											</li>
										</ul>
									</li>
									<li class="expand-settings expand-item has-child">
										<a href="#" class="expand-action">
											<span class="label">Rebecca Setiadi</span>
											<img src="images/statics/avatar.png" alt="">
										</a>
										<ul class="sub-menu">
											<li class="sub-title">Profile</li>
											<li class="setting-content">
												<div class="avatar"><img src="images/statics/avatar.png" alt=""></div>
												<div class="details">
													<span class="student-name">Rebecca Setiadi</span>
													<span class="email-address">rsetiadi@gmail.com</span>
													<span class="link">
														<a href="#">Dashboard</a>
													</span>
													<span class="link">
														<a href="#">Account Settings</a>
													</span>
												</div>
											</li>
											<li class="logout">
												<a href="logout.php">Log Out</a>
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
						<a href="#" class="icon icon-twitter"></a>
						<a href="#" class="icon icon-facebook"></a>
						<a href="#" class="icon icon-google-plus"></a>
						<a href="#" class="icon icon-youtube"></a>
						<a href="#" class="icon icon-linkedin"></a>
						<a href="#" class="icon icon-instagram"></a>
					</div>
				</div>
				<div class="item middle-direction has-padding-left bottom-direction">
					<div class="corporate-logo">
						<img src="images/logo.png" alt="Logo">
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
						<a href="#" class="button button-primary wide" id="show-form-feedback">Report Feedback &amp; Bug</a>
						<div class="feedback-popup">
							<a href="#" class="feedback-close" id="close-form-feedback"></a>
							<form action="#" method="post">
								<p>
									<input type="text" name="input[]" placeholder="Subject">
								</p>
								<p>
									<textarea name="input[]" rowspan="2" placeholder="Message"></textarea>
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
</body>
</html>
