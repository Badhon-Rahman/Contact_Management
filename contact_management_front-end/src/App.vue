<template>
  <hr>
  <hr>
  <div>
    <input type="text" v-model="searchValue.searchParam">
    <button @click="getSearchValues = getSearchData(searchValue.searchParam)">Search</button>
  </div>
  <hr>
  <hr>
  <div v-if="getSearchValues?.length > 0">
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

  <form @submit="submitForm">
    <hr>
    <h2>Create Contact:</h2>
    <div>
      <label for="name">Name : </label>
      <input type="text" v-model="formValues.name">
    </div>
    <br>
    <div>
      <label for="email_1">Email_1 : </label>
      <input type="text" v-model="formValues.email_1">
    </div>
    <br>
    <div>
      <label for="email_2">Email_2 : </label>
      <input type="text" v-model="formValues.email_2">
    </div>
    <br>
    <div>
      <label for="mobile_1">Mobile_1 : </label>
      <input type="text" v-model="formValues.mobile_1">
    </div>
    <br>
    <div>
      <label for="mobile_2">Mobile_2 : </label>
      <input type="text" v-model="formValues.mobile_2">
    </div>
    <br>
    <div>
      <label for="password">Password : </label>
      <input type="text" v-model="formValues.password">
    </div>
    <br>
    <div>
      <label for="group_id">Group:</label>
      <select id="group_id" v-model="formValues.group_id">
        <option value="">Select One</option>
        <option value="GroupA">GroupA</option>
        <option value="GroupB">GroupB</option>
      </select>
    </div>
    <div>
      <input type="checkbox" id="is_active" v-model="formValues.is_active">
      <label for="is_active">Is Favorite?</label>
    </div>
    <hr>
    <div><button>Submit</button></div>
  </form>
</template>

<script>
import axios from 'axios';


export default {
  name: 'App',
  components: {
    
  },
  data(){
  
    return {
      getSearchValues: [],
      searchValue:{
        searchParam: ''
      },
      formValues:{
        name: '',
        email_1:'',
        email_2:'',
        mobile_1:'',
        mobile_2:'',
        password:'',
        group_id:'',
        is_active:false

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
    },
    submitForm(event){
      event.preventDefault(),
      console.log("Contact obj:", this.formValues);
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
