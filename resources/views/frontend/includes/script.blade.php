		<!-- Vendor -->
		<script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/jquery.appear/jquery.appear.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/jquery.cookie/jquery.cookie.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/popper/umd/popper.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/common/common.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/jquery.validation/jquery.validate.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/jquery.gmap/jquery.gmap.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/jquery.lazyload/jquery.lazyload.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/isotope/jquery.isotope.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/vide/jquery.vide.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/vivus/vivus.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/bootstrap-star-rating/js/star-rating.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js')}}"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="{{asset('frontend/js/theme.js')}}"></script>

		<!-- Current Page Vendor and Views -->
		<script src="{{asset('frontend/js/views/view.shop.js')}}"></script>

		<!-- Theme Custom -->
		<script src="{{asset('frontend/js/custom.js')}}"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{asset('frontend/js/theme.init.js')}}"></script>

		<!-- TOASTR JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- TOASTR JS calling -->
<script type="text/javascript">
		
  toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": false,
  "positionClass": "toast-bottom-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>

<script type="text/javascript">
	@if (Session::has('message'))
	 var type = "{{Session::get('alert-type','info') }}";
	 switch(type){
		case 'info':
			toastr.info("{{Session::get('message') }}");
			break;
		case'success':
			toastr.success("{{Session::get('message') }}");
			break;
		case 'warning':
			toastr.warning("{{Session::get('message') }}");
			break;
		case 'error':
			toastr.error("{{Session::get('message') }}");
			break;
	 }
	@endif
</script>


<!-- ssl -->
<script>
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
