<template>
  <div class="container">
    <p>ユーザ一覧</p>
    <p>{{msg}}</p>
    <hr>

      <div v-for="(User,key) in reverseusers">
        <p>ユーザID: {{User.id}} @{{User.acount_name}} <br/>ニックネーム{{User.nick_name}}</p>
        <hr>
      </div>

  </div>
</template>

<script>
const axios = require('axios');
export default{
  mounted() {
    //this.getItems();
    axios.get('/tweets/User_json').then(response =>{
      this.users = response.data;
      this.msg= 'get data!';
    });
  },
  data:function(){
    return{
      msg:'wait...',
      name:'',
      users:[],
    };
  },
  computed:{
    reverseusers(){
      return this.users.slice().reverse();
    }
  },
}
</script>
