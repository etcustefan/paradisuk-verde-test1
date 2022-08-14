<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Rezervari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Omnipay\Omnipay;
use Stripe\Charge;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class PaymentController extends Controller
{
    private \Omnipay\Common\GatewayInterface $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function test ()
    {
        return view('test');
    }

    public function checkBooking(Request $request)
    {
        $input = [
            'name' => $request->get('name'),
            'phone_number' => $request->get('phone_number'),
            'stand' => $request->get('stand'),
            'count_fishers' => $request->get('count_fishers'),
            'from_date' => $request->get('from_date'),
            'to_date' => $request->get('to_date')
        ];
        $stand = $input['stand'];
        $countStands = substr_count($stand, ',') + 1;
        $price = '';
        $from_date = explode('.', $input['from_date']);
        $to_date = explode('.', $input['to_date']);
        $days = intval($to_date[0]) - intval($from_date[0]);

        if ($days == 0) {
            $price = ($countStands * 50);
            $input['count_fishers'] = $countStands;
        } else if ($days > 0) {
            $price = ($countStands * 100 + $input['count_fishers'] * 100) * $days;
        }

        $nights = [];
        if ($days == 0) {
            $nights [] = '06:00 - 18:00';
        }
        if ($days == 1) {
            $nights [] = intval($from_date[0]);
        } else {
            for ($i = 0; $i < $days; $i++) {
                $nights [] = intval($from_date[0]) + $i;
            }
        }
        $data = [
            'name' => $input['name'],
            'phone_number' => $input['phone_number'],
            'stand' => $stand,
            'count_stands' => $countStands,
            'count_fishers' => $input['count_fishers'],
            'from_date' => $input['from_date'],
            'to_date' => $input['to_date'],
            'nights' => implode(',', $nights),
            'price' => $price,
        ];
        $searchHouses = array();
        $searchNights = array();

        $houses = explode(',', $data['stand']);
        $night_explode = explode(',', $data['nights']);

        foreach ($houses as $item) {
            $searchHouses [] = $item . "+,|" . $item;
        }
        foreach ($night_explode as $itm) {
            $searchNights [] = $itm . "+,|" . $itm;
        }

        $regexpH = implode("|", $searchHouses);
        $regexpN = implode("|", $searchNights);

        $booking = Rezervari::where('stand', 'regexp', $regexpH)
            ->where('nights', 'regexp', $regexpN)
            ->get();

        $dataObj = [];
        foreach ($booking as $obj) {
            $dataObj [] = $obj;
        }

        if (empty($dataObj)) {
            Rezervari::updateOrCreate([
                'name' => $data['name'],
                'phone_number' => $data['phone_number'],
                'stand' => $data['stand'],
                'count_stands' => $data['count_stands'],
                'count_fishers' => $data['count_fishers'],
                'from_date' => $data['from_date'],
                'to_date' => $data['to_date'],
                'nights' => $data['nights'],
                'price' => $data['price'],
            ]);

            return view('stripe',
                [
                    'name' => $data['name'],
                    'price' => $price,
                    'phone_number' => $data['phone_number'],
                    'count_fishers' => $data['count_fishers'],
                    'stand' => $data['stand'],
                    'from_date' => $data['from_date'],
                    'to_date' => $data['to_date'],
                ]
            );
        }else{
            return redirect('/?error=true');
        }
    }

    public function pay(Request $request)

    {
        try {

            $response = $this->gateway->purchase(array(
                'amount' => $request['price'],
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();

                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];

                $payment->save();

                return redirect('/?transaction=success')->with('success', "Payment is Successfully. Your Transaction Id is : " . $arr['id']);

            } else {
                return $response->getMessage();
            }
        } else {
            return redirect('/?error=payment_declined');
        }
    }

    public function error()
    {
        return redirect('/?error=payment_declined');
    }

}
