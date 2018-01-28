@component('mail::message')

@component('mail::panel')
<img src="http://www.thecountyjackpot.com/img/logo.png" alt="logo" style="display:block; margin:auto; width: 150px">
@endcomponent

# You have successfully Entered The Draw {{ $draw->lottery->name }}

@component('mail::table', ['url' => config('app.url')])
|                       |                                                          |
| ----------------------|--------------------------------------------------------: |
| Draw Number           |       {{ $draw->draw_number }}                           |
| Entery Fee            |       £{{ $draw->lottery->entryInPound() }}              |
| Prize                 |       £{{ $draw->lottery->prize }}                       |
| Result On             |       {{ $draw->lottery->expire_at->format('jS F, Y') }} |
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@component('mail::button', ['url' => config('app.url')])
Visit Website
@endcomponent


@endcomponent
