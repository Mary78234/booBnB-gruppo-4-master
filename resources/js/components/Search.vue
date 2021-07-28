<template>
    <div>
        <input type="text" 
           v-model="textToSearch"
           placeholder="Cerca...">
          <button
           @click="$emit('textToSearch',{text:textToSearch}), resetText()"
          >Cerca</button>

    </div>
</template>

<script>
export default {
    name: 'Search',
    data(){
        return{
            textToSearch: ''
        }
    },
    methods:{
        resetText(){
         let reset = '';
         this.textToSearch = reset;
         return this.textToSearch 
  }
    }
}
</script>

<style>

</style>