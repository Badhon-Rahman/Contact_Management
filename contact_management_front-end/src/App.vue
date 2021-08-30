<template>
Vue.prototype.$axios = axios
  {{name}}
</template>

<script>

export default {
  name: 'App',
  components: {
    
  },
  data(){
    return {
      name: null

    };
  },
  mounted () {
    this.$axios
      .get('http://127.0.0.1:8000/search/019')
      .then(response => (this.name = response))
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
