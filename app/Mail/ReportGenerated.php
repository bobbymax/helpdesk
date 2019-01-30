<?php

namespace HelpDesk\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use HelpDesk\Report;

class ReportGenerated extends Mailable
{
    use Queueable, SerializesModels;
    public $report;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Report Generated for Ticket!!')->markdown('emails.tickets.report-generated');
    }
}
