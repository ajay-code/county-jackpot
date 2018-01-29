@component('mail::message')

@component('mail::panel')
<img src="http://www.thecountyjackpot.com/img/logo.png" alt="logo" style="display:block; margin:auto; width: 150px">
@endcomponent

# You Prize money Approved

You Prize money for the draw <b>{{ $countyDraw->name }}</b> that you won on {{ $countyDraw->expire_at->format('jS F, Y') }}
has been approved. 

Check Your Profile to get More Info

Thanks,<br>
{{ config('app.name') }}

@component('mail::button', ['url' => config('app.url').'/balance'])
Check Balance
@endcomponent


@endcomponent
