<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from spark.bootlab.io/dashboard-e-commerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Apr 2021 05:22:18 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">

	<title>xpressfixing.com</title>

	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.foundation.min.css"> -->
	<link rel="stylesheet" href="/assets/css/foundation.min.css">
	<link rel="stylesheet" href="/assets/css/datatable.foundation.min.css">
	<!-- PICK ONE OF THE STYLES BELOW -->
	<link href="/assets/css/modern.css" rel="stylesheet">
	<!-- <link href="css/classic.css" rel="stylesheet"> -->
	<!-- <link href="css/dark.css" rel="stylesheet"> -->
	<!-- <link href="css/light.css" rel="stylesheet"> -->

	<!-- BEGIN SETTINGS -->
	<!-- You can remove this after picking a style -->
	<style>
		body {
			opacity: 0;
		}
	</style>
	<script src="/assets/js/settings.js"></script>
	<!-- END SETTINGS -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120946860-7');
</script></head>

<body>
	<div class="splash active">
		<div class="splash-icon"></div>
	</div>

	<div class="wrapper">
		
		@yield('sidebar')

		<div class="main">
			
			@yield('navbar')

			<main class="content">
            

                @yield('main')


            </main>
			<footer class="footer" style="margin-top: 80px;">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-8 text-left">
							<!-- <ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms of Service</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Contact</a>
								</li>
							</ul> -->
						</div>
						<div class="col-4 text-right">
							<p class="mb-0">
								&copy; {{date('Y')}} - <a href="http://xpressfixing.com" class="text-muted">Xpressfixing</a>
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>

	</div>

	<svg width="0" height="0" style="position:absolute">
		<defs>
			<symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong">
				<path
					d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
				</path>
			</symbol>
		</defs>
	</svg>
	<script src="/assets/js/app.js"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.5/js/dataTables.foundation.min.js"></script> -->

	<script src="/assets/js/jquery-3.5.1.js"></script>
	<script src="/assets/js/jquery.datatables.min.js"></script>
	<script src="/assets/js/datatables.foundation.min.js"></script>
	<script>
		$(function() {
			$('#datatables-dashboard-products').DataTable({
				pageLength: 6,
				lengthChange: false,
				bFilter: false,
				autoWidth: false
			});
		});
	</script>

	<script>
		$(function() {
			// Datatables basic
			$('#datatables-basic').DataTable({
				responsive: true
			});
			// Datatables with Buttons
			var datatablesButtons = $('#datatables-buttons').DataTable({
				lengthChange: !1,
				buttons: ["copy", "print"],
				responsive: true
			});
			datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")
		});
	</script>

	<script>
			$(function() {
				// Datatables clients
				$("#datatables-clients").DataTable({
					responsive: true,
					order: [
						[1, "asc"]
					]
				});
			});
		</script>

</body>


<!-- Mirrored from spark.bootlab.io/dashboard-e-commerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Apr 2021 05:22:18 GMT -->
</html>