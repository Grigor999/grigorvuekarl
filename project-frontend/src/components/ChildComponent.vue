<template>
  <div>
  <p>I'm a child</p>
    <small v-if="msg"> {{ msg }}</small>

<!--    <small v-show="msg"> {{ msg }}</small>-->
    <button v-on:click="sendToParent">Go</button>
  </div>
</template>

<script>
export default {
  props: {
    msg: {
        type: String,
        default: null
    }
  },
  methods: {
      sendToParent(){

          this.$emit('getMessage', 'data from child')
      }
  }
}
</script>

<style scoped>

</style>
