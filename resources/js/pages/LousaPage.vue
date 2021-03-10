<template>
    <section>
      <div class="row d-flex align-items-center">
          <div class="col-sm-12 col-md-8 text-end">
            <h2>Lousa virtual </h2>
            <p>A lousa virtual permite que você faça interações online de uma forma fácil, criativa e com bastante interação.</p>
          </div>
          <div class="col-sm-12 col-md-4">
            <img class="img-lousa" :src="img" alt="">
          </div>
      </div>
      <hr>
      <div class="row d-flex align-items-center">
          <div class="col-sm-12 col-md-8 text-end">
            <p><strong>Quer seu próprio espaço de interação?</strong></p>
          </div>
          <div class="col-sm-12 col-md-4">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#LousaModal">Criar nova lousa</button>
          </div>
      </div>
      <div class="row d-flex align-items-center pt-5">
        <h2> Suas lousas</h2>
      </div>

    </section>
</template>

<script>
  export default {
      name:"lousas",
      data(){
        return {
          img:'/img/undraw.co/undraw_professor_8lrt.png',
        }
      },
  }
</script>

<style scoped>
  .img-lousa{
      width: 400px;
  }
</style>