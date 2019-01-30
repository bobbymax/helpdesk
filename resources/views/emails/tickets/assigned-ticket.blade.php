@component('mail::message')
# Ticket Assigned!!!

The ticket with code {{ strtoupper($ticket->ticket_code) }} has been assigned to {{ $ticket->assigned_to }}. {{ $ticket->assigned_to }} is to go to Room {{ $ticket->owner->profile->room_no }} at {{ $ticket->owner->profile->location->name }} to resolve the issue opened by {{ $ticket->owner->name }}. A report should be submitted on the helpdesk portal after resolution.

### Details

Issue: {{ $ticket->issue }}
Description: {{ $ticket->complain }}


Best Regards,<br>
{{ config('app.name') }}
@endcomponent
