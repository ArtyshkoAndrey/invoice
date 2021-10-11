<?php

namespace App\Http\Controllers\Spa;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade as PDF;

class SpaController
{
  public function index ()
  {
    return view('spa');
  }

  public function pdf ()
  {
    $invoice = Invoice::find(1);
    return PDF::loadView('pdf.invoice', compact('invoice'))->stream('testfile');
  }

  public function invoice (int $id) {
    $invoice = Invoice::find($id);
    return view('pdf.invoice', compact('invoice'));
  }
}
