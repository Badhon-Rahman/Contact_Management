<template>
  <hr>
  <hr>
  <div>
    <input type="text" v-model="searchValue.searchParam">
    <button @click="getSearchValues = getSearchData(searchValue.searchParam)">Search</button>
  </div>
  <hr>
  <hr>
  <h2 v-if="getSearchValues == null">No data to show by search</h2>
  <div v-else-if="getSearchValues?.length > 0">
    <h2>Filtered Data:</h2> 
    <div v-for="(contact, index) in getSearchValues" :key="contact">
        <h6>Sl: {{index + 1}} </h6>
        <h6>Name: {{contact.name}}</h6>
        <h6>Email 1: {{contact.email_1}}</h6>
        <h6>Email 2: {{contact.email_2}}</h6>
        <h6>Mobile 1: {{contact.mobile_1}}</h6>
        <h6>Mobile 2: {{contact.mobile_2}}</h6>
        <h6>Group Name: {{contact.groupName}}</h6>
        <h6>Is Favorite: {{contact.isFavorite}}</h6>
        <br>
    </div>
  </div>
  <h2 v-else-if="getSearchValues && getSearchValues?.length == 0">No data to show by search</h2>
  <Contact />
</template>

<script>
import Contact from './components/Contacts.vue';
import axios from 'axios';


export default {
  name: 'App',
  components: {
    Contact
  },
  data(){
  
    return {
      getSearchValues: [],
      searchValue:{
        searchParam: ''
      }
    }
  },
  methods:{
    getSearchData(searchParam){
      axios.get('http://127.0.0.1:8000/api/search/'+searchParam)
        .then((response) => {
          this.getSearchValues = response.data;
          console.log(response.data);
          return this.getSearchValues;
        })
        .catch((error) => {
          console.log(error)
        })
    }

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
