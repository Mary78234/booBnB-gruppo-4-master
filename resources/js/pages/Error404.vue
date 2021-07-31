<template>
  <main>
    <section class="error">
    <div class="error-container text-center">
      <h3>Errore 404!</h3>
      <h4>Pagina Non Trovata</h4>
      <a href="">Torna alla Home</a>
    </div>


  </section>
  </main>
</template>

<script>
export default {
    name: 'Error404'
}
</script>

<style lang="scss" scoped>

 

section.error{
  background-color: rgb(255, 255, 255);
  min-height: 100vh;
  display:flex;
  justify-content: center;
  align-items: center;
  .error-container{
    border: 3px solid #04449e94;
    padding: 20px;
    border-radius: 10px;
    color: #04459e;
    h3{
      font-size: 2rem;
    }
  }

}
</style>