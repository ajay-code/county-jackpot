@component('mail::message')

# Congratulations {{ $user->name }}!

Get the party started because you have just won this week’s {{ $lottery->name }} jackpot. Well done.

Please allow up to 48 hours for us to approve your prize before it appears in the Balance section on your County Jackpot account. From here you will be able to withdraw all winnings to a bank account of your choice.

In the meantime, if you wish to see information regarding the results please visit the Draw Results page on the County Jackpot Website.

Thanks for playing and we hope you enjoy your prize,
The County Jackpot Team

Thanks,<br>
{{ config('mail.text.footer_from') }}

@endcomponent
