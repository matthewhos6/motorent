@extends('layout.user.master')
@section('title','konfirmasi')
@section('addon_link')
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="SB-Mid-client-CpcaTeG-vOo1kH4C"></script>
@endsection
@section('content')

<div class="cont">
    <div class="p-3 rounded rounded-5 border border-5" style="background-color: #DBE2EF;width: 50%;margin: auto;">
        <p class="fs-3">Anda akan melakukan pembayaran sewa motor tipe <b>{{$tipe}}</b>  untuk <b>{{Session::get('hari')}} </b> hari , dengan total <b> {{Session::get('harga')}}</b></p>
        <button id="pay-button" class="btn btn-primary btn-lg">Pay!</button>
    </div>

    <form method="post" id="checkout" action="{{url()->current()}}">
        @csrf
        <input type="hidden" name="json" id="json">
    </form>


</div>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script type="text/javascript">

      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {

        window.snap.pay('{{$token}}', {
            onSuccess: function(result){
                alert("payment success!"); console.log(result);
            },
            onPending: function(result){
                alert("wating your payment!"); console.log(result);
                send(result);
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

@endsection
