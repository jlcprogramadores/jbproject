<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComprobanteMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $comprobante;
    public $monto_a_pagar;
    public $nombreProveedor;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
        $this->comprobante = $mailData['comprobante'];
        $this->monto_a_pagar = $mailData['monto_a_pagar'];
        $this->nombreProveedor = $mailData['nombreProveedor'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        return $this->view('finanza.enviarCorreo')->subject('Comprobante de Pago Mtto JB Industrial');
    }
}
