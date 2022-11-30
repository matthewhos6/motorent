@extends('layout.user.master')
@section('title','konfirmasi')
@section('addon_link')
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="SB-Mid-client-CpcaTeG-vOo1kH4C"></script>
@endsection
@section('content')

<div class="cont">
    //tambah diatas sini
    <button id="pay-button">Pay!</button>

    <form method="post" id="checkout">
        @csrf
        <input type="hidden" name="json" id="json">
    </form>



    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{$token}}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            alert("payment success!"); console.log(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
        function send(result){
            document.getElementById('json').value = JSON.stringify(result);
            $('#checkout').submit();
        }
      });
    </script>
</div>

@endsection
