<!doctype html>
<html>

<head>
	@include('frontend.layouts.inc_head')
</head>

<body>

	<div class="container-fluid footer_notop">

		@include('frontend.layouts.inc_menu')
        @php
        $total = '74.00';
        @endphp

@php
$datetime = date('YmdHis');
@endphp
        Union Pay
        <form method="post" action="{{url('responseUnionPay')}}">
            @csrf
            <script type="text/javascript" 
                src="{{$src}}"
                data-apikey="{{$key}}"
                data-amount="{{$total}}"
                data-currency="THB"
                data-payment-methods="unionpay"
                data-reference-order="{{$datetime}}"
                data-mid={{$mcc_mid}}
                data-show-button="false"
            >
            </script>
            <input type="hidden" name="amount" value="{{$total}}">
            <input type="hidden" name="paymentmethod" value="unionpay">
            <input type="hidden" name="product" value="Order eatfit">
            <input type="hidden" name="mid" value="{{$mcc_mid}}">
            <input type="hidden" name="reference_order" value="{{$datetime}}">
            <input type="button" value="CONFIRM ORDER / ชำระเงิน" class="btn_nextstep" onclick="KPayment.show();">
        </form>
{{--         
        QR Code
        <form method="POST" action="{{url('responseQRCode')}}">
            @csrf
            <script type="text/javascript"
                src="{{$src}}"
                data-apikey="{{$key}}"
                data-amount ="{{$total}}"
                data-payment-methods="qr"
                data-order-id="{{$order_id}}"
                data-show-button="false"
            ></script>
            <input type="button" value="CONFIRM ORDER / ชำระเงิน" class="btn_nextstep" onclick="KPayment.show();">
        </form>

        MCC
        <form method="post" action="{{url('responseMCC')}}">
            @csrf
            <script type="text/javascript" 
                src="{{$src}}"
                data-apikey="{{$key}}"
                data-amount="{{$total}}"
                data-currency="THB"
                data-payment-methods="card"
                data-mid={{$mcc_mid}}
                data-show-button="false"
            >
            </script>
            <input type="hidden" name="amount" value="{{$total}}">
            <input type="hidden" name="paymentmethod" value="card">
            <input type="hidden" name="product" value="Order eatfit">
            <input type="hidden" name="mid" value="{{$mcc_mid}}">
            <input type="button" value="CONFIRM ORDER / ชำระเงิน" class="btn_nextstep" onclick="KPayment.show();">
        </form>
--}}
				
		@include('frontend.layouts.inc_footer')
		@include('frontend.layouts.scriptjs')
	
	</div>

<script>	
	
</script>

</body>

</html>
