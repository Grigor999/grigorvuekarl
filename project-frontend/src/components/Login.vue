<template>
  <div>
    <input type="text" v-model="user.email">
    <input type="text" v-model="user.password">
    <input type="text" v-model="user.name">
    <b-button class="btn btn-submit" @click="registerUser">Login</b-button>
  </div>
</template>

<script>
export default {
  data(){
    return {
      user: {
        name: 'Anun',
        email: 'email@gmail.com',
        password: '123456798'
      }
    }
  },
  methods: {
    loginUser() {
      this.axios.post('/login', this.user)
      .then(response => {
          console.log(response)
      }).catch(error => {
        console.log(error);
      })
    },
    // registerUser() {
    //   this.axios.post('/register', this.user)
    //     .then(response => {
    //       console.log(response)
    //     }).catch(error => {
    //     console.log(error);
    //   })
    // }
  }
}
</script>

<style scoped>

</style>
