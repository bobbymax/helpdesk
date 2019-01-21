@component('mail::message')
# Welcome {{ $user->name }}

Congratulations!!! you have been successfully registered on the ICT Help Desk Portal. You can use the portal to raise tickets on issues you encounter using ICT work tools.

@component('mail::button', ['url' => 'https://helpdesk.app/dashboard'])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
