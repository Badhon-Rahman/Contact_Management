<template>
    <hr>
  <pre>
    <div>{{JSON.stringify(formValues, null, 2)}}</div>
  </pre>
  
  <hr>
  <hr>
  <div>
    <label for="search"> : </label>
    <input type="text" v-model="formValues.search">
    <button @click="getSearchData()">Search</button>
  </div>
  <hr>
  <hr>
  <form @submit="submitForm">
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
      <label for="is_active">Is_Active?</label>
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
      formValues:{
        search: '',
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
    getSearchData(){
      axios.get('http://localhost/Assassment/Contact_Management_System_BackEnd/public/search/0177')
        .then((response) => {
          console.log(response);
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
