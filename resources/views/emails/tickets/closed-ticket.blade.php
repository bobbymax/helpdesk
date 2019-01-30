@component('mail::message')
# Ticket Closed!!

The ticket with code {{ strtoupper($ticket->ticket_code) }} has been marked as closed by {{ $ticket->owner->name }}.

Thank you for using the HelpDesk Portal.


Best Regards,<br>
{{ config('app.name') }}
@endcomponent
