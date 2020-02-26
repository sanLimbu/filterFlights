<?php

namespace App\Filters\Flights;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\FilterAbstract;


class AirlineFilter extends FilterAbstract
{


   public function filter(Builder $builder, $value)
   {
    return $builder->whereHas('airlines', function(Builder $builder) use ($value) {
      $builder->where('slug', $value);
    });
   }


}
