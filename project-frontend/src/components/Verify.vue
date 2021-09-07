<template>
  <div>
    <input type="text" :placeholder="userEmail" disabled>
    <input type="password" v-model="form.password" placeholder="input your password">
    <button @click="finalStep">Finalize</button>
  </div>
</template>

<script>
export default {
  data() {
    return{
      form: {
        email: this.$route.params.email,
        password: '',
        token: this.$route.params.token,
      }
    }
  },
  computed: {
    userEmail(){
      return this.$route.params.email
    },
    token(){
      return this.$route.params.token
    }
  },
  methods: {
    finalStep(){
      console.log(this.form)
        this.axios.post('/verification', this.form)
          .then((res) => {
          })
    },
  }

}
</script>

<style scoped>

</style>