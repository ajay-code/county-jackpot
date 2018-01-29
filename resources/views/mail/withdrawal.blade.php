@component('mail::message')

@component('mail::panel')
<img src="http://www.thecountyjackpot.com/img/logo.png" alt="logo" style="display:block; margin:auto; width: 150px">
@endcomponent

# Balance Withdrawal Notification

You requested for the Withdrawal of £{{ $withDrawal->amount }} from your account balance.


You will get the money in your linked bank details within 4-5 business days. 


Thanks,<br>
{{ config('app.name') }}

@component('mail::button', ['url' => config('app.url')])
Visit Website
@endcomponent


@endcomponent
