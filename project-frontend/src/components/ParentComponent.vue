<template>
  <div>
<!--    <b-row>-->
<!--      <b-col-->
<!--        cols="6"-->
<!--        class="d-flex"-->
<!--      >-->
<!--        <h1>Hey {{ name }}</h1>-->
<!--        <child-component-->
<!--          :msg="msg"-->
<!--          @getMessage="showResult"-->
<!--        />-->
<!--      </b-col>-->
<!--      <b-col cols="6">-->
<!--        <input type="text" v-model="user.name" placeholder="User Name">-->
<!--        <input type="text" v-model="user.surname" placeholder="User Surname">-->
<!--        <input type="text" v-model="user.email" placeholder="User Email">-->
<!--        <input type="text" v-model="user.age" placeholder="User age">-->
<!--        <button v-on:submit.prevent="getData">Show Result</button>-->
<!--      </b-col>-->
<!--    </b-row>-->


<!--&lt;!&ndash;    <input type="text" v-model="inputValue">&ndash;&gt;-->

<!--    <br>-->
<!--  {{newValue}}-->
  <todo-list/>
  </div>
</template>

<script>
import ChildComponent from "./ChildComponent";
import TodoList from "./UsersList";
export default {
  components: { ChildComponent, TodoList },
  data() {
    return{
      name: "Armen",
      msg: 'Hello from parent',
      inputValue: null,
      user: {
        name: null,
        surname: null,
        email: null,
        age: null
      },
      newValue: null,
    }
  },
  methods: {
     showResult(arg){
       console.log(arg)
     },
    getData(){
       console.log(this.user)
    }
  },
  watch: {
    inputValue: function(newValue) {
      console.log('new', newValue)
      console.log('old', oldValue)
    }
  },
  created() {
    fetch('https://jsonplaceholder.typicode.com/todos/1')
      .then(response => response.json())
      .then(json => {
        console.log(json)
        this.newValue =  json;
      })
  },
  mounted() {
  },
}
</script>

<style scoped >
</style>
