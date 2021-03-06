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

@if ($message = Session::get('blogdel'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Blog Deleted</strong>
</div>
@endif

@if ($message = Session::get('blogfail'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Blog not published. Kindly select tags</strong>
</div>
@endif

@if ($message = Session::get('addindus'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Added Successfully! </strong>
</div>
@endif

@if ($message = Session::get('addonupdate'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Updated Successfully! </strong>
</div>
@endif
@if ($message = Session::get('passwordsuccess'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Password Changed Successfully! </strong>
</div>
@endif

@if ($message = Session::get('passworderror'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>New Password cannot be same as your current password. Please choose a different password.</strong>
</div>
@endif

@if ($message = Session::get('adminpassworderror'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Your current password does not matches with the password you provided. Please try again.</strong>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    There's an error somewhere :(
</div>
@endif
