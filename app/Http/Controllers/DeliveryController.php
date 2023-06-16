<?php

namespace App\Http\Controllers;

use App\Components\OrderNovaPoshta;
use App\Components\OrderUkrPoshta;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function send(Request $request): int
    {
        try {
            $data = [
                'customer_name' => $request->name,
                'phone_number' => $request->phone,
                'email' => $request->email,
                'sender_address' => $request->sender_address,
                'delivery_address' => $request->delivery_address,
                'cargo_length' => $request->cargo_length,
                'cargo_height' => $request->cargo_height,
                'cargo_weight' => $request->cargo_weight,
            ];

            $delivery = match ($request->delivery) {
                'novaposhta' => new OrderNovaPoshta($data),
                'ukrposhta' => new OrderUkrPoshta($data),
            };

            $response = $delivery->send();

        } catch (\Exception $e) {
            die($e->getMessage());
        }
        return $response;
    }
}