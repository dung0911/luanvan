<template>
  <div class="">
    <Header />
    <Banner />
    <section class="text-gray-600 body-font relative my-24 w-8/12 h-screen mx-auto">
      <div class="absolute inset-0 bg-gray-300">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.9540705001914!2d106.67529017578471!3d10.73802338940844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fad0158a09f%3A0xfd0a6159277a3508!2zMTgwIMSQLiBDYW8gTOG7lywgUGjGsOG7nW5nIDQsIFF14bqtbiA4LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1703345978465!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </section>
    <!-- Footer -->
    <Footer />
    <!-- End Footer -->
  </div>
</template>
    
    <script>
import Footer from "../../../components/User/HomePage/Footer.vue";
import Header from "../../../components/User/HomePage/Header.vue";
import Banner from "../../../components/User/HomePage/Banner.vue";
export default {
  name: "ContactViewPage",
  data() {
    return {};
  },
  components: {
    Footer,
    Header,
    Banner,
  },
  methods: {},
};
</script>
    
    <style>
</style>