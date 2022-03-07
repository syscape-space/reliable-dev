<?php
namespace App\Http\Controllers\UserInvoices;
// Add On Helper Function name is ( orderBalance ) In routes/configurations.php
class OrderAndUserBalance {

	public function updateOfferAndInvoice($order, $status = null) {
		//status param refere to order status
		if (!empty($order)) {
			// if refunded order
			if ($status == 'cancelled') {
				$approved_offers = $order->offers()->where('offer_status', 'approved')->get();
				foreach ($approved_offers as $approved) {
					$approved->offer_status = 'cancelled';
					$approved->save();
					// Invoice
					$invoice = $approved->invoice()->first();
					if (!empty($invoice)) {
						$invoice->amount_deduction_from_user = 'recovered';
						$invoice->inovice_status             = 'closed';
						$invoice->save();
					}
				}
				// refused Offers on this Order
				$other_offers = $order->offers()->where('offer_status', '!=', 'cancelled')->get();
				foreach ($other_offers as $other) {
					$other->offer_status = 'refused';
					$other->save();
					// Invoice
					$invoice = $other->invoice()->first();
					if (!empty($invoice)) {
						$invoice->amount_deduction_from_user = 'recovered';
						$invoice->inovice_status             = 'closed';
						$invoice->save();
					}
				}
			}
			// if closed order
			 elseif ($status == 'closed') {
				$approved_offers = $order->offers()->where('offer_status', 'approved')->get();
				foreach ($approved_offers as $discounted) {
					// Invoice discounted to transfare money to vendor
					// $other->offer_status = 'refused';
					// $other->save();
					$invoice = $discounted->invoice()->first();
					if (!empty($invoice)) {
						$invoice->amount_deduction_from_user = 'discounted';
						$invoice->inovice_status             = 'closed';
						$invoice->save();
					}
				}
			}
			// if under_review order
			 else {
				$offers = $order->offers()->get();
				foreach ($offers as $offer) {
					$offer->offer_status = 'pending';
					$offer->save();
					// Invoice
					$invoice = $offer->invoice()->first();
					if (!empty($invoice)) {
						$invoice->amount_deduction_from_user = 'awaiting';
						$invoice->inovice_status             = 'open';
						$invoice->save();
					}
				}
			}

		}
		// if undifined or deleted order
		 else {
			// Delete all offers and invoices if order is deleted
			$order->offers()->delete();
		}
	}

	// transfare money to vendor if order status change to closed by admin or user
	public function transfareBalanceToVendor($order) {
		$user = $order->user_id()->first();
		if (!empty($user)) {
			// transfare from suspend money to vendor
			$user->suspended_balance = checkNegative($user->suspended_balance-$order->amount);
			$user->save();
			// Transfare now
			$this->updateOfferAndInvoice($order, 'closed');
		}
	}

	public function updateBalance($order, $new_amount = null) {
		$user = $order->user_id()->first();
		if (!empty($user)) {
			if (!is_null($new_amount)) {
				// Rollback
				$user->current_balance   = ($user->current_balance+$order->amount);
				$user->suspended_balance = checkNegative($user->suspended_balance-$order->amount);

				// then cute of balance from user by new amount
				$user->current_balance   = ($user->current_balance-$new_amount);
				$user->suspended_balance = checkNegative($user->suspended_balance+$new_amount);

			} else {
				$user->current_balance   = ($user->current_balance-$order->amount);
				$user->suspended_balance = checkNegative($user->suspended_balance+$order->amount);
			}

			$user->save();

			// rollback canclled offers to approved again if order is open or under_review
			$this->updateOfferAndInvoice($order);

		}
	}

	// Rollback balance if user or admin went to delete order
	public function rollbackOrder($order) {
		$user = $order->user_id()->first();
		if (!empty($user)) {
			$user->current_balance   = ($user->current_balance+$order->amount);
			$user->suspended_balance = checkNegative($user->suspended_balance-$order->amount);
			$user->save();
			// change offers and invoices to canclled and refused if rollback money
			$this->updateOfferAndInvoice($order, 'cancelled');
		}
	}

	public function updateBalanceByOffer($offer) {
		$order = $offer->order_id()->first();
		if (!empty($order)) {
			$user = $order->user_id()->first();

			if (!empty($user)) {
				if ($order->negotiable == 'yes') {
					// rollback if had new offer and new cost by offer
					$user->current_balance   = ($user->current_balance+$order->amount);
					$user->suspended_balance = checkNegative($user->suspended_balance-$order->amount);
				}
				//get Final Price or amount if negotiable exist and use new offer price
				$amount = $order->negotiable == 'yes'?$offer->price:$order->amount;
				// Update Balance if Approved Offer By User Or Admin
				$user->current_balance   = ($user->current_balance+$amount);
				$user->suspended_balance = checkNegative($user->suspended_balance-$amount);

				$user->save();

			}
		}
	}

}