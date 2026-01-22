@component('mail::message')
# New Demo Booking 🚨

A new demo has just been booked.

---

**👤 Name:** {{ $demo->name }}  
**📧 Email:** {{ $demo->email }}

@if($demo->phone)
**📞 Phone:** {{ $demo->phone }}
@endif

@if($demo->note)
**📝 Note:**  
{{ $demo->note }}
@endif

---

@component('mail::button', ['url' => url('/admin/demo-requests')])
View Demo Requests
@endcomponent

Please follow up with this lead as soon as possible.

Thanks,  
**{{ config('app.name') }} System**
@endcomponent
