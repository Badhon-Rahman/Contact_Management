<template>
  <form @submit.prevent="CreateContact">
     <input type="text" :value="formValues.csrfToken" name="_token"/>
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
  
  name: 'Contacts',
  data(){
    return {
      formValues:{
        csrfToken: document.querySelector('meta[name="csrf-token"]').content,
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
      console.log(this.formValues);
      axios.post('http://127.0.0.1:8000/api/add-user-contact',this.formValues).then((response) => {
          console.log(response.data);
          return response.data;
        })
        .catch((error) => {
          console.log(error)
        })
    },
    // submitForm(event){
    //   event.preventDefault(),
    //   console.log("Contact obj:", this.formValues);
    // }

  },
  created() {
        this.csrfToken = document.querySelector('meta[name="csrf-token"]').content
  },
}
</script>

<style>

</style>
