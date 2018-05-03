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
               new Date(2018, 4, 1),
               new Date(2018, 4, 15),
               new Date(2018, 4, 29)
           ]
       }
    },
    components: {
        'v-calendar': Calendar
    },
}
</script>
