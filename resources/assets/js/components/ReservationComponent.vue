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
              :label="item.id">{{ item.course_name }} ( {{ item.duration_minutes }}分 {{ item.price }}円 )</el-radio>
          </label>
        </div>
      </div>

      <div v-if="this.course_id != null">
        <div>
          <div>
            <h6 class="border-bottom pt-2 pb-2"><b>予約日時/人数を選択してください</b></h6>
          </div>
          <div class="p-2">
            <v-date-picker
              mode='single'
              v-model='date'
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
      course_id: null,
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
  created() {
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
    }
  }
}
</script>
