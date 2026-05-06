@component('mail::message')
# Payment Successful 🎉

Hello {{ $user->name }},

Your payment for the **{{ $plan }} plan** was successful.

**Amount Paid:** ₦{{ number_format($amount / 100, 2) }}

We are currently **setting up your dashboard**.  
This process may take a short moment — please hold on.

If you feel unsafe or have questions, contact our customer care:

📞 **09000000000**

@component('mail::button', ['url' => url('/dashboard')])
Go to Dashboard
@endcomponent

Thanks,  
{{ config('app.name') }}
@endcomponent
