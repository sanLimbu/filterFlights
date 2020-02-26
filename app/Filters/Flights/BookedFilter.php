<?php

namespace App\Filters\Flights;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\FilterAbstract;


class BookedFilter extends FilterAbstract
{
  public function mappings()
  {
    return [
      'true' => true,
      'false'=> false,

    ];
  }

   public function filter(Builder $builder, $value)
   {
    $value = $this->resolveFilterValue($value);
    if($value === null || !auth()->user())
    {
      return $builder;
    }

    $method = $value ? "whereHas" : "whereDoesntHave";
    return $builder->{$method}('users', function (Builder $builder) {

        $builder->whereIn('users.id', [auth()->id()]);

    });

   }
}
