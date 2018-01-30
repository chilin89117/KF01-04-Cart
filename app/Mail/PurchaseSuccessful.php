<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PurchaseSuccessful extends Mailable
{
  use Queueable, SerializesModels;

  public function __construct()
  { }

  public function build()
  { return $this->view('emails.confirmPayment'); }
}
