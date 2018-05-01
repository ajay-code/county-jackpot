

@component('mail::message')
@component('mail::panel')
<img src="http://www.thecountyjackpot.com/img/logo.png" alt="logo" style="display:block; margin:auto; width: 150px">
@endcomponent
# Introduction

The body of your message.

@component('mail::button', ['url' => $url])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
