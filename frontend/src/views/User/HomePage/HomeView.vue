<template>
  <div class="">
    <Header />

    <!-- Banner -->
    <div class="">
      <swiper
        :loop="true"
        :autoplay="{
          delay: 3000,
          disableOnInteraction: false,
        }"
        :modules="modules"
        class="mySwiper"
      >
        <!-- <Banner header="Summer 2023" desc="New Arrival Collection" /> -->
        <swiper-slide v-for="i in banners" :key="i">
          <div class="relative">
            <img :src="getImageUrl(i.photo)" class="w-full" style="height: 500px;" alt="" />
            <div class="absolute top-1/2" style="left: 20%">
              <!-- <h1 class="lg:text-2xl text-xl font-semibold uppercase mb-2" v-html="i.title">
              </h1> -->
              <!-- <p class="lg:text-6xl text-4xl mb-4 font-bold"  v-html="i.description">
              </p> -->
              <router-link
                to="/shop"
                class="w-full bg-green-500 text-white rounded-md px-4 py-2 hover:bg-green-700 focus:outline-none focus:shadow-outline-green active:bg-green-800"
              >
                Mua hàng ngay
              </router-link>
            </div>
          </div>
        </swiper-slide>
      </swiper>
    </div>
    <!-- End Banner -->

    <!-- Categories -->
    <!-- End Categories -->

    <!-- Recommends -->
    <!-- End Recommends -->

    <!-- advertisement -->
    <!-- End advertisement -->

    <!-- Feature items -->
    <div class="text-center lg:my-24 my-12" data-aos="fade-down" data-aos-duration="1000" data-aos-delay='300'>
      <h1 class="font-bold text-4xl mb-4">Sản phẩm</h1>
      <p class="italic text-sm mb-12">
        Làm nhiều hơn những gì làm cho bạn hạnh phúc
      </p>
      <div class="mx-auto w-8/12">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10">
          <Product v-for="page in products.slice(0, 8)" :key="page.id" :blogData="page" />
        </div>
      </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-10 w-8/12 mx-auto mb-24" data-aos="fade-down"
        data-aos-duration="1500"
        data-aos-delay="500">
      <div
        class="h-56 bg-cover bg-no-repeat flex justify-center items-center"
        style="
          background-image: url('https://demo-kalles-4-1.myshopify.com/cdn/shop/files/5_2022-03-02.jpg?v=1652057918&width=600');
        "
      >
        <div class="text-center text-white">
          <h1 class="text-2xl">Quần áo</h1>
          <P>Yêu từ cái nhìn đầu tiên</P>
        </div>
      </div>
      <div
        class="h-56 bg-cover bg-no-repeat flex justify-center items-center"
        style="
          background-image: url('https://demo-kalles-4-1.myshopify.com/cdn/shop/files/5_2022-03-02.jpg?v=1652057918&width=600');
        "
      >
        <div class="text-center text-white">
          <h1 class="text-2xl">Trang phục</h1>
          <P>Quyết tâm làm đẹp</P>
        </div>
      </div>
    </div>
    <!-- End Feature items -->
    <div
      class="bg-no-repeat w-full"
      style="
        background-image: url('https://elessi2.myshopify.com/cdn/shop/files/Banner_04_1950x.jpg?v=1623213221');
      "
    >
      <div class="py-24 lg:pl-96 border pl-12">
        <p class="text-md">Thiết kế mới</p>
        <h2 class="text-4xl leading-tight">
          Giảm giá<span class="text-cyan-400"> lên tới 50%</span> <br />
          Tất cả loại quần áo & phụ tùng
        </h2>
      </div>
    </div>





    <div class="text-center lg:my-24 my-12" data-aos="fade-down" data-aos-duration="1000" data-aos-delay='300'>
      <h1 class="font-bold text-4xl mb-4">Sản phẩm mới</h1>
      <p class="italic text-sm mb-12">
        Nếu bạn không làm những gì bạn yêu thích, bạn đang lãng phí thời gian của mình.
      </p>
      <div class="mx-auto w-8/12">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10">
          <Product v-for="page in featureProducts.slice(0, 4)" :key="page.id" :blogData="page" />
        </div>
      </div>
    </div>






    <div class="w-full my-12" data-aos="fade-down"
        data-aos-duration="1500"
        data-aos-delay="500">
      <h1 class="font-bold text-4xl mb-4 text-center">Tin tức</h1>
      <p class="italic text-sm mb-12 text-center">Xem tin tức mới</p>
      <div class="w-8/12 mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
          <BlogComponent
            :blogData="page"
            v-for="page in displayedPages"
            :key="page.id"
          />
        </div>
      </div>
    </div>

    <!-- About -->
    <div class="border p-6" data-aos="fade-down"
        data-aos-duration="1500"
        data-aos-delay="500">
      <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-12 lg:w-10/12 mx-auto">
        <div class="flex justify-center">
          <i class="fa fa-car text-3xl" aria-hidden="true"></i>
          <div class="ml-4">
            <h1 class="font-bold text-2xl">Miễn phí vận chuyển</h1>
          </div>
        </div>
        <div class="flex justify-center">
          <i class="text-3xl fa fa-life-ring" aria-hidden="true"></i>
          <div class="ml-4">
            <h1 class="font-bold text-2xl">Hỗ trợ 24/7</h1>
          </div>
        </div>
        <div class="flex justify-center">
          <i class="text-3xl fa fa-undo" aria-hidden="true"></i>
          <div class="ml-4">
            <h1 class="font-bold text-2xl">30 ngày hoàn trả</h1>
          </div>
        </div>
        <div class="flex justify-center">
          <i class="text-3xl fa fa-lock" aria-hidden="true"></i>
          <div class="ml-4">
            <h1 class="font-bold text-2xl">Thanh toán bảo mật</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- end About -->
    <!-- Footer -->
    <Footer  data-aos="fade-down"
        data-aos-duration="1500"
        data-aos-delay="500"/>
    <!-- End Footer -->
  </div>
