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

    <form method="post" id="checkout" action="{{url()->current()}}">
        @csrf
        <input type="hidden" name="json" id="json">
    </form>


    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script type="text/javascript">

      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {

        window.snap.pay('{{$token}}', {
            send(result);
          onSuccess: function(result){
            alert("payment success!"); console.log(result);
          },
          onPending: function(result){
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            alert('you closed the popup without finishing the payment');

          }
        })
    });
    function send(result){
        document.getElementById('json').value = JSON.stringify(result);
        $('#checkout').submit();
    }
    </script>
</div>

@endsection
