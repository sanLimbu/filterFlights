<?php

namespace App;

use App\Filters\Flights\FlightsFilter;
use App\Airlines;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BookedFlights extends Model
{

  public $appends = [
    'booked',
    'formattedBooked',
    'formattedFlightStops',
    'formattedFlightType'
  ];

  public $hidden = [
    'users'
  ];

  public function getFormattedBookedAttribute()
  {
    return $this->admin === 1 ? "Booked" : "Not";
  }


  public function getFormattedFlightStopsAttribute()
  {
    return ucfirst($this->flightStops);
  }

  public function getFormattedFlightTypeAttribute()
  {
    return ucfirst($this->flightType);
  }


  public function scopeFilter(Builder $builder, $request, array $filters = [])
  {
    return (new FlightsFilter($request))->add($filters)->filter($builder);
  }

  public function airlines(){

    return $this->morphToMany(Airlines::class, 'airlinetable');

  }

  public function getBookedAttribute()
  {
    if(!auth()->check()){
      return false;
    }

    return $this->users->contains(auth()->user());
  }

  public function users(){
    return $this->belongsToMany(User::class);
  }
}
