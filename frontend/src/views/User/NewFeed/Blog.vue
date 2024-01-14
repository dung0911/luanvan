<template>
  <div class="">
    <Header />
    <Banner />
    <div class="w-11/12 mx-auto">
      <div class="lg:flex">
        <div class="mt-16 lg:w-1/3">
          <div class="pt-2 relative mx-auto text-gray-600 border-b pb-10">
            <input
              v-model="timKiem"
              class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none w-full"
              type="search"
              name="search"
              placeholder="Tìm kiếm"
            />
            <button
              type="submit"
              class="absolute right-0 top-0 mt-5 mr-4"
              @click="() => findByTitle()"
            >
              <svg
                class="text-gray-600 h-4 w-4 fill-current"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                version="1.1"
                id="Capa_1"
                x="0px"
                y="0px"
                viewBox="0 0 56.966 56.966"
                style="enable-background: new 0 0 56.966 56.966"
                xml:space="preserve"
                width="512px"
                height="512px"
              >
                <path
                  d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"
                />
              </svg>
            </button>
          </div>
          <div class="space-y-2">
            <div
              class="overflow-hidden rounded border border-gray-300 [&_summary::-webkit-details-marker]:hidden"
            >
              <summary
                class="flex cursor-pointer items-center justify-between gap-2 bg-white p-4 text-gray-900 transition"
                @click="isOpen1 = !isOpen1"
              >
                <span class="text-sm font-medium"> Danh mục tin tức </span>

                <span class="transition group-open:-rotate-180">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-4 w-4"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                    />
                  </svg>
                </span>
              </summary>

              <div class="border-t border-gray-200 bg-white" v-if="isOpen1">
                <ul class="space-y-1 border-t border-gray-200 p-4">
                  <li
                    @click="() => getAllPostByCategory(ca.id)"
                    v-for="ca in pagesCat"
                    :key="ca.id"
                  >
                    <label
                      for="FilterInStock"
                      class="inline-flex items-center gap-2 hover:underline cursor-pointer"
                    >
                      <span class="text-sm font-medium text-gray-700">
                        {{ ca.title }}
                      </span>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <section class="bg-white dark:bg-gray-900 w-full">
          <div class="container px-6 py-10 mx-auto">
            <section class="bg-white dark:bg-gray-900">
              <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <!-- <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                  <h2
                    class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white"
                  >
                    Our Blog
                  </h2>
                  <p
                    class="font-light text-gray-500 sm:text-xl dark:text-gray-400"
                  >
                    We use an agile approach to test assumptions and connect
                    with the needs of your audience early and often.
                  </p>
                </div> -->
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                  <BlogVue data-aos="fade-down"
        data-aos-duration="1500"
        data-aos-delay="500"
                    :blogData="page"
                    v-for="page in displayedProducts"
                    :key="page.blogId"
                  />
                </div>
              </div>
            </section>
          </div>
        </section>
      </div>
      <div class="flex items-center justify-center">
        <div class="flex justify-center items-center space-x-4 mb-12">
          <button
            @click="previousPage"
            :disabled="currentPage === 1"
            class="border rounded-md px-2 py-1 transition cursor-pointer shadow-sm"
          >
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
          </button>
          <div class="text-slate-500">{{ currentPage }}</div>
          <button
            @click="nextPage"
            :disabled="currentPage === totalPages"
            class="border rounded-md px-2 py-1 transition cursor-pointer shadow-sm"
          >
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
          </button>
        </div>
      </div>
    </div>
    <Footer />
  </div>
</template>
    
    <script>
import Footer from "../../../components/User/HomePage/Footer.vue";
import Header from "../../../components/User/HomePage/Header.vue";
import Banner from "../../../components/User/HomePage/Banner.vue";
import BlogVue from "../../../components/User/Blog/BlogComponent.vue";
import PagesService from "../../../../service/PagesService";
import PostCategoryService from "../../../../service/PostCategoryService";

export default {
  name: "NewfeedPage",
  data() {
    return {
      pages: [],
      pagesCat: [],
      timKiem: "",
      isOpen: true,
      isOpen1: true,
      currentPage: 1,
      productsPerPage: 10,
    };
  },
  components: {
    Footer,
    Header,
    Banner,
    BlogVue,
  },
  methods: {
    getAllPages() {
      PagesService.getAll().then((res) => {
        this.pages = res.data;
      });
    },
    getAllPostCat() {
      PostCategoryService.getAll().then((res) => {
        this.pagesCat = res.data;
      });
    },
    getAllPostByCategory(id) {
      PagesService.getAllPostByCategory(id).then((res) => {
        this.pages = res.data;
      });
    },
    findByTitle() {
      PagesService.findByTitle(this.timKiem).then((res) => {
        this.pages = res.data;
      });
    },
    nextPage() {
      if (this.currentPage < this.totalPages) {
        this.currentPage++;
      }
    },
    previousPage() {
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    },
  },
  computed: {
    totalPages() {
      return Math.ceil(this.pages.length / this.productsPerPage);
    },
    displayedProducts() {
      const startIndex = (this.currentPage - 1) * this.productsPerPage;
      const endIndex = startIndex + this.productsPerPage;
      return this.pages.slice(startIndex, endIndex);
    },
  },
  created() {
    this.getAllPages();
    this.getAllPostCat();
  },
};
</script>
    
    <style>
</style>