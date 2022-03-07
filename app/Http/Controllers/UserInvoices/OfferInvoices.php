<?php
namespace App\Http\Controllers\UserInvoices;
use App\Models\OrderOfferInvoice;

class OfferInvoices {
	//current_balance
	//suspended_balance

	public function invoice($offer) {
		$invoice = $offer->invoice()->first();
		return !empty($invoice)?$invoice:OrderOfferInvoice::create([
				'offer_id'                       => $offer->id,
				'order_id'                       => $offer->order_id,
				'amount_deduction_from_user'     => 'awaiting',
				'inovice_status'                 => 'open',
				'added_amount_to_vendor_balance' => 'no',
			]);
	}

	// create invoice in this offer if approved by user order
	public static function createOrUpdate($offer) {
		$order  = $offer->order_id()->first();
		$amount = $order->negotiable == 'yes'?$offer->price:$order->amount;
		if (!empty($offer)) {
			// get invoice
			$invoice   = (new OfferInvoices)->invoice($offer);
			$tax       = getPercentFromSetting('amount_add_order_vat', $amount);
			$remaining = $amount-$tax;
			if ($offer->offer_status == 'approved') {
				$invoice->amount_deduction_from_user = 'awaiting';
				$invoice->offer_amount               = $amount;
				$invoice->system_tax                 = $tax;
				$invoice->remaining_amount_to_vendor = $remaining;
				$invoice->save();
			} elseif ($offer->offer_status == 'cancelled' || $offer->offer_status == 'refused') {
				$invoice->amount_deduction_from_user = 'recovered';
				$invoice->offer_amount               = $amount;
				$invoice->system_tax                 = $tax;
				$invoice->remaining_amount_to_vendor = $remaining;
				$invoice->save();
			}
		}
	}
}