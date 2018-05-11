@component('mail::message')

# You have successfully Entered The Draw {{ $draw->lottery->name }}.
Results will be declared after the draw ends at 11:59pm GMT this {{ $draw->lottery->expire_at->format('l') }}.

@component('mail::table', ['url' => config('app.url')])
|                       |                                                          |
| ----------------------|--------------------------------------------------------: |
| Draw Number           |       {{ $draw->draw_number }}                           |
| Entery Fee            |       £{{ $draw->lottery->entryInPound() }}              |
| Prize                 |       £{{ $draw->lottery->prize }}                       |
| Result On             |       {{ $draw->lottery->expire_at->format('jS F, Y') }} |
@endcomponent

Thanks,<br>
{{ config('mail.text.footer_from') }}

@component('mail::button', ['url' => config('app.url')])
Visit Website
@endcomponent


@endcomponent
