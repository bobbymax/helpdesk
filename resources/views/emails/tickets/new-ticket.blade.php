@component('mail::message')
# New Ticket Notice!!

A ticket with code {{ $ticket->ticket_code }} and issue "{{ $ticket->issue }}" under request category {{ $ticket->service->name }} has been created by {{ $ticket->owner->name }} located at {{ $ticket->owner->profile->location->name }} room {{ $ticket->owner->profile->room_no }}.

The priority level of this request is {{ $ticket->priority }} and as such should be attended to with immidiate effect.


Best Regards,<br>
{{ config('app.name') }}
@endcomponent
