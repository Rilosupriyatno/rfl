<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;
use App\Models\Administration\Seller\Product;
use App\Models\User;



class CreateSnapTokenService extends Midtrans
{
	protected $order;
	protected $itemCarts;

	public function __construct($order, $itemCarts, $shippingFees, $shippingBillingAddress)
	{
		parent::__construct();

		$this->order = $order;
		$this->itemCarts = $itemCarts;
		$this->shippingFees = $shippingFees;
		$this->shippingBillingAddress = $shippingBillingAddress;
	}

	public function getSnapToken()
	{
		// transaction detail (order)
		$transaction_details = [
			'order_id' => $this->order->id,
			'gross_amount' => $this->order->grandtotal,
		];

		// make an empty array for containing cart items
		$item_details = [];

		// sum all fee
		$totalFee = array_reduce($this->shippingFees, function ($total, $fee) {
			$total += $fee;

			return $total;
		});

		// indexing
		$index = 0;

		foreach ($this->itemCarts as $itemCart) {
			// inserting fee to first item only (handle the gross amount with fee value and item without fee value)
			$totalPrice = $index == 0 ? (int) $itemCart->price + $totalFee : (int) $itemCart->price;

			// make a custom cart object
			$cart = [
				'id' => $itemCart->id,
				'price' =>  $totalPrice,
				'quantity' => $itemCart->qty,
				'name' => $itemCart->products->name,
			];

			// insert it for item details
			array_push($item_details, $cart);

			$index++;
		}

		// customer details info
		$buyerInfo = User::where('id', session()->get('id'))->first();
		$explodedName = explode(' ', $buyerInfo->name);
		$firstName = ucwords(join(' ', array_slice($explodedName, 0, count($explodedName))));
		$lastName = ucwords(join(' ', array_slice($explodedName, -1)));

		$customer_details = [
			'first_name' => $firstName,
			'last_name' => $lastName,
			'email' => $buyerInfo->username . '@gmail.com',
			'phone' => $buyerInfo->phone,
			'billing_address' => $this->shippingBillingAddress['billingAddress'],
			'shipping_address' => $this->shippingBillingAddress['shippingAddress'],
		];

		// combine it for request getting snap token
		$transaction_data = [
			'transaction_details' => $transaction_details,
			'item_details' => $item_details,
			'customer_details' => $customer_details,
		];

		// call the get snap token instance method
		try {
			$snapToken = Snap::getSnapToken($transaction_data);

			return $snapToken;
		} catch (\Exception $e) {
			$errorMessage = $e->getMessage();

			return $errorMessage;
		}
	}
}