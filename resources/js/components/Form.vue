<template>
    <div class="container">
      <p>{{msg}}</p>
      <hr>
        <div v-if="saved" class="alert alert-primary" role="alert">
        保存しました
        </div>
        <form>
            <div class="form-group">
                <label for="TopicContent">ツイート</label>
                <textarea class="form-control" name="tweet" id="tweet" rows="3" v-model="text"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="create" @click.prevent="create">ツイートする</button>
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
            saved: false,
            text: '',
            msg: 'wait...',
            login_id:0,
        }
    },
    methods: {
        create : function() {
          const data ={
            user_id: this.login_id,
            text: this.text,
          };
          //alert(this.login_id);
          //alert(this.text);
            axios.post('/tweets/tweet_post_json', data)
            .then(response => {
                this.text = '';
                this.saved = true;
                console.log('created');
            });
        }

    }
}
</script>
