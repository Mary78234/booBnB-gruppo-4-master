<template>
    <div>
        <input type="text" 
           v-model="textToSearch"
           placeholder="Cerca...">
          <button
           @click="$emit('textToSearch',{text:textToSearch})"
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
    }
}
</script>

<style>

</style>