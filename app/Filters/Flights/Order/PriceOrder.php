<?php

namespace App\Filters\Flights\Order;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\FilterAbstract;


class PriceOrder extends FilterAbstract
{


   public function filter(Builder $builder, $value)
   {
     return $builder->orderBy('totalCost', $this->resolvePriceDirection($value));
   }

}
