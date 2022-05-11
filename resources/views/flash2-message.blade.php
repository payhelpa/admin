@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>MESSAGE SENT! </strong>
</div>
@endif


<body>
    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <img src ="https://www.switfx.com/assets/images/payhelpa-03.png" alt=""></img>
                <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    {{ $header ?? '' }}
                    <!-- Email Body -->
                <tr>
    <td align="center" class="body" width="100%" cellpadding="0" cellspacing="0"><img src ="https://www.switfx.com/assets/img/Wavy_Single.png" alt=" "></img

<table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
<!-- Body content -->
<tr>
<td class="content-cell">
{{ Illuminate\Mail\Markdown::parse($slot) }}

{{ $subcopy ?? '' }}
</td>
</tr>
</table>
</td>
</tr>

{{ $footer ?? '' }}
<p>If you have any questions, please don’t hesitate to contact us info@payhelpa.com</p>
</table>
</td>
</tr>
</table>
</body>
