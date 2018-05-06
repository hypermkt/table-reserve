<template>
    <div>
        <div>
            <ul>
                <li v-for="item in this.courses">
                    <el-radio v-model="course" :label="item.id">{{ item.title }}</el-radio>
                </li>
            </ul>
        </div>
        <div>
            <v-date-picker
                    mode='single'
                    v-model='date'
                    is-inline>
            </v-date-picker>
        </div>

        <el-select v-model="number_of_people" placeholder="Select">
            <el-option
                    v-for="item in this.number_of_people_options"
                    :key="item.value"
                    :label="item.label"
                    :value="item.value">
            </el-option>
        </el-select>

        <div>
            <el-button
                v-for="item in this.times"
                :key="item.label"
                @click="time=item.label">{{ item.label }}</el-button>
        </div>

        <div>
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
                    <el-button type="primary" @click="reserve">予約する</el-button>
                </el-form-item>
            </el-form>
        </div>
    </div>
</template>

<script>
import { setupCalendar, Calendar} from 'v-calendar'
import 'v-calendar/lib/v-calendar.min.css';

export default {
    data() {
       return {
           courses: [],
           number_of_people_options: [
               { label: '1人', value: 1 },
               { label: '2人', value: 2 },
               { label: '3人', value: 3 },
           ],
           times: [
               { label: '10:00' },
               { label: '10:30' },
               { label: '11:00' },
               { label: '11:30' },
           ],
           course: '',
           number_of_people: '',
           date: null,
           time: null,
           form: {
               name: '',
               email: '',
               tel: '',
           },
       }
    },
    components: {
        'v-calendar': Calendar
    },
    props: ['username'],
    created() {
        this.fetchCourses();
    },
    methods: {
        fetchCourses() {
            let that = this;
            axios.get('/api/courses', {params: {
                username: this.username
            }}).then(function(response) {
                that.courses = response.data.courses;
            })
        },
        reserve: function() {
            console.log("course:" + this.course);
            console.log("date:" + this.date);
            console.log("time:" + this.time);
            console.log("number_of_people:" + this.number_of_people);
            console.log("form.name:" + this.form.name);
            console.log("form.email:" + this.form.email);
            console.log("form.tel:" + this.form.tel);
        }
    }
}
</script>
