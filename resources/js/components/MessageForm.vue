<template>
    <div class="message-form">
        <div class="container mb-5">
          <h1 class="mb-3">Invia un messaggio</h1>
            <form>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1"
                        >Oggetto</label
                    >
                    <textarea
                        class="form-control"
                        id="exampleFormControlTextarea1"
                        rows="1"
                    ></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1"
                        >Messaggio</label
                    >
                    <textarea
                        class="form-control"
                        id="exampleFormControlTextarea1"
                        rows="5"
                    ></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input
                        type="email"
                        class="form-control"
                        id="exampleFormControlInput1"
                        placeholder="name@example.com"
                    />
                </div>
                <div class="form-group">
                  <button>Invia</button>
                </div>
                
                
                
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "MessageForm"
};
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
