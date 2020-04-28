<template>
  <div class="container">
    <p>{{msg}}</p>
    <hr>
    <ul>
      <li v-for="(Tweet,key) in reversetweets">
        <p>ツイートID: {{Tweet.id}} ユーザーID{{Tweet.user_id}}</p>本文<div style="padding:10px;margin-bottom:10px;border:1px solid #333333;border-radius:10px;" v-html="Tweet.text.replace(/\n/g,'<br/>')"></div>
        <hr>
      </li>
    </ul>
  </div>
</template>

<script>

//インポート先で使用出来る関数をオブジェクトとしてまとめたもの
const axios = require('axios');

export default {
  mounted() {
    //this.getItems();
    axios.get('/tweets/tweet_json').then(response =>{
      this.tweets = response.data;
      this.msg= 'get data!';
    });
  },
  data: function() {
    return {
      msg:'wait...',
      name:'',
      tweets:[],
      Replacetext:[],

    }
  },
  methods: {

    doAction: function(){
      this.msg='Hello, ' + this.name + '!!!';
      //console.log(this.tweets);
    },



  },
  computed:{
    reversetweets(){
      //return this.tweets.slice().reverse();
      return this.tweets.slice().reverse();
    }
  },
}
</script>
