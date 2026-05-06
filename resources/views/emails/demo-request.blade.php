@component('mail::message')
# Demo Request Received 🚀

Hello {{ $demo->name }},

Thank you for booking your **14 Days Free Demo**.

We are processing your demo request and will notify you once it's ready.

@if($demo->phone)
**Phone:** {{ $demo->phone }}
@endif

@if($demo->note)
**Note:** {{ $demo->note }}
@endif

@component('mail::button', ['url' => url('/')])
Visit Website
@endcomponent

Thanks,<br>
**{{ config('app.name') }} Team**
@endcomponent
