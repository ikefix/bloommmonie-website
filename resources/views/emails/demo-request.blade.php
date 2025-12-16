@component('mail::message')
# Demo Request Received 🚀

Hello {{ $demo->name }},

Thank you for booking your **14 Days Free Demo** with **{{ config('app.name') }}**.

We have received your request and are **processing your demo setup**.  
You will receive another email once your demo is ready to use.

**Your Details:**  
- **Name:** {{ $demo->name }}  
- **Email:** {{ $demo->email }}  
@if($demo->phone)
- **Phone:** {{ $demo->phone }}  
@endif
@if($demo->note)
- **Note:** {{ $demo->note }}  
@endif

If you have any questions, feel free to contact our support team:

📞 **09000000000**  
✉️ **support@bloommonie.com**

@component('mail::button', ['url' => url('/')])
Visit Our Website
@endcomponent

Thanks,  
**{{ config('app.name') }} Team**
@endcomponent
