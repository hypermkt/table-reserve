<template>
    <div>
        <ul>
            <li><el-radio v-model="form.radio" label="1">Option A</el-radio></li>
            <li><el-radio v-model="form.radio" label="2">Option B</el-radio></li>
        </ul>

        <br />
        <br />
        <v-date-picker
                mode='single'
                v-model='selectedDate'
                :attributes='attributes'
                :disabled-dates='{ days: [1, 10, 20, 30] }'
                is-inline>
        </v-date-picker>
        <p>selectedDate: {{ this.selectedDate }}</p>

        <el-button>10:00</el-button>
        <el-button>10:30</el-button>
        <el-button>11:00</el-button>
        <el-button>11:30</el-button>
        <el-button>12:00</el-button>

        <el-form ref="form" :model="form" label-width="120px">
            <el-form-item label="お名前">
                <el-input v-model="form.name"></el-input>
            </el-form-item>

            <el-form-item label="メールアドレス">
                <el-input v-model="form.email"></el-input>
            </el-form-item>

             <el-form-item label="電話番号">
                <el-input v-model="form.tel"></el-input>
            </el-form-item>

            <el-form-item>
                <el-button type="primary" @click="onSubmit">Create</el-button>
                <el-button>Cancel</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>

<script>
import { setupCalendar, Calendar} from 'v-calendar'
import 'v-calendar/lib/v-calendar.min.css';

export default {
    data() {
       return {
           selectedDate: '',
           form: {
               name: '',
               email: '',
               tel: '',
               radio: '',
           },
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
    methods: {
        onSubmit: function() {

        }
    }
}
</script>
