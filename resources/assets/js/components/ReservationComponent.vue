<template>
  <div>
    <div v-if="isReserved">
      予約完了
    </div>
    <div v-else>
      <div>
        <div>
          <h6 class="border-bottom pb-2"><b>コース・メニュー</b></h6>
        </div>
        <div v-for="item in this.courses" :key="item.id">
          <label>
            <el-radio
              v-model="course_id"
              @change="table_types = item.table_types"
              :label="item.id">{{ item.course_name }} ( {{ item.duration_minutes }}分 {{ item.price }}円 )</el-radio>
          </label>
        </div>
      </div>

      <div v-if="this.course_id != null">
        <div>
          <h6 class="border-bottom pb-2"><b>席</b></h6>
        </div>
        <div v-for="item in this.table_types" :key="item.id">
          <label>
            <el-radio
              v-model="table_type_id"
              @change="table_type=item"
              :label="item.id">{{ item.table_type_name }}</el-radio>
          </label>
        </div>
      </div>

      <div v-if="this.table_type_id != null">
        <div>
          <div>
            <h6 class="border-bottom pt-2 pb-2"><b>予約日時/人数を選択してください</b></h6>
          </div>
          <div class="p-2">
            <v-date-picker
              mode='single'
              v-model='date'
              :disabled-dates='disabled_dates'
              :min-page="{ year: this.calendar.min.year, month: this.calendar.min.month }"
              :max-page="{ year: this.calendar.max.year, month: this.calendar.max.month }"
              is-inline>
            </v-date-picker>
          </div>

          <div class="p-2">
            <el-select v-model="number_of_people" placeholder="Select">
              <el-option
                v-for="item in this.number_of_people_options"
                :key="item.value"
                :label="item.label"
                :value="item.value">
              </el-option>
            </el-select>
          </div>

          <div class="p-2">
            <el-button
              v-for="item in this.times"
              :key="item.label"
              @click="time=item.label">{{ item.label }}</el-button>
          </div>
        </div>

        <div>
          <div>
            <h6 class="border-bottom pt-2 pb-2"><b>連絡先を入力してください</b></h6>
          </div>
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
          </el-form>
        </div>

        <button type="button" class="btn btn-primary btn-lg btn-block" @click="reserve">予約する</button>
      </div>
    </div>
  </div>
</template>

<script>
import { setupCalendar, Calendar} from 'v-calendar'
import 'v-calendar/lib/v-calendar.min.css';
import moment from 'moment';

export default {
  data() {
    return {
      isReserved: false,
      courses: [],
      number_of_people_options: [],
      times: [
        { label: '10:00' },
        { label: '10:30' },
        { label: '11:00' },
        { label: '11:30' },
      ],
      course_id: null,
      table_type_id: null,
      table_types: [],
      table_type: null,
      disabled_dates: {},
      calendar: {
        min: {
          year: null,
          month: null,
        },
        max: {
          year: null,
          month: null,
        }
      },
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
  props: ['username', 'restaurantId'],
  watch: {
    table_type() {
      this.createNumberOfPeopleOptions();
      this.fetchCalendarMonth();
    }
  },
  created() {
    let min = moment();
    this.calendar.min.year = parseInt(min.format('YYYY'));
    this.calendar.min.month = parseInt(min.format('M'));
    let max = moment().add(1, 'months');
    this.calendar.max.year = parseInt(max.format('YYYY'));
    this.calendar.max.month = parseInt(max.format('M'));
    console.table(this.calendar);
    this.fetchCourses();
  },
  methods: {
    fetchCourses() {
      let that = this;
      axios.get('/api/v1/courses', {params: {
        username: this.username
      }}).then(function(response) {
        that.courses = response.data.courses;
      })
    },
    fetchCalendarMonth() {
      let params = {
        date: moment().format('YYYY-MM'),
        table_type_id: this.table_type_id,
        username: this.username,
      }
      console.table(params);
      axios.get('/api/v1/reservations/schedules/months', {
        params: params
      }).then((response) => {
        this.disabled_dates = response.data.disabled_dates;
      })
    },
    reserve: function() {
      let timeArr = this.time.split(':');
      let datetime = moment(this.date).hour(timeArr[0]).minute(timeArr[1]).format('YYYY-MM-DD HH:mm');
      let params = {
        restaurant_id: this.restaurantId,
        course_id: this.course_id,
        datetime: datetime,
        number_of_people: this.number_of_people,
        name: this.form.name,
        email: this.form.email,
        tel: this.form.tel,
      };
      console.table(params);
      axios.post('/api/v1/reservations', params).then((response) => {
        this.isReserved = true;
      })
    },
    createNumberOfPeopleOptions() {
      for (let i = this.table_type.minimum_capacity; i <= this.table_type.max_capacity; i++) {
        this.number_of_people_options.push({ label: i + '人', value: i });
      }
    }
  }
}
</script>
