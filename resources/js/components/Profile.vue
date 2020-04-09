<template>
  <div class="container">
    <p>プロフィール表示</p>
    <p>{{msg}}</p>
    <p>{{msg_p}}</p>
    <hr>
    <p>ユーザー名　{{login_data.nick_name}}</p>
    <p>自己紹介　{{profile.introduction}}</p>
    <p>出身地　{{profile.place}}</p>
    <p>誕生日　{{profile.birthday}}</p>
    <router-link class="nav-link active" :to="{ name: 'profileEdit' }">プロフィールを編集する</router-link>
  </div>
</template>
<script>
const axios = require('axios');
export default {
  mounted() {
    //this.getItems();
    axios.get('/tweets/login_user').then(response =>{
      this.login_data = response.data;
      this.msg= 'get user data!';
      //alert(this.login_data.id);

      var id = this.login_data.id;
      axios.get('/tweets/profile_json/'+id).then(response=>{
        this.profile =response.data;
        this.msg_p = 'get profile';
        //alert(this.profile.introduction);
      });
    });
  },
    data: function() {
        return {
            saved: false,
            text: '',
            msg: 'wait...',
            msg_p: 'wait...',
            login_data:null,
            profile:null,
        }
    }
  }
</script>
