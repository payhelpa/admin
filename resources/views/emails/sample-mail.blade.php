
@component('mail::message')

<h3>{!! $content['details'] !!}</h3><br>
@component('mail::button', ['url' => 'payhelpa.com'])
Login
@endcomponent
Team
{{ config('app.name') }}
@endcomponent
