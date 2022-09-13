<?php

namespace App\Http\Controllers;

use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Database\QueryException;
use Stripe\Exception\ApiErrorException;
use Stripe\Exception\CardException;
use App\Models\Rezervari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function checkBooking(Request $request)
    {
        $input = [
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'stand' => $request->stand,
            'count_fishers' => $request->count_fishers,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date
        ];
        $spotNames = \Config::get("spots_name");
        $days = date_diff(date_create($input['to_date']), date_create($input['from_date']))->days;
        $stand = $input['stand'];
        $stands = [];
        $stringStand = '';
        $arrayStand = explode(',', $stand);
        $countStands = substr_count($stand, ',') + 1;
        $price = '';
        if ($input['to_date'] == null) {
            $price = ($countStands * 50);
            $input['count_fishers'] = $countStands;
            $program = '06:00 - 18:00';
            foreach ($arrayStand as $i){
                $stands [] = $spotNames['Locuri'][$i];
            }
            $stringStand = implode(',' ,$stands);

        } else if ($days > 0) {
            $price = ($countStands * 100 + $input['count_fishers'] * 100) * $days;
            $nights = [];
            $start = new DateTime($input['from_date']);
            $end = (new DateTime($input['to_date']));
            $interval = new DateInterval('P1D');
            $period = new DatePeriod($start, $interval, $end);

            foreach ($period as $dt) {
                $nights [] = $dt->format("d-m");
            }
            $program = implode(',', $nights);

            foreach ($arrayStand as $i){
                $stands [] = $spotNames['Casute'][$i];
            }
            $stringStand = implode(',' ,$stands);
        }

        $data = [
            'name' => $input['name'],
            'phone_number' => $input['phone_number'],
            'stand' => $stand,
            'count_stands' => $countStands,
            'count_fishers' => $input['count_fishers'],
            'from_date' => $input['from_date'],
            'nights' => $program,
            'price' => $price,
        ];

        if ($input['to_date'] === null) {
            $data['to_date'] = $input['from_date'];
        } else {
            $data['to_date'] = $request->to_date;
        }
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


        try {
            if (empty($booking)) {
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

                return view('confirm',
                    [
                        'name' => $data['name'],
                        'price' => $data['price'],
                        'phone_number' => $data['phone_number'],
                        'count_fishers' => $data['count_fishers'],
                        'stand' => $stringStand,
                        'from_date' => $data['from_date'],
                        'to_date' => $data['to_date'],
                    ]
                );
            } else {
                Session::flash('type_error', 'Oops! Se pare ca este deja o casuta luata in seara respectiva :)');
                return redirect('/#rezerva_loc');
            }
        } catch (\TypeError $typeError) {
            Session::flash('type_error', $typeError->getMessage());
            return redirect('/#rezerva_loc');
        } catch (QueryException $queryException) {
            Session::flash('type_error', $queryException->getMessage());
            return redirect('/#rezerva_loc');
        }

    }

    public function checkout(Request $request)
    {

        return view('checkout', [
            'price' => $request->price,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'stand' => $request->stand,
            'from_date' => $request->from_date,
        ]);

    }

    /**
     * @throws ApiErrorException
     */

    public function pay(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            Charge::create([
                "amount" => $request->price * 100,
                "currency" => "RON",
                "source" => $request->stripeToken,
                'metadata' => ['integration_check' => 'accept_a_payment'],
                'description' => 'Nume: ' . $request->name . "\n" .
                    "Contact: " . $request->phone_number . '/' . $request->email . "\n" .
                    'Locuri alese: ' . $request->stand . "\n" .
                    'Va asteptam in data de ' . $request->from_date . "\n"
            ]);


            Session::flash('success', 'Payment successful!');
            return redirect('/#rezerva_loc');

        } catch (CardException $cardException) {
            Session::flash('message', $cardException->getMessage());
            return back();

        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            return back();
        }

    }

    public function destroy(Request $request)
    {
        $rows = Rezervari::where('stand', $request->stand)
            ->where('from_date', $request->from_date)
            ->where('to_date', $request->to_date)
            ->where('price', $request->price)
            ->where('name', $request->name)->get('id');
        foreach ($rows as $elem) {
            Rezervari::destroy($elem['id']);
        }

        return redirect(url('/#rezerva_loc'));
    }

}
