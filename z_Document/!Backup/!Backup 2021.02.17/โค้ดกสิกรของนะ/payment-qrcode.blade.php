@extends('frontend-layouts.components')

@section('contents-boby')
<section class="container wrap_content wrap_searchresult">
	<div class="row">
		<div class="col wrap_allthx wrap_forgot">
			<div class="title_thx">Payment</div>
			<div class="title_topic text-center">Accepted Here</div>
			<div class="wrap_register wrap_forgotpassword text-center">
				@php
					$apikey = "";
					if ($sLocale == "en") {
						$apikey = "";
					} else {
						$apikey = "";
					}
				@endphp
			   <div>
				<form action="{{ url($sLocale.'/thankyou') }}" method="post">
					@csrf
					<script type="text/javascript"
						src="https://kpaymentgateway.kasikornbank.com/ui/v2/kpayment.min.js"
						data-apikey="{{ $apikey }}"
						data-amount="{{ $amount }}"
						data-currency="THB"
						data-payment-methods="{{ $source_type }}"
						data-name="PAÑPURI"
						data-order-id={{ $order_id }}
						data-show-button="false">
					</script>
					<button type="button" class="btn_blackdefault" onclick="KPayment.show()">scan here to pay</button>
				</form>
			   </div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('scripts-js')
<script>
	var merchantFunction = function(){ // Add notify action.
		console.log("Close popup!");
	};
	KPayment.onClose(merchantFunction);
</script>
@endsection