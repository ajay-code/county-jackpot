@component('mail::message')

# Balance Withdrawal Notification

Hooray, your winnings are on their way to your bank. <br>
Please allow up to 14 working days for winnings to appear in your account.

If you did not request this withdrawal please contact our customer care team.
<a href="mailto:customercare@thecountyjackpot.com">customercare@thecountyjackpot.com</a>

Thanks,<br>
{{ config('mail.text.footer_from') }}

@endcomponent
