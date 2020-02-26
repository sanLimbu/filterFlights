<template>
<div class="row">
  <div class="col-sm-3">
    <filters endpoint="/api/flights/filters"></filters>
  </div>
  <div class="col-sm-9">
    <div class="panel panel-default">
      <div class="panel-body">
        <template v-if="flights.length">
        <flight v-for="flight in flights" :flight="flight" :key="flight.id"></flight>
      </template>
      <template v-else>
        No Results Found
      </template>
        <pagination :meta="meta"></pagination>
      </div>
    </div>
  </div>
</div>
</template>


<script>

 import Flight from './partials/Flight.vue'
 import Pagination from '../pagination/Pagination.vue'
 import Filters from './partials/Filters.vue'
  export default {
     components: {
       Flight,
       Pagination,
       Filters
     },
    data(){
       return {
         flights: [],
         meta: {}
       }
    },

    watch: {
      '$route.query': {
        handler(query) {
          this.getFlights(1, query)
        },
        deep: true
      }

    },
    mounted() {
      this.getFlights()
    },

    methods : {
      getFlights(page = this.$route.query.page, query = this.$route.query ){
        axios.get('/api/flights', {
          params: {
            page,
            ...query
          }
        }).then((response) => {
          this.flights = response.data.data
          this.meta = response.data.meta
        })
      }

    }

  }
</script>
