@component('mail::message')

{{ $user->name }}, we have some exciting news.

Your prize for the {{ $countyDraw->expire_at->format('jS F, Y') }} {{ $countyDraw->name }} draw has been approved.

For more information or to withdraw your winnings please click on this [link]({{ config('app.url').'/balance' }}).

Thanks,<br>
{{ config('app.name') }}

@endcomponent
