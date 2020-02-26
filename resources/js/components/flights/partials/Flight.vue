<template>
<div class="media">
  <div class="media-left">
    <img class="media-object" src="http://via.placeholder.com/84x84&text=..." :alt="flight.origin">
  </div>
  <div class="media-body">
    <ul class="list-inline" v-if="flight.airlines">
      <li v-for="airline in flight.airlines">
        {{ airline.airline_name }}
      </li>
    </ul>
    <h6 class="media-heading">{{ flight.origin }}</h6>
    <ul class="list-inline">
      <li>{{ flight.formattedBooked}} </li>
      <li>{{ flight.formattedFlightStops}} </li>
      <li>{{ flight.formattedFlightType}} </li>
    </ul>
  </div>
</div>

</template>

<script>
export default {
   props: [
     'flight'
   ]
}
</script>
