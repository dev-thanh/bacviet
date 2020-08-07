<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="{{ $site_info->favicon }}">
	@if (isset($site_info->index_google))
		<meta name="robots" content="{{ $site_info->index_google == 1 ? 'index, follow' : 'noindex, nofollow' }}">
	@else
		<meta name="robots" content="noindex, nofollow">
	@endif
	{!! SEO::generate() !!}
	<meta name='revisit-after' content='1 days' />
	<meta name="copyright" content="GCO" />
	<meta http-equiv="content-language" content="vi" />
	<meta name="geo.region" content="VN" />
    <meta name="geo.position" content="10.764338, 106.69208" />
    <meta name="geo.placename" content="Hà Nội" />
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
 	<meta name="_token" content="{{csrf_token()}}" />
 	<link rel="canonical" href="{{ \Request::fullUrl() }}">


 	<!--link css-->
    <!-- <link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/slick.min.css">

    <link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/slick-theme.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" />

    <link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/jquery.mmenu.all.css"> 

	<link rel="stylesheet" type="text/css" href="{{ __BASE_URL__ }}/plugin/jquery.toast.min.css">

    <link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/style.css">

    <link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/custom.css">

    <link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/responsive.css"> -->

    <script type="text/javascript" src="{{ __BASE_URL__ }}/js/jquery.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="{{ __BASE_URL__ }}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ __BASE_URL__ }}/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="{{ __BASE_URL__ }}/css/slick-theme.min.css">
    <link rel="stylesheet" type="text/css" href="{{ __BASE_URL__ }}/css/jquery.mmenu.all.css">
    <link rel="stylesheet" type="text/css" href="{{ __BASE_URL__ }}/css/styles.css">
    <link rel="stylesheet" type="text/css" href="{{ __BASE_URL__ }}/css/responsive.css">
 	

 	@if (!empty($site_info->google_analytics))
 		{!! $site_info->google_analytics !!}
 	@endif

 	<style>
 		.cslder {
		    display: block;
		    text-align: center;
		    height: 20px;
		    position: relative;
		    display: none;
		    clear: both
		}

		.cslder .cswrap {
		    position: absolute;
		    top: 50%;
		    left: 50%;
		    -webkit-transform: translate(-50%,-50%);
		    transform: translate(-50%,-50%)
		}

		.csdot {
		    width: 5px;
		    height: 5px;
		    border: 1px solid #00a850;
		    background: #00a850;
		    border-radius: 50%;
		    float: left;
		    margin: 0 2px;
		    -webkit-transform: scale(0);
		    transform: scale(0);
		    -webkit-animation: fx 1000ms ease infinite 0ms;
		    animation: fx 1000ms ease infinite 0ms
		}

		.csdot:nth-child(2) {
		    -webkit-animation: fx 1000ms ease infinite 300ms;
		    animation: fx 1000ms ease infinite 300ms
		}

		.csdot:nth-child(3) {
		    -webkit-animation: fx 1000ms ease infinite 600ms;
		    animation: fx 1000ms ease infinite 600ms
		}

		.csslder {
		    display: block;
		    text-align: center;
		    height: 20px;
		    position: relative;
		    clear: both
		}

		.csslder .csswrap {
		    position: absolute;
		    top: 50%;
		    left: 50%;
		    -webkit-transform: translate(-50%,-50%);
		    transform: translate(-50%,-50%)
		}

		.cssdot {
		    width: 10px;
		    height: 10px;
		    border: 1px solid #00a850;
		    background: #00a850;
		    border-radius: 50%;
		    float: left;
		    margin: 0 5px;
		    -webkit-transform: scale(0);
		    transform: scale(0);
		    -webkit-animation: fx 1000ms ease infinite 0ms;
		    animation: fx 1000ms ease infinite 0ms
		}

		.cssdot:nth-child(2) {
		    -webkit-animation: fx 1000ms ease infinite 300ms;
		    animation: fx 1000ms ease infinite 300ms
		}

		.cssdot:nth-child(3) {
		    -webkit-animation: fx 1000ms ease infinite 600ms;
		    animation: fx 1000ms ease infinite 600ms
		}
		.loadingcover {
		    position: fixed;
		    top: 0;
		    left: 0;
		    right: 0;
		    bottom: 0;
		    background-color: rgba(255,255,255,.75);
		    z-index: 100;
		}

		.loadingcover .csslder {
		    top: 50%
		}

		@-webkit-keyframes fx {
		    50% {
		        -webkit-transform: scale(1);
		        transform: scale(1);
		        opacity: 1
		    }

		    100% {
		        opacity: 0
		    }
		}

		@keyframes fx {
		    50% {
		        -webkit-transform: scale(1);
		        transform: scale(1);
		        opacity: 1
		    }

		    100% {
		        opacity: 0
		    }
		}
 	</style>

</head> 
	<body>

		<div class="loadingcover" style="display: none;">
		    <p class="csslder">
		        <span class="csswrap">
		            <span class="cssdot"></span>
		            <span class="cssdot"></span>
		            <span class="cssdot"></span>
		        </span>
		    </p>
		</div>

		@include('frontend.teamplate.header_test')
			<main>
				@yield('main')
			</main>

		@include('frontend.teamplate.footer_test')


		

		<!--Link js-->
		<script type="text/javascript" src="{{ __BASE_URL__ }}/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="{{ __BASE_URL__ }}/js/jquery.mmenu.all.js"></script>
		<script type="text/javascript" src="{{ __BASE_URL__ }}/js/slick.min.js"></script>
		<script type="text/javascript" src="{{ __BASE_URL__ }}/js/private.js"></script>
		
		<!-- <script type="text/javascript" src="{{ __BASE_URL__ }}/js/bootstrap.min.js"></script>

		<script type="text/javascript" src="{{ __BASE_URL__ }}/js/slick.min.js"></script>

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>

		<script type="text/javascript" src="{{ __BASE_URL__ }}/js/jquery.mmenu.all.js"></script>

		<script type="text/javascript" src="{{ __BASE_URL__ }}/plugin/jquery.toast.min.js"></script>

		{{-- <script type="text/javascript" src="{{ __BASE_URL__ }}/js/private.js"></script> --}} -->

		<!-- <script type="text/javascript" src="{{ asset('public/frontend/js/private.js') }}"></script> -->

		@yield('script')
		@if (!empty($site_info->script))
			{!! $site_info->script !!}
		@endif

		@if (Session::has('toastr'))
			<script>
				jQuery(document).ready(function($) {
					showToast('{{ Session::get('toastr') }}', 'Thông báo');
				});
			</script>
		@endif
	
	</body>
</html>