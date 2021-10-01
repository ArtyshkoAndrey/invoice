<template>
  <div>
    <h1>Invoice Company</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque debitis dolor eos error facere, fugiat
      hic in molestiae nisi, possimus quaerat reiciendis rem sed similique, sunt vero vitae! Ex fugiat minus nihil odit.
      Accusantium, debitis impedit ipsa, laboriosam molestiae mollitia nemo numquam, obcaecati porro quam quibusdam quis
      sed. Necessitatibus.</p>

    <div class="row">
      <div class="col-6">
        <img alt="" class="w-100 img-fluid" src="https://via.placeholder.com/1920x1080">
      </div>
      <div class="col-6">
        <img alt="" class="w-100 img-fluid" src="https://via.placeholder.com/1920x1080">
      </div>
    </div>

    <p class="mt-4">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet corporis deserunt dignissimos eos error est, ipsum
      iste molestias nemo provident quae quam quibusdam quisquam saepe veritatis? Consequuntur distinctio dolorum eius
      impedit, laudantium quidem veniam. Adipisci, animi autem debitis dicta dolore doloremque dolores eligendi fuga
      illum maxime mollitia nesciunt ut voluptatum! Aspernatur consectetur consequuntur error facilis fugit ipsam iure
      obcaecati perferendis, perspiciatis provident, repellendus sequi tempora voluptatibus? Delectus ipsam libero
      provident quod sequi? Accusantium architecto beatae dolores eius esse laborum, maiores, minima nobis officia
      praesentium quasi quibusdam quod similique sint suscipit ut vitae! Accusantium, aut autem beatae corporis deleniti
      dicta dignissimos dolores ducimus fuga fugit iure iusto labore libero minus necessitatibus odit officiis, quidem
      repellat saepe similique sit soluta veniam veritatis vero vitae? Blanditiis consectetur dicta dolores, eius
      eligendi enim esse eveniet excepturi optio perspiciatis quas quisquam quod ratione repudiandae similique vel
      veritatis voluptates? Dolores eius iusto laboriosam nulla odio quia repudiandae tempora! A accusantium architecto
      atque aut blanditiis cum deleniti dignissimos enim et ex excepturi fugiat labore libero mollitia nemo nulla,
      placeat quae quasi quibusdam quidem quod ratione repellendus saepe tempora tenetur vero voluptatem? Alias aliquam
      aliquid at corporis cumque explicabo iure laborum nam quae, quas rerum saepe sit ut.
    </p>
    <div class="row justify-content-center">
      <div v-for="i in 4" class="col-md-3 col-10 mt-5">
        <div aria-hidden="true" class="card">
          <img alt="..." class="card-img-top" src="https://via.placeholder.com/1920x1080">
          <div class="card-body">
            <h5 class="card-title placeholder-glow">
              <span class="placeholder col-6"></span>
            </h5>
            <p class="card-text placeholder-glow">
              <span class="placeholder col-7"></span>
              <span class="placeholder col-4"></span>
              <span class="placeholder col-4"></span>
              <span class="placeholder col-6"></span>
              <span class="placeholder col-8"></span>
            </p>
            <a class="btn btn-primary disabled placeholder col-6" href="#" tabindex="-1"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  middleware: 'auth',
  metaInfo() {
    return {title: 'Главная страница'}
  },
  scrollToTop: false,
  data: () => ({
    title: window.config.appName,
  }),
  mounted() {
    this.$root.$loading.finish()
  }
}
</script>

<style scoped>

</style>
