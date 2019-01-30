@component('mail::message')
@if($ticket->reopened > 0)
# RE: Reopened Ticket Notice!!!
@else
# New Ticket Notice!!
@endif


A ticket with reference number {{ strtoupper($ticket->ticket_code) }} under request category {{ $ticket->service->name }} has been opened by {{ $ticket->owner->name }} located at {{ $ticket->owner->profile->location->name }} room {{ $ticket->owner->profile->room_no }} for the following issue:

* "{{ $ticket->issue }}"

## Details

"{{ $ticket->complain }}"

@component('mail::panel')
** Note **

The priority level of this request is {{ $ticket->priority }} and as such should be attended to with immidiate effect.
@endcomponent


Best Regards,<br>
{{ config('app.name') }}
@endcomponent
