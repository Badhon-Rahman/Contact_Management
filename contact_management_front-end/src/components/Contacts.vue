<template>
  <form @submit.prevent="CreateContact">
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
        <option value="1">GroupA</option>
        <option value="2">GroupB</option>
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
  csrfToken: '',
  name: 'Contacts',
  data(){
    return {
      formValues:{
        name: '',
        email_1:'',
        email_2:'',
        mobile_1:'',
        mobile_2:'',
        password:'',
        group_id: null,
        is_active:false
      }

    }
  },
   methods:{
    CreateContact(){
      //this.formValues._token = this.csrfToken;
      // console.log("tkn:" + this.formValues.token);
      // console.log(this.formValues);
      // const headers = { 
      //    //Authorization:this.csrfToken,
      //    'X-Requested-With': XMLHttpRequest
      // };
     fetch('http://127.0.0.1:8000/api/add-user-contact',this.formValues).then((response) => {
          //console.log(response.data);
          console.log(response);
        })
        .catch((error) => {
          console.log(error)
        })
    }
  },
  beforeMount() {
        axios.get('http://127.0.0.1:8000/api/token').then((response) => {
          this.csrfToken = response.data;
        })
        .catch((error) => {
          console.log(error)
        })
  },
}
</script>

<style>

</style>
