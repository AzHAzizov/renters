<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Renter;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use ReflectionClass;

class RentersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Renter::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Renter  $renter
     * @return \Illuminate\Http\Response
     */
    public function show(Renter $renter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Renter  $renter
     * @return \Illuminate\Http\Response
     */
    public function edit(Renter $renter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {

        $request->validate([
            "car_id" => "required|integer",
        ]);

        $car_id = $request->input('car_id');


        try {
            $renter = Renter::findOrFail($id);
            $currentRenterCar = $renter->car;

            $car = Car::findOrFail($car_id);
            $currentCarRenter = $car->renter;


        } catch (ModelNotFoundException $e) {

            $modelName = $e->getModel();
            $reflect = new ReflectionClass(new $modelName);

            if ($reflect->getShortName() === 'Car') {
                $throwMessage = 'Car not found';
            } elseif ($reflect->getShortName() === 'Renter') {
                $throwMessage = 'Renter not found';
            }
            return $throwMessage;
        }



        // return ['user_id' => $id, 'car_id' => $car_id, 'currentRenterCar' => $currentRenterCar, 'currentCarRenter' => $currentCarRenter];




        if (!empty($currentRenterCar['id'])) {

            if ($currentRenterCar['id'] == $car_id) return true;

            $currentRenterCar->renter_id = null;
            $currentRenterCar->save();
        }



        if(!empty($currentCarRenter)) return 'Car already rented';


        $car->renter_id = $id;
        $car->save();
        

        $renter->car_id = $car_id;
        $result = $renter->save();

        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Renter  $renter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Renter $renter)
    {
        //
    }
}
