<template>
  <main>

    <Loader />

    <section>
      <div class="contenedor-risultati">
        <div class="content-house-resultati row ">
          <div class="left-risultati col-sm-12 col-md-12 col-lg-6">
            <div class="risultati">
              <ul>
                <li class="row">
                  <img class="col-sm-12 col-md-6 col-lg-4" src="https://via.placeholder.com/300" alt="">
                  <div class="col-sm-12 col-md-12 col-lg-8 description">
                    <h3>Titolo</h3>
                    <p class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati laboriosam cupiditate voluptatem, ad ab ex consequuntur ut facere soluta quibusdam voluptates laudantium maxime ullam assumenda? Iusto id, nobis labore accusamus eum asperiores? Vitae iste dicta natus optio quia veritatis quasi laboriosam, qui nobis modi rerum nemo praesentium eius suscipit fugiat.</p>
                  </div>
                </li>
                <li class="row">
                  <img class="col-sm-12 col-md-6 col-lg-4" src="https://via.placeholder.com/300" alt="">
                  <div class="col-sm-12 col-md-12 col-lg-8 description">
                    <h3>Titolo</h3>
                    <p class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati laboriosam cupiditate voluptatem, ad ab ex consequuntur ut facere soluta quibusdam voluptates laudantium maxime ullam assumenda? Iusto id, nobis labore accusamus eum asperiores? Vitae iste dicta natus optio quia veritatis quasi laboriosam, qui nobis modi rerum nemo praesentium eius suscipit fugiat.</p>
                  </div>
                </li>
                <li class="row">
                  <img class="col-sm-12 col-md-6 col-lg-4" src="https://via.placeholder.com/300" alt="">
                  <div class="col-sm-12 col-md-12 col-lg-8 description">
                    <h3>Titolo</h3>
                    <p class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati laboriosam cupiditate voluptatem, ad ab ex consequuntur ut facere soluta quibusdam voluptates laudantium maxime ullam assumenda? Iusto id, nobis labore accusamus eum asperiores? Vitae iste dicta natus optio quia veritatis quasi laboriosam, qui nobis modi rerum nemo praesentium eius suscipit fugiat.</p>
                  </div>
                </li>
                <li class="row">
                  <img class="col-sm-12 col-md-6 col-lg-4" src="https://via.placeholder.com/300" alt="">
                  <div class="col-sm-12 col-md-12 col-lg-8 description">
                    <h3>Titolo</h3>
                    <p class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati laboriosam cupiditate voluptatem, ad ab ex consequuntur ut facere soluta quibusdam voluptates laudantium maxime ullam assumenda? Iusto id, nobis labore accusamus eum asperiores? Vitae iste dicta natus optio quia veritatis quasi laboriosam, qui nobis modi rerum nemo praesentium eius suscipit fugiat.</p>
                  </div>
                </li>
                <li class="row">
                  <img class="col-sm-12 col-md-6 col-lg-4" src="https://via.placeholder.com/300" alt="">
                  <div class="col-sm-12 col-md-12 col-lg-8 description">
                    <h3>Titolo</h3>
                    <p class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati laboriosam cupiditate voluptatem, ad ab ex consequuntur ut facere soluta quibusdam voluptates laudantium maxime ullam assumenda? Iusto id, nobis labore accusamus eum asperiores? Vitae iste dicta natus optio quia veritatis quasi laboriosam, qui nobis modi rerum nemo praesentium eius suscipit fugiat.</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <div class="right col-sm-12 col-md-12 col-lg-6">
            <img class="img-fluid" src="https://via.placeholder.com/600x400" alt="">
          </div>
        </div>
      </div>
    </section>

  </main>
</template>

<script>
import Loader from '../components/Loader.vue';

export default {
  name: 'Results',
  components: {
    Loader
  }
}
</script>

<style lang="scss" scoped>
 .contenedor-risultati{
   width: 100%;
   margin-top: 15px;
    .content-house-resultati{
      margin: 0;
      .left-risultati{
        padding: 20px 30px;
        margin-top: 30px;
        .risultati{
          width: 100%;
          margin-bottom: 30px;
          ul{
            list-style: none;
            li{
              width: 100%;
              margin-bottom: 10px;
              img{
                max-width: 300px;
                min-width: 247px;
                
                margin-bottom: 30px;
              }
              div{
                p{
                  text-align: justify;
                }
              }
            }
          }
        }
      }
      .right{
        padding: 20px 60px;
        margin-top: 30px;
        text-align: center;
      }
    }
  }

  @media (min-width: 998px) and (max-width: 1219px){
    .description{
      width: 450px;
    }
  }
   @media (min-width: 1219px) and (max-width: 1677px){
    .description{
      width: 580px;
    }
  }
</style>