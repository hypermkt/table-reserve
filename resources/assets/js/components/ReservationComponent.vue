<template>
    <div>
        <div>
            <ul>
                <li v-for="course in this.courses">
                    <el-radio v-model="form.radio" :label="course.id">{{ course.title }}</el-radio>
                </li>
            </ul>
        </div>
        <div>
            <v-date-picker
                    mode='single'
                    v-model='selectedDate'
                    is-inline>
            </v-date-picker>
        </div>

        <el-select v-model="value" placeholder="Select">
            <el-option
                    v-for="item in options"
                    :key="item.value"
                    :label="item.label"
                    :value="item.value">
            </el-option>
        </el-select>

        <div>
            <el-button>10:00</el-button>
            <el-button>10:30</el-button>
            <el-button>11:00</el-button>
            <el-button>11:30</el-button>
            <el-button>12:00</el-button>
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
                    <el-button type="primary" @click="onSubmit">Create</el-button>
                    <el-button>Cancel</el-button>
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
           options: [
               { label: '1人', value: 1 },
               { label: '2人', value: 2 },
               { label: '3人', value: 3 },
           ],
           selectedDate: null,
           form: {
               name: '',
               email: '',
               tel: '',
               radio: '',
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
        onSubmit: function() {

        }
    }
}
</script>
