<?php



namespace App\Actions\Admin\Orders;



use Carbon\Carbon;

use Lorisleiva\Actions\Concerns\AsAction;



class Delhivery

{

  use AsAction;



  public function handle($cart, $productNames, $grandTotal, $quantity, $orderIds)

  {

    $url = "https://track.delhivery.com/cmu/push/json/?token=" . config('myconfig.DELHIVERY_TOKEN');

    $params = array(); // this will contain request meta and the package feed

    $package_data = array(); // package data feed

    $shipments = array();

    $pickup_location = array();

    /////////////start: building the package feed/////////////////////

    $shipment = array();

    $shipment['waybill'] = ""; // waybill number

    $shipment['name'] = $cart->orderItemDetail->shipping_name; // consignee name

    $shipment['order'] = $orderIds; // client order number

    $shipment['products_desc'] = $productNames;

    $shipment['order_date'] = Carbon::parse($cart->orderItemDetail->created_at)->toISOString(); // ISO Format

    $shipment['payment_mode'] = $cart->orderItemDetail->order->payment_method === 'Cash on Delivery' ? 'COD' : 'Prepaid';

    $shipment['total_amount'] = $grandTotal; // in INR

    $shipment['cod_amount'] = $cart->orderItemDetail->order->payment_method === 'Cash on Delivery' ? $grandTotal : 0; // amount to be collected, required for COD

    $shipment['add'] = $cart->orderItemDetail->shipping_address; // consignee address

    $shipment['city'] = $cart->orderItemDetail->city->name;

    $shipment['state'] = $cart->orderItemDetail->state->name;

    $shipment['country'] = $cart->orderItemDetail->country->name;

    $shipment['phone'] = $cart->orderItemDetail->shipping_phone;

    $shipment['pin'] = $cart->orderItemDetail->shipping_pincode;

    $shipment['quantity'] = $quantity; // quanitity of quantity

    $shipment['seller_name'] = "THEFASHIONEDIT EXPRESS"; //name of seller

    $shipment['seller_add'] = "A-402, 4th floor , Time Square II Near Hotel Avalon, Ramdas Road, Bodakdev, Thaltej Ahmedabad, Gujarat- 380054 , Ahmedabad, GUJARAT ,India 380054"; // add of seller

    $shipment['seller_cst'] = 'cst no of seller'; //cst number of seller

    $shipment['seller_tin'] = "ssssss";  //tin number of seller

    $shipment['seller_inv'] = "ssssss"; // invoice number of shipment

    $shipment['seller_inv_date'] = $cart->orderItemDetail->invoice->created_at->toISOString(); // ISO Format

    // pickup location information //

    $pickup_location['add'] = "A-402, 4th floor , Time Square II Near Hotel Avalon, Ramdas Road, Bodakdev, Thaltej Ahmedabad, Gujarat- 380054 , Ahmedabad, GUJARAT ,India 380054";
    $pickup_location['city'] = "Ahmedabad";
    $pickup_location['country'] = 'India';



    $pickup_location['name'] = "THEFASHIONEDIT EXPRESS";  // Use client warehouse name



    $pickup_location['phone'] = "6359880688";



    $pickup_location['pin'] = "380054";



    $pickup_location['state'] = "Gujarat";

    $shipments = array($shipment);



    $package_data['shipments'] = $shipments;

    $package_data['pickup_location'] = $pickup_location;

    $params['format'] = 'json';

    $params['data'] = json_encode($package_data);



    $ch = curl_init($url);



    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));



    // execute!

    $response = curl_exec($ch);

    curl_close($ch);

    return $response = json_decode($response, true);

  }

}

