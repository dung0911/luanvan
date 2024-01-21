<template>
  <div class="">
    <Header />
    <div class="max-w-screen-xl mx-auto">
      <main class="mt-10">
        <div class="mb-4 md:mb-0 w-full mx-auto relative" style="height: 24em">
          <div
            class="absolute left-0 bottom-0 w-full h-full z-10"
            style="
              background-image: linear-gradient(
                180deg,
                transparent,
                rgba(0, 0, 0, 0.7)
              );
            "
          ></div>
        
          <img
            :src="fullImagePath"
            class="absolute left-0 top-0 w-full h-full z-0 object-cover"
          />
        </div>
        <div class="flex justify-between px-7 my-3">
          <p class="italic text-sm">{{ Page.added_by }}</p>
          <p class="italic text-sm">{{ Page.created_at }}</p>
        </div>
        <h1 class="font-bold text-4xl mt-12 px-4 lg:px-0">
          {{ Page.title }}
        </h1>
        <div
          class="px-4 lg:px-0 mt-12 text-gray-700 mx-auto text-lg leading-relaxed"
        >
          <p class="pb-6" v-html="Page.description"></p>
        </div>
      </main>
      <!-- main ends here -->
      <swiper
        :loop="true"
        :slidesPerView="3"
        :spaceBetween="30"
        :autoplay="{
          delay: 3000,
          disableOnInteraction: false,
        }"
        :pagination="{
          clickable: true,
        }"
        :modules="modules"
        class="mySwiper"
      >
        <swiper-slide v-for="i in 4" :key="i">
          <!-- <Blog /> -->
        </swiper-slide>
      </swiper>
    </div>
    <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased" v-if="this.userInfo != null">
      <div class="w-8/12 mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
          <h2
            class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white"
          >
            Thảo luận 
          </h2>
        </div>
        <form class="mb-6">
          <div
            class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700"
          >
            <label for="comment" class="sr-only">Your comment</label>
            <textarea
              v-model="comment"
              id="comment"
              rows="6"
              class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
              placeholder="Write a comment..."
              required
            ></textarea>
          </div>
          <div
            @click="submitForm"
            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800"
          >
            Post comment
          </div>
        </form>
        <article
          v-for="com in PageComments"
          :key="com.id"
          class="p-6 text-base bg-white rounded-lg dark:bg-gray-900"
        >
          <footer class="flex justify-between items-center mb-2">
            <div class="flex items-center">
              <p
                class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"
              >
                <img
                  class="mr-2 w-6 h-6 rounded-full"
                  src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                  alt="Michael Gough"
                />{{ com.name }}
              </p>
              <p class="text-sm text-gray-600 dark:text-gray-400">
                <time
                  pubdate
                  datetime="2022-02-08"
                  title="February 8th, 2022"
                  >{{ com.created_at }}</time
                >
              </p>
            </div>
            <!-- Dropdown menu -->
          </footer>
          <p class="text-gray-500 dark:text-gray-400">
            {{ com.comment }}
          </p>
        </article>
      </div>
    </section>
    <Footer class="mt-12" />
  </div>
</template>
      
      <script>
import Footer from "../../../components/User/HomePage/Footer.vue";
import Header from "../../../components/User/HomePage/Header.vue";
// import Blog from "@/components/User/Blog/BlogComponent.vue";

import "swiper/css/pagination";
import "swiper/css";

import { Swiper, SwiperSlide } from "swiper/vue";
import { Autoplay } from "swiper/modules";
import { Pagination } from "swiper/modules";

import PagesService from "../../../../service/PagesService";
import PostCommentsService from "../../../../service/PostCommentsService";
import AccountService from "../../../../service/AccountService";

export default {
  name: "NewfeedPage",
  data() {
    return {
      openTab: 1,
      thumbsSwiper: null,
      counter: 1,
      Page: {},
      relatedPage: [],
      cart: [],
      changeCartNumber: 0,
      Pages: [],
      listPages: [],
      PageComments: [],
      userInfo: null,
      comment: "",
    };
  },
  components: {
    Footer,
    Header,
    Swiper,
    SwiperSlide,
    // Blog,
  },
  setup() {
    return {
      modules: [Autoplay, Pagination],
    };
  },
  methods: {
    getAll() {
      PagesService.getAll().then((res) => (this.listPages = res.data));
    },
    getPage(id) {
      PagesService.getByID(id).then((res) => {
        this.Page = res.data;
      });
    },
    getPageComment(post_id) {
      PostCommentsService.getByID(post_id).then((res) => {
        this.PageComments = res.data;
        console.log("tesst", this.PageComments);
      });
    },
    formatNumber(value) {
      const formattedValue = new Intl.NumberFormat("vi-VN", {
        style: "currency",
        currency: "VND",
      }).format(value);

      // Thay thế ký hiệu mặc định (₫) bằng "VNĐ"
      return formattedValue.replace("₫", "VNĐ");
    },
    changePageID() {
      return this.$route.params.id;
    },
    getAllInfoByAccountId() {
      if (sessionStorage.getItem("id") != null) {
        AccountService.getByID(sessionStorage.getItem("id")).then((res) => {
          console.log("chay vo day roui");
          this.userInfo = res.data;
          // this.getWishList();
        });
      }
    },
    submitForm() {
      if (this.userInfo != null) {
        PostCommentsService.insertComment(
          this.userInfo.id,
          this.PageId,
          this.comment
        ).then(() => {
          this.comment = "";
          this.getPageComment(this.PageId);
        });
      } else {
        console.log("Khong");
        return;
      }
      // console.log("this.blogData.id====" , this.userInfo.id);
    },
  },
  computed: {
    PageId() {
      return this.$route.params.id;
    },
    fullImagePath() {
      const baseUrl = "http://127.0.0.1:8000/uploads/";
      return baseUrl + this.Page.photo;
    },
  },
  created() {
    this.getAllInfoByAccountId();
    this.getPage(this.PageId);
    this.getPageComment(this.PageId);
  },
};
</script>
      
      <style>
</style>