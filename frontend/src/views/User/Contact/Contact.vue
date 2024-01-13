<template>
  <div class="">
    <Header />
    <Banner />
    <section
      class="text-gray-600 body-font relative my-24 w-8/12 h-screen mx-auto"
    >
      <div class="absolute inset-0 bg-gray-300">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.9540705001914!2d106.67529017578471!3d10.73802338940844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fad0158a09f%3A0xfd0a6159277a3508!2zMTgwIMSQLiBDYW8gTOG7lywgUGjGsOG7nW5nIDQsIFF14bqtbiA4LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1703345978465!5m2!1svi!2s"
          width="100%"
          height="100%"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
      <div class="container px-5 py-24 mx-auto flex">
        <div
          class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md"
        >
          <h2 class="text-gray-900 font-medium title-font text-3xl mb-4">
            Liên hệ
          </h2>
          <p class="leading-relaxed mb-5 text-gray-600 border-b-2 border-black pb-3">
            Hãy liên hệ chúng tôi khi bạn cần
          </p>
          <div class="relative mb-4">
            <label for="email" class="leading-7 text-sm text-gray-600"
              >Email</label
            >
            <input
              type="email"
              id="email"
              value="trungdung123123123@gmail.com"
              name="email"
              disabled
              class="w-full bg-white rounded  text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
            />
          </div>
          <div class="relative mb-4">
            <label for="message" class="leading-7 text-sm text-gray-600"
              >Địa chỉ</label
            >
            <input
              type="email"
              id="email"
              value="123/123A Lê Hồng Phong, Phước Hải"
              name="email"
              disabled
              class="w-full bg-white rounded  text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
            />
          </div>
        </div>
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