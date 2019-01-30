@component('mail::message')
# Ticket Report Generated!!

A report has just been generated for the ticket with code {{ strtoupper($report->ticket->ticket_code) }} and issue **"{{ $report->ticket->issue }}"**. It has been marked has resolved and if you are happy with the resolution, kindly login to your account and close this ticket for documentation.

@component('mail::button', ['url' => 'http://172.30.35.6/dashboard'])
Login Here
@endcomponent

Best Regards,<br>
{{ config('app.name') }}
@endcomponent