</template>

<script>
import { Swiper, SwiperSlide } from "swiper/vue";
import { Autoplay } from "swiper/modules";
import "swiper/css";

import Footer from "../../../components/User/HomePage/Footer.vue";
import Header from "../../../components/User/HomePage/Header.vue";
// import Banner from "../../../components/User/Banner/Banner";
import BlogComponent from "@/components/User/Blog/BlogComponent.vue";
import Product from "@/components/User/Shop/Product.vue";
import ProductsService from "../../../../service/ProductsService";
import PagesService from "../../../../service/PagesService";
import BannersService from "../../../../service/BannersService";

export default {
  name: "homeviewPage",
  data() {
    return {
      featureProducts: [],
      pages: [],
      banners: [],
      products: [],
    };
  },
  components: {
    Swiper,
    SwiperSlide,
    Footer,
    Header,
    // Banner,
    BlogComponent,
    Product,
  },
  methods: {
    getAllFeatureProducts() {
      ProductsService.getAllFeatureProducts().then((res) => {
        this.featureProducts = res.data;
      });
    },
    getAllProducts() {
      ProductsService.getAll().then((res) => {
        this.products = res.data;
        console.log(res.data);
      });
    },
    getAllPages() {
      PagesService.getAll().then((res) => {
        this.pages = res.data;
      });
    },
    showProductDetail(blogID) {
      this.$router.push(`/singleProduct/${blogID}`);
    },
    getAllBanners() {
      BannersService.getAll().then((res) => {
        this.banners = res.data;
      });
    },
    getImageUrl(photo) {
      return `https://shopluanvan.x10.mx/uploads/${photo}`;
    },
  },
  setup() {
    return {
      modules: [Autoplay],
    };
  },
  created() {
    this.getAllFeatureProducts();
    this.getAllPages();
    this.getAllProducts();
    this.getAllBanners();
  },
  computed: {
    displayedPages() {
      return this.pages.slice(0, 3); // Chỉ lấy 3 phần tử đầu tiên
    },
  },
};
</script>

<style>
</style>