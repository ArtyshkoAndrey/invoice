<?php

namespace App\Http\Controllers\Spa;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SpaController
{
  public function index()
  {
    return view('spa');
  }

  public function pdf()
  {
    $invoice = Invoice::find(1);
//    return view('pdf.invoice', compact('invoice'));
    return PDF::loadView('pdf.invoice', compact('invoice'))->stream('testfile.pdf');
  }

  public function invoice(int $id)
  {
    try {
      $invoice = Invoice::findOrFail($id);
      return PDF::loadView('pdf.invoice', compact('invoice'))->stream(config('app.name') . ' - Invoice для пользователя ' . $invoice->user_name . '.pdf');
    } catch (ModelNotFoundException $e) {
      return redirect()->away('/');
    }

  }

  public function v2_invoice(int $id)
  {
    try {
      $invoice = Invoice::findOrFail($id);
      return PDF::loadView('pdf.invoice_2', compact('invoice'))->stream(config('app.name') . ' - Invoice для пользователя ' . $invoice->user_name . '.pdf');
    } catch (ModelNotFoundException $e) {
      return redirect()->away('/');
    }

  }
}
