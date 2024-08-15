<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Student;



class StudentAdded extends Mailable
{
    use Queueable, SerializesModels;



    public $student;



    public function __construct($student)
    {
        $this->student = $student;
    }
    

    public function build()
    {
        return $this->subject('Welcome to the System')
                    ->view('mail.student-added')
                    ->with(['student' => $this->student]);
    }
    
    /**
     * Create a new message instance.
     */
  /*   public function __construct()
    {
        //
    } */

    /**
     * Get the message envelope.
     */
   /*  public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Student Added',
        );
    }
 */
    /**
     * Get the message content definition.
     */
    /* public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    } */

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
