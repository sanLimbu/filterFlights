<?php
namespace App\Filters\Flights;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;


class FlightStopFilter extends FilterAbstract {

 public function mappings()
 {
   return [
      'direct' => 'direct',
      'one' => 'one',
      'Two+' => 'Two+',
   ];
 }

  public function filter(Builder $builder, $value)
  {
     $value = $this->resolveFilterValue($value);

     if($value == null){
       return $builder;
     }

     return $builder->where('flightStops', $value);

  }


}
