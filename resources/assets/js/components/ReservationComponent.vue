<template>
    <div>
        <v-date-picker
                mode='multiple'
                v-model='selectedDate'
                is-inline>
        </v-date-picker>
        <p>selectedDate: {{ this.selectedDate }}</p>
    </div>
</template>

<script>
import { setupCalendar, Calendar} from 'v-calendar'
import 'v-calendar/lib/v-calendar.min.css';

export default {
    data() {
       return {
           selectedDate: [
               new Date(2018, 4, 1), // Jan 1st, 2018
               new Date(2018, 4, 15), // Jan 15th, 2018
               new Date(2018, 4, 29) // Jan 29th, 2018
           ]
       }
    },
    components: {
        'v-calendar': Calendar
    },
}
</script>
