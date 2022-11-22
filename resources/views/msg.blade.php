@if (Session::has('suc'))
<p style="color: green;">{{Session::get('suc')}}</p>
@elseif (Session::has('err'))
<p style="color: red;">{{Session::get('err')}}</p>
@endif
