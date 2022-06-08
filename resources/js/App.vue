<template>
  <div class="container">
    <div style="padding:1px 16px;height:1000px;">
      <button v-if="authUser !== null" v-on:click="logout()" class="btn btn-success">Logout</button>
      <router-view></router-view>
    </div>

  </div>
</template>

<script>

import {mapGetters} from 'vuex';
import {mapActions} from 'vuex';

export default {
    components: {},
    data() {
        return {
            authUser: window.authUser
        }
    },
    created() {
        console.log(this.authUser);
        this.redirectNotLogin();
    },
    computed: {},
    mounted() {

    },
    methods: {
        redirectNotLogin() {
            if (this.authUser === null) {
                this.$router.push('login')
            }
        },
        logout() {
            axios.get('api/user/logout')
            window.authUser = null
            this.$router.reload
        }
    }
}
</script>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: auto;
    background-color: #f1f1f1;
    position: fixed;
    /*  height: 100%;*/
    margin-top: 5%;
    margin-left: 10%;
    overflow: auto;
}

li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}

li a.active {
    background-color: #04AA6D;
    color: white;
}

li a:hover:not(.active) {
    background-color: #555;
    color: white;
}
</style>
