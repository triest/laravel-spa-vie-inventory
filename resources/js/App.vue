<template>
  <div class="container">
    <ul>

    </ul>
    <button class="btn btn-primary" v-on:click="example()">Example</button>

    <div style="margin-left:30%;padding:1px 16px;height:1000px;">
      <router-view></router-view>
    </div>

  </div>
</template>

<script>

import {mapGetters} from 'vuex';
import {mapActions} from 'vuex';
export default {
    components:{

    },
    data() {
        return {
        }
    },
    computed : {

    },
    mounted() {

    },
    methods: {

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
