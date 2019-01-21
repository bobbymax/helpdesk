<?php

namespace HelpDesk\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use HelpDesk\Ticket;

class NewTicket extends Mailable
{
    use Queueable, SerializesModels;
    public $ticket;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('A New ticket has been Created!')->markdown('emails.tickets.new-ticket');
    }
}
