<template>
    <div class="message-form">
        <div class="container mb-5">
            <h3 style="color:lightgreen;" v-if="sendMessage">Il messaggio è stato inviato</h3>
          <h1 class="mb-3">Invia un messaggio</h1>
          <a id="top"></a>
            <form v-on:submit.prevent="onSubmit" method="POST" @submit="handleSubmit()"> 
                
                <!-- id di riferimento -->
                <input type="hidden" name="house_id" id="house_id" :value="house_id">
                <div class="form-group">


                        <!-- messages.title -->
                    <label for="title"
                        >Oggetto</label>
                        
                    <input
                        class="form-control"
                        id="title" v-model="messTitle" name="title" 
                        >
                </div>
                <div class="form-group">
                        <!-- messages.mail -->
                    <label for="mail">Email address</label>
                    <input
                        v-model="messMail"
                        type="email"
                        class="form-control"
                        name="mail"
                        id="mail"
                        placeholder="name@example.com"
                    />
                </div>
                        <!-- messages.content -->
                        
                <div class="form-group">
                    <label for="content"
                        >Messaggio</label
                    >
                    <textarea
                        v-model="messContent"
                        class="form-control"
                        id="content"
                        name="content"
                        rows="5"
                    ></textarea>
                </div>
                <h1>{{id}}</h1>
                <div class="form-group">
                  <button type="submit">Invia</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: "MessageForm",
    data(){
        return{
           
            messTitle: '',
            messContent: '',
            messMail: '',
            sendMessage: false
        }
    },
    props:{
    house_id: Number
    },
    methods:{
        handleSubmit(){
            console.log(this.messTitle, this.messContent, this.messMail, this.house_id);
            let payload =  { 
                house_id : this.house_id,
                mail: this.messMail,
                title: this.messTitle,
                content: this.messContent
            };
            axios.post('/api/messages', payload)
                
                .then(res => {
                    console.log(res)
                    this.sendMessage= true;
                    this.messTitle= '';
                    this.messContent= '';
                    this.messMail= '';
                    console.log('messaggio inviato')
                    

                })
                .catch(err => {
                    console.error(err);
                })
              
        },
       
            

    },
    mounted(){
    
       
    }

}


</script>

<style lang="scss" scoped>

.message-form{
  min-height: 500px;
  button{
  background-color: rgb(71, 71, 192);
  font-size: 15px;
  background-color: rgb(71, 71, 192);
  border-radius: 10px;
  color: white;
  padding: 10px 20px;
  border: none;
}
}


</style>
