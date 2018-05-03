<template>
    <div>
        <v-date-picker
                mode='single'
                v-model='selectedDate'
                :attributes='attributes'
                :disabled-dates='{ days: [1, 10, 20, 30] }'
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
           selectedDate: '',
           attributes: [
               {
                   highlight: {
                       backgroundColor: '#9f80ff',     // Purple background
                       borderColor: '#8c66ff',
                       borderWidth: '2px',
                   },
                   contentStyle: {
                       color: 'white',                 // White text
                   },
                   dates: [
                       new Date(2018, 4, 2),
                       new Date(2018, 4, 3),
                       new Date(2018, 4, 4),
                       new Date(2018, 4, 5),
                       new Date(2018, 4, 6),
                   ],
               },
           ]
       }
    },
    components: {
        'v-calendar': Calendar
    },
}
</script>
