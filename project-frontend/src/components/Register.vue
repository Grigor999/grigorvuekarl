<template>
  <div>
    <input type="text" v-model="user.email">
    <input type="text" v-model="user.password">
    <input type="text" v-model="user.name">
    <input type="text" v-model="user.phone">
    <input type="text" v-model="user.address">
    <!-- <input type="text" v-model="user.image"> -->
    <b-button class="btn btn-submit" @click="register">REGISTER</b-button>
  </div>
</template>

<script>
export default {
  data(){
    return {
      user: {
        name: 'Anun',
        email: 'email@gmail.com',
        password: '123456798',
        phone: 'Samsung',
        address: 'Erevan',
        // image: 'sdjkfbgdjkfbg',
      }
    }
  },
  methods: {
    register() {
      this.axios.post('/register', this.user)
        .then(response => {
          console.log(response)
        }).catch(error => {
        console.log(error);
      })
    }
  }
}
</script>

<style scoped>

</style>
