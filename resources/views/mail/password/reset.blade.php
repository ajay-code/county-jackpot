@component('mail::message')
# Hi {{ $user->name }},

The County Jackpot recently received a request for a forgotten password.

To change your password, please click on this [link]({{$actionUrl}}).

If you did not request this change, you do not need to do anything.

Thanks,<br>
{{ config('mail.text.footer_from') }}

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
If you’re having trouble clicking the "{{ $actionText }}" button, copy and paste the URL below
into your web browser: [{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent
@endisset
@endcomponent
