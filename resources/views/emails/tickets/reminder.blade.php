@component('mail::message')
# Unresolved Ticket Reminder!!!

This is to remind you that {{ $ticket->owner->name }} has an issue logged in that is yet to be attended to. These are the details as earlier sent:

@component('mail::panel')
### Details:
* Location: {{ $ticket->owner->profile->location->name }}
* Room No.: {{ $ticket->owner->profile->room_no }}
* Issue: {{ $ticket->issue }}
* Description: {{ $ticket->complain }}
* Priority: {{ ucfirst($ticket->priority) }}
@endcomponent

Best Regards,<br>
{{ config('app.name') }}
@endcomponent
