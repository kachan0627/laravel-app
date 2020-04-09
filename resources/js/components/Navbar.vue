<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><router-link class="nav-link active" :to="{ name: 'home' }">ホーム</router-link></li>
            <li class="nav-item"><router-link class="nav-link active" :to="{ name: 'create' }">ツイート</router-link></li>
            <li class="nav-item"><router-link class="nav-link active" :to="{ name: 'search' }">ユーザ一覧</router-link></li>
            <li class="nav-item"><router-link class="nav-link active" :to="{ name: 'profile' }">プロフィール</router-link></li>
        </ul>
    </nav>
</template>
