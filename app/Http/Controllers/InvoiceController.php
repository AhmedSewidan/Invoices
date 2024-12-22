<?php 

namespace App\Http\Controllers;

use App\Http\Resources\InvoiceResource;
use App\Http\Resources\ShowInvoiceResource;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;

class InvoiceController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index( )
  {
    $invoices = Invoice::all();
    
    $this->invoiceLoop($invoices);

    // return $invoices;
    return view('dashboards.tables.invoices', compact('invoices'));
      
  }

  
  public function invoicesStatus($status)
  {
    
    $invoices = Invoice::where('status', $status)->get();

    $this->invoiceLoop($invoices);
    // return $invoices;

    return view('dashboards.tables.invoices-status', compact('invoices'));
  }

  public function invoiceLoop( $invoices ){
    
    foreach ( $invoices as $invoice ) {
      
      $discount        = $invoice->discount;
      $tax             = $invoice->tax;
      $amountBefore    = $invoice->amount;
      $invoice->status = $invoice->status;  
      if( $discount && $tax ){

        if( $discount > $tax ){

          $discount                = $discount - $tax;
          $amount_after            = $amountBefore - ( $amountBefore * $discount );
        }elseif( $tax > $discount ){

          $tax                     = $tax - $discount;
          $amount_after            = $amountBefore + ( $amountBefore * $discount );

        }

      }elseif( $discount ){
        
        $amount_after            = $amountBefore - ( $amountBefore * $discount );

      }elseif( $tax ){
        
        $amount_after            = $amountBefore + ( $amountBefore * $discount );

      }
      
      $invoice['amount_after'] = strval(round( $amount_after, 2 ));

      $invoice->tax      = strval(round(($invoice->tax * 100), 2));
      $invoice->discount = strval(round(($invoice->discount * 100), 2));
    }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  
   public function show( string $invoice_num)
   {
     $invoice = Invoice::where('invoice_number', $invoice_num)->first();
     $user    = $invoice->user;
     $invoice = new ShowInvoiceResource( $invoice );

     return view('dashboards.invoice-details', compact('invoice', 'user'));
   }

  // public function show($id)
  // {
  //   $invoice = Invoice::where('id', $id)->first();
  //   $user    = Invoice::find($id)->user;

    
  //   $invoice->tax      = strval(round(  $invoice->tax * 100, 2));
  //   $invoice->discount = strval(round(  $invoice->discount * 100, 2));

  //   // return $invoice;
  //   return view('dashboards.invoice-details', compact('invoice', 'user'));
  // }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
    Invoice::where('id', $id)->delete();
    return redirect()->back();
  }
  
}

?>