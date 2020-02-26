<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BookedFlights;
use App\Http\Resources\FlightResource;
use App\Filters\Flights\FlightsFilter;

class FlightsController extends Controller
{
  public function index(Request $request)
  {
     return new FlightResource(
       BookedFlights::with(['airlines','users'])->latest()->filter($request)->paginate(4)
     );
  }

  public static function filters()
  {
    return response()->json([
      'data' => FlightsFilter::mappings()
    ], 200);
  }
}
