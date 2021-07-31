<template>
    <div>
        <input 
            type="text" 
            v-model="textToSearch"
            @keyup.enter="gotoAdvSearch()"
          placeholder="Cerca...">
         <button
              @click="$emit('textToSearch',{text:textToSearch}), $router.push('/advsearch')">
            Cerca 
        </button>
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
         return this.textToSearch;

    },
       
 
    }
}
</script>

<style lang="scss" scoped>

$boolblue: #04459e;

div {
    display: flex;
    input {
        border: none;
        border-bottom: 2px solid $boolblue;
        outline: none;
        color: $boolblue;
        width: 70%;
        margin: 0 0 0 10%;
        padding: 10px 20px;
        border-radius: 20px 0 0 20px;
    }
    button {
        width: 20%;
        margin: 0 10% 0 0;
        background-color: white;
        color: $boolblue;
        border: none;
        border-bottom: 2px solid $boolblue;
        font-weight: bold;
        border-radius: 0 20px 20px 0;
    }
}

</style>