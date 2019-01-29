@component('mail::message')
# Welcome {{ $user->name }}

Congratulations!!! you have been successfully registered on the ICT Help Desk Portal. You can use the portal to raise tickets on issues you encounter using ICT work tools.

### Details

Username: {{ $user->email }}
Password: Password1

@component('mail::button', ['url' => 'http://172.30.35.6/dashboard'])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
