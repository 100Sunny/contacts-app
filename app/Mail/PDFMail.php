<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Contact; 

class PDFMail extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        $contacts = Contact::all(); 

        $pdf = Pdf::loadView('pdf.contacts_list_pdf', compact('contacts'));

        return $this->subject('Reporte de Contactos Registrados')
                    ->view('emails.list_report_email') 
                    ->attachData($pdf->output(), "lista_de_contactos.pdf", [
                        'mime' => 'application/pdf',
                    ]);
    }
}