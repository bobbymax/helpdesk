@component('mail::message')
# New Ticket Notice!!

A ticket with reference number {{ $ticket->ticket_code }} under request category {{ $ticket->service->name }} has been opened by {{ $ticket->owner->name }} located at {{ $ticket->owner->profile->location->name }} room {{ $ticket->owner->profile->room_no }} for the following issue:

* "{{ $ticket->issue }}"

The priority level of this request is {{ $ticket->priority }} and as such should be attended to with immidiate effect.


Best Regards,<br>
{{ config('app.name') }}
@endcomponent
