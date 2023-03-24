<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Address;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\DeliveryOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class InvoiceController extends Controller
{
    public function index()
    {
        $allInvoice = Invoice::where('deleted_at',null)->get();
        return view('invoicePage',['allInvoice' => $allInvoice]);
    }

    public function create()
    {
        $allService = Service::where('service_type','<>',9)->get();
        $allAddress = Address::all();
        return view('createInvoice',['allService' => $allService, 'allAddress' => $allAddress]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'invoice_subject' => 'required',
            'due_date' => 'required',
            'recipient_id' => 'required',
            'sender_id' => 'required',
            'item.*' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $newInvoice = new Invoice();
            $newInvoice->invoice_subject = $request->invoice_subject;
            $newInvoice->invoice_expiry = $request->due_date;
            $newInvoice->invoice_status = 1;
            $newInvoice->save();
            
            $total = 0;
            foreach ($request->item as $val) {
                $value = explode(';',$val);
                $newInvoiceItem = new InvoiceItem();
                $newInvoiceItem->invoice_id = $newInvoice->invoice_id;
                $newInvoiceItem->service_id = $value[0];
                $newInvoiceItem->invoice_item_qty = $value[1];
                $newInvoiceItem->invoice_item_amount = $value[2];
                $newInvoiceItem->save();

                $total += $value[2];
            }

            // item pajak
            $itemPajak = Service::where('service_code','T01')->first();
            $newInvoiceItem = new InvoiceItem();
            $newInvoiceItem->invoice_id = $newInvoice->invoice_id;
            $newInvoiceItem->service_id = $itemPajak->service_id;
            $newInvoiceItem->invoice_item_qty = 0;
            $newInvoiceItem->invoice_item_amount = $total;
            $newInvoiceItem->save();

            $newDeliveryOrder = new DeliveryOrder();
            $newDeliveryOrder->invoice_id = $newInvoice->invoice_id;
            $newDeliveryOrder->address_sender = $request->sender_id;
            $newDeliveryOrder->address_destination = $request->recipient_id;
            $newDeliveryOrder->save();

            DB::commit();
            return redirect('/');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        $getInvoice = Invoice::where('invoice_id',$id)->first();
        if(!isset($getInvoice)) {
            return back();
        }

        $getInvoice->deleted_at = date('Y-m-d H:i:s');
        $getInvoice->save();
        return redirect('/');
    }

    public function allInvoiceApi()
    {
        $data = Invoice::where('deleted_at',null)->get();
        $allInvoice = [];

        try {
            foreach ($data as $key => $invoice) {
                $item = [];
                foreach($invoice->hasItem as $invitem) {
                    $item[] = [
                        'item_type' => $invitem->getService->service_type,
                        'description'=> $invitem->getService->service_name,
                        'quantity' => $invitem->invoice_item_qty,
                        'unit_price'=> $invitem->getService->service_price,
                        'amount' => $invitem->invoice_item_amount
                    ];
                }
    
                $allInvoice[] = [
                    'invoice_id' => $invoice->invoice_id, 
                    'issue date' => $invoice->created_at,
                    'due_date' => $invoice->invoice_expiry,
                    'subject' => $invoice->invoice_subject,
                    'sender' => $invoice->hasDelivery->hasSender->address_recipient_name,
                    'sender_location' => $invoice->hasDelivery->hasSender->address_location,
                    'recipient' => $invoice->hasDelivery->hasRecipient->address_recipient_name,
                    'recipient_location' => $invoice->hasDelivery->hasRecipient->address_location,
                    'item' => $item
                ];
            }

            return response(['data' => $allInvoice, 'message' => 'success'],200);
        } catch (\Throwable $th) {
            return response(['data' => [], 'message' => $th->getMessage()],404);
        }        
    }

    public function findInvoiceApi($id)
    {
        $invoiceData = Invoice::where('invoice_id',$id)->first();
        if(!isset($invoiceData)) {
            return response(['data' => [], 'message' => 'data not found'],404);
        }

        try {
            $item = [];
            foreach($invoiceData->hasItem as $invitem) {
                $item[] = [
                    'item_type' => $invitem->getService->service_type,
                    'description'=> $invitem->getService->service_name,
                    'quantity' => $invitem->invoice_item_qty,
                    'unit_price'=> $invitem->getService->service_price,
                    'amount' => $invitem->invoice_item_amount
                ];
            }

            $allInvoice = [
                'invoice_id' => $invoiceData->invoice_id, 
                'issue date' => $invoiceData->created_at,
                'due_date' => $invoiceData->invoice_expiry,
                'subject' => $invoiceData->invoice_subject,
                'sender' => $invoiceData->hasDelivery->hasSender->address_recipient_name,
                'sender_location' => $invoiceData->hasDelivery->hasSender->address_location,
                'recipient' => $invoiceData->hasDelivery->hasRecipient->address_recipient_name,
                'recipient_location' => $invoiceData->hasDelivery->hasRecipient->address_location,
                'item' => $item
            ];

            return response(['data' => $allInvoice, 'message' => 'success'],200);
        } catch (\Throwable $th) {
            return response(['data' => [], 'message' => $th->getMessage()],404);
        }
    }
}
