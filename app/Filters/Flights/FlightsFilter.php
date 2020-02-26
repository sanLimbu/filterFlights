<?php

namespace App\Filters\Flights;
use App\Filters\FiltersAbstract;
use App\Filters\Flights\{AccessFilter, FlightStopFilter, FlightTypesFilter, AirlineFilter,ConfirmedFilter};
use App\Filters\Flights\Order\{PriceOrder};
use App\Airlines;

class FlightsFilter extends FiltersAbstract
{

  protected $filters = [
    'admin'       => AccessFilter::class,
    'flightStops' => FlightStopFilter::class,
    'flightType'  => FlightTypesFilter::class,
    'airline'     => AirlineFilter::class,
    'booked'      => BookedFilter::class,
    'price'       => PriceOrder::class,
   ];


   public static function mappings()
   {
     $map = [
       'admin' => [
         '1' => 'Admin',
         '0' => 'Not Admin'
       ],
       'flightStops' => [
         'direct' => 'Direct',
         'one'    => 'One',
         'Two+'   => 'Two'
       ],
       'flightType' => [
         'economy'   => 'Economy',
         'business'  => 'Business',
         'firstClass'=> 'FirstClass'
       ],
       'airlines' => Airlines::get()->pluck('airline_name','slug')->toArray()
     ];

     if(auth()->check()){
       $map = array_merge($map, [
         'bookedStatus' => [
           '1' => 'Booked',
           '0' => 'Not Booked'
         ]

       ]);
     }
     return $map;
   }

}
