<?php

namespace App\Filters\Flights;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\FilterAbstract;


class AccessFilter extends FilterAbstract
{
  public function mappings()
  {
      return [
        "admin" => 1,
        "notadmin" => 0,

      ];
  }


   public function filter(Builder $builder, $value)
   {
    // $value = ($value === "admin" ? true : false);
    $value = $this->resolveFilterValue($value);

    if ($value == null){
      return $builder;
    }

    return $builder->where('admin', $value);
   }


}
