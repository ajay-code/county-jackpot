@component('mail::message')

@component('mail::panel')
<img src="http://www.thecountyjackpot.com/img/logo.png" alt="logo" style="display:block; margin:auto; width: 150px">
@endcomponent

# Result of The Draw {{ $lottery->name }} declared just now


This Email is to inform you that the Result of the draw {{ $lottery->name }} has been declared today, Go to our website to check if you have
won the draw.

Thanks,<br>
{{ config('app.name') }}

@component('mail::button', ['url' => config('app.url')])
Visit Website
@endcomponent


@endcomponent
