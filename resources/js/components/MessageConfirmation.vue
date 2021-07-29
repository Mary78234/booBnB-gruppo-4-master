<template>
  
  <section class="message-confirmation">
    
    <div class="message-box">
      <div class="message-top text-center">
        <h1>Messaggio Inviato Correttamente!</h1>
      </div>
      <div class="message-bottom">
         <div class="circle-wrapper">
            <div class="success circle"></div>
            <div class="icon">
              <i class="far fa-thumbs-up"></i>
              
            </div>
         </div>
      </div>
    </div>
    
  </section>
</template>

<script>
export default {
  name: 'MessageConfirmation'

}
</script>

<style lang="scss" scoped>


.message-confirmation{
  height: 100vh;
  background: white;
  display:flex;
  justify-content: center;
  align-items: center;
  h1{
    color: #04449e;
  }
  .message-bottom{
    display:flex;
    justify-content: center;
    align-items: center;
  }
}

.circle-wrapper {
  position: relative;
  width: 100px;
  height: 100px;
  margin: 10px;
}

.icon {
  position:absolute;
  color: rgb(255, 255, 255);
  font-size: 55px;
  top: 49px;
  left: 53px;
  transform: translate(-50%, -50%);
}

.circle {
  display: block;
  width: 100%;
  height: 100%;
  border-radius: 50%;
  padding: 2.5px;
  background-clip: content-box;
  animation: spin 10s linear infinite;
}
 
.circle-wrapper:active .circle {
  animation: spin 2s linear infinite;
}

.success {
  background-color: #04449e;
  border: 2.5px dashed #04449e;
}

@keyframes spin { 
  100% { 
    transform: rotateZ(360deg);
  }
}


</style>