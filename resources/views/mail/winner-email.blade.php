@component('mail::message')

@component('mail::panel')
<img src="http://www.thecountyjackpot.com/img/logo.png" alt="logo" style="display:block; margin:auto; width: 150px">
@endcomponent

# You have won the draw {{ $lottery->name }}

Congratulations {{ $user->name }}, the results of draw {{ $lottery->name }} were declared today and you have won the draw.

You will recieve the Prize money in your profile balance within 1-2 days. For more info visit our website or results page

Thanks,<br>
{{ config('app.name') }}

@component('mail::button', ['url' => config('app.url')])
Visit Website
@endcomponent


@endcomponent
