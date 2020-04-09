<template>
  <div class="container">
    <p>ログアウトしますか？</p>
    <hr>
      <button type="submit" class="btn btn-primary" @click.prevent="logout">ログアウトする</button>
  </div>
</template>

<script>
const axios = require('axios');
export default{
  methods: {
    logout: function(){
      axios.get('/tweets/logout');
    }
  },
}
</script>
