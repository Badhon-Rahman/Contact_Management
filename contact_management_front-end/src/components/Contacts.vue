<template>
  <div class="">
    <h1>{{ users.name }}</h1>
    <h2>Contact List:</h2>

  </div>
</template>
Vue.prototype.$http = axios


new Vue({
  el: '#Contacts',
  data: {
    users: []
  },
  created() {
    var vm = this
    this.$http
      .get('http://127.0.0.1:8000/search/019')
      .then(function(response) {
        vm.users = response.data
      })
  }
})

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
