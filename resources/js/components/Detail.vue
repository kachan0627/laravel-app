<template>
    <div>
        <div class="card" v-if="item">
            <div v-if="updated" class="alert alert-primary" role="alert">
                更新しました
            </div>
            <div class="card-body">
                <div v-if="!editFlg">
                    <h1 class="card-title">{{item.title}}</h1>
                    <div class="card-text">{{item.content}}</div>
                </div>
                <form v-else>
                    <div class="form-group">
                        <input type="text" name="title" id="TopicTitle" class="form-control" v-model="item.title">
                    </div>
                    <div class="form-group">
                        <textarea name="content" id="TopicContent" class="form-control" v-model="item.content"></textarea>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <time>{{item.date}}</time>
                <button class="btn btn-light text-right" v-if="!editFlg" @click="(editFlg = true)">編集</button>
                <button class="btn btn-light text-right" v-else @click="onUpdate">更新</button>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    data: function( ) {
        return {
            item: null,
            editFlg: false,
            updated: false,
        }
    },
    mounted: function() {
        this.getItem();
    },
    methods: {
        getItem: function() {
            axios.get('/api/topics/' + this.$route.params.id)
            .then( ( res ) => {
                this.item = res.data.data;
            });
        },
        onUpdate: function() {
            axios.put('/api/topics/' + this.item.id, {
                title: this.item.title,
                content: this.item.content
            })
            .then( (res) => {
                this.editFlg = false;
                this.updated = true;
                console.log('update')
            });
        }
    }
}
</script>

<style lang="css">
.card-text {
    white-space: pre-wrap;
}
</style>
