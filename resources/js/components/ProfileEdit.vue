<template>
  <div class="container">
    <p>{{msg}}</p>
    <hr>
    <div v-if="saved" class="alert alert-primary" role="alert">
    保存しました
    </div>
    <form>
        <div class="profile-group">
            <label for="TopicContent">自己紹介</label>
            <textarea class="form-control" id="introduction" rows="3" v-model="introduction"></textarea>
            <label for="TopicContent">出身地</label>
            <textarea class="form-control" id="place" rows="1" v-model="place"></textarea>
            <label for="TopicContent">誕生日</label>
            <input type="hidden" name="birthday_date" v-model="birthday.date" />
            <input type="text" v-model="birthday.year" />
            <select v-model="birthday.month">
                <option v-for="month of 12":key="month" v-bind:value="month">{{ month }}</option>
            </select>
            <select v-model="birthday_day">
              <option v-for="day of 31":key="day" v-bind:value="day">{{ day }}</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" @click.prevent="create">ツイートする</button>
    </form>
  </div>
</template>

<script>
const axios = require('axios');
export default {
  mounted() {
    //this.getItems();
    axios.get('/tweets/login_id').then(response =>{
      this.login_id = response.data;
      this.msg= 'get user data!';
    });
  },
    data: function() {
        return {
            birthday: {
              date: '',
              year: '',
              month: '',
              day: ''
            },
            saved: false,
            introduction: '',
            place:'',
            msg: 'wait...',
            login_id:0,
        }
    },
    methods: {
        create : function() {
          const data ={
            user_id: this.login_id,
            introduction: this.introduction,
            place: this.place,
            birthday: this.birthday.year-this.birthday.month-this.birthday.day,
          };
          alert(this.login_id);
          alert(data.birthday);
            /*axios.post('/tweets/profile_update', data)
            .then(response => {
                this.text = '';
                this.saved = true;
                console.log('created');
            });*/
        }

    }
}
</script>
