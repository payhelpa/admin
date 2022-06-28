@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>THIS USER HAS BEEN VERIFIED!!! </strong>
</div>
@endif

<!--@if(Session::has('success'))
<p class="alert alert-success alert-block {{ Session::get('success') }}">{{ Session::get('success') }}</p>
@endif
-->
@if ($message = Session::get('warning'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>ACCOUNT NUMBER NOT GENERATED. PLEASE TRY AGAIN  </strong>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>MESSAGE SENT! </strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>SERVICE ADDED! </strong>
</div>
@endif

@if ($message = Session::get('blogsuccess'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Blog Published Successfully! </strong>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Check the following errors :(
</div>
@endif
