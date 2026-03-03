<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReceiptMail extends Mailable
{
    use SerializesModels;

    public $receiptData;
    public $filePath;

    public function __construct($receiptData, $filePath)
    {
        $this->receiptData = $receiptData;
        $this->filePath = $filePath;
    }

    public function build()
    {
        return $this->view('emails.receipt') // Your email view
                    ->with('receiptData', $this->receiptData)
                    ->attach($this->filePath, [
                        'as' => 'receipt.pdf',
                        'mime' => 'application/pdf',
                    ]);
    }
}
