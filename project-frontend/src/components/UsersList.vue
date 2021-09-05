<template>
  <div>
    <b-row class="my-3">
      <b-col cols="8">
        <b-table
          :items="items"
          :fields="fields"
        >
        <template #cell(action)="data" >
          <b-button  v-if="data" class="btn btn-info" @click="submitData( data.item )"> Submit</b-button>
          <b-button  v-if="data" class="btn btn-warning">
<!--            <a href="http://localhost:8080/users/123" >edit</a>-->
            <router-link :to="{name: 'ProfileData', params: { user_id: data.item.id }}">Edit</router-link>
          </b-button>
          <b-button  v-if="data" class="btn btn-danger" @click="deleteData( data.item )"> Delete</b-button>
        </template>

        </b-table>
      </b-col>
    </b-row>
  </div>
</template>

<script>
export default {
  data(){
    return {
      todo: null,
      arr: [],
      fields: ['age', 'first_name', 'last_name', 'action'],
      items: [
        { isActive: true, id: 1, age: 40, first_name: 'Dickerson', last_name: 'Macdonald' },
        { isActive: false,id: 2,  age: 21, first_name: 'Larsen', last_name: 'Shaw' },
        { isActive: false,id: 3,  age: 89, first_name: 'Geneva', last_name: 'Wilson' },
        { isActive: true, id: 4, age: 38, first_name: 'Jami', last_name: 'Carney' }
      ]
    }
  },
  methods: {
    submitData(data){
      console.log(data)
    },
    changeData(data){
      this.$route
    },
    deleteData(data){
      console.log(data)
    }
  }
}
</script>

<style scoped>
*{
  margin: 0;
  box-sizing: border-box;
}
</style>
