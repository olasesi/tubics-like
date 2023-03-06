@component('mail::message')
Hey there,

Here's your verification code for {{ config('app.name') }} onboarding process:

<h1>{{$email_data['verification_code']}}</h1>



You can also click the button below to automatically verify and continue with the onboarding process.

@component('mail::button', ['url' => route('user.verified', ['token' => $email_data['token']])])
Activate account
@endcomponent



You can also copy/paste this url in your browser address bar: <a href="{{route('user.verified', ['token' => $email_data['token']])}}">{{route('user.verified', ['token' => $email_data['token']])}}</a>
If you didn't initiate this action, don't worry, just ignore this email!


Thanks,<br>
{{ config('app.name') }}
@endcomponent
