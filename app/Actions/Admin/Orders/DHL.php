<?php

namespace App\Actions\Admin\Orders;

use Lorisleiva\Actions\Concerns\AsAction;

class DHL
{
  use AsAction;

  public function handle()
  {
    try {
      $url = "http://dhlindiaplugin.com/DHLWCFService_V6/DHLService.svc?wsdl";
      $action = "PostShipment_CSBV";
      $xmlRequest = view('ecommerce.orders.dhl')->render();

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept:text/xml", "Content-Type: text/xml;charset=UTF-8", 'SOAPAction:' . $action));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, FALSE);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlRequest);
      curl_setopt($ch, CURLOPT_HEADER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);

      $output = curl_exec($ch);
      curl_close($ch);

      dd($output);
    } catch (\Throwable $th) {
      dd($th);
    }
  }
}
