<?php
namespace App\Filters\Flights;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;


class FlightTypesFilter extends FilterAbstract {

 public function mappings()
 {
   return [
      'economy' => 'economy',
      'business' => 'business',
      'firstClass' => 'firstClass',
   ];
 }

  public function filter(Builder $builder, $value)
  {
     $value = $this->resolveFilterValue($value);

     if($value == null){
       return $builder;
     }

     return $builder->where('flightType', $value);

  }


}
