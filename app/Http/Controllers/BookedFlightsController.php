<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BookedFlights;

use App\Filters\Flights\ {
  AccessFilter,
  AirlineFilter,
  BookedFilter,
  FlightStopFilter,
  FlightTypesFilter
};

class BookedFlightsController extends Controller
{
    public function index(Request $request)
    {
      return BookedFlights::with(['airlines'])->filter($request, $this->getFilters())->get();
    }

    protected function getFilters()
     {
        return [


        ];
     }
}
