<template>
  <div class="">
    <Header />
    <Banner />
    <div>
      <h1
        class="my-12 text-3xl lg:text-4xl font-semibold text-gray-800 text-center"
      >
        Cửa hàng
      </h1>
    </div>
    <div class="w-11/12 mx-auto my-24">
      <div class="lg:flex">
        <div class="lg:w-1/3">
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
                <span class="text-sm font-medium"> Danh mục sản phẩm </span>

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
                    @click="() => getProductByCatId(ca.id)"
                    v-for="ca in categories"
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
        <div class="w-full mt-24 lg:mt-0">
          <div class="lg:px-20 flex justify-between items-center">
            <!-- <span class="md:text-sm text-md italic"
              >{{ products.length }} sản phẩm</span
            > -->
          </div>
          <div class="2xl:container 2xl:mx-auto">
            <div class="lg:px-20">
              <div class="bg-white">
                <div
                  class="mx-auto max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8"
                >
                  <div
                    class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8"
                  >
                    <Product data-aos="fade-down"
        data-aos-duration="1500"
        data-aos-delay="500"
                      :blogData="page"
                      v-for="page in displayedProducts"
                      :key="page.id"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- This is an example component -->
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
    <!-- Footer -->
    <Footer />
    <!-- End Footer -->
  </div>
</template>
  
  <script>
import Footer from "../../../components/User/HomePage/Footer.vue";
import Header from "../../../components/User/HomePage/Header.vue";
import Banner from "../../../components/User/HomePage/Banner.vue";
import Product from "@/components/User/Shop/Product.vue";

import ProductsService from "../../../../service/ProductsService";
import CategoryService from "../../../../service/CategoryService";

export default {
  name: "shopviewPage",
  data() {
    return {
      isOpen: true,
      isOpen1: true,
      products: [],
      categories: [],
      timKiem: "",
      currentPage: 1,
      productsPerPage: 12,
    };
  },
  components: {
    Footer,
    Header,
    Banner,
    Product,
  },
  methods: {
    getAllProducts() {
      ProductsService.getAll().then((res) => {
        this.products = res.data;
      });
    },
    getAllCategories() {
      CategoryService.getAll().then((res) => {
        this.categories = res.data;
      });
    },
    getByID(id) {
      CategoryService.getByID(id).then((res) => {
        this.products = res.data;
      });
    },
    getProductByCatId(id) {
      ProductsService.getByIDCat(id).then((res) => {
        console.log(id);
        console.log(res.data);
        this.products = [...res.data];
        this.currentPage = 1;
      });
    },
    findByTitle() {
      ProductsService.findByTitle(this.timKiem).then((res) => {
        this.products = [...res.data];
        this.currentPage = 1;
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
  mounted() {},
  created() {
    this.getAllProducts();
    this.getAllCategories();
  },
  computed: {
    totalPages() {
      return Math.ceil(this.products.length / this.productsPerPage);
    },
    displayedProducts() {
      const startIndex = (this.currentPage - 1) * this.productsPerPage;
      const endIndex = startIndex + this.productsPerPage;
      return this.products.slice(startIndex, endIndex);
    },
  },
};
</script>
  
  <style>
</style>