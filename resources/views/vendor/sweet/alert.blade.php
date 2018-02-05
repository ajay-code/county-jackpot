@if (Session::has('sweet_alert.alert'))
    <script>
        swal({
            text: "{!! Session::get('sweet_alert.text') !!}",
            title: "{!! Session::get('sweet_alert.title') !!}",
            icon: "{!! Session::get('sweet_alert.type') !!}",
            @if (Session::get('sweet_alert.showConfirmButton'))
            buttons: {
                confirm: "{!! Session::get('sweet_alert.confirmButtonText') !!}",
            },
            @else
                buttons: false,
                timer: {!! Session::get('sweet_alert.timer') !!},
            @endif
        });
    </script>
@endif
