<template>
  <div class="">
    <Header />
    <Banner />
    <div class="w-full px-4 md:px-6 2xl:px-5 py-12">
      <div class="">
        <div class="mt-3 text-center">
          <h1
            class="text-3xl lg:text-4xl tracking-tight font-semibold leading-8 lg:leading-9 text-gray-800 dark:text-white dark:text-white"
          >
            Danh sách yêu thích
          </h1>
        </div>
        <div class="mt-4 text-center">
          <p
            class="text-2xl tracking-tight leading-6 text-gray-600 dark:text-white"
          >
            {{ Wishlists.length }} sản phẩm
          </p>
        </div>

        <div
          class="w-3/4 mx-auto grid grid-cols-3 gap-5 mt-10"
          v-if="userInfo != null && userInfo != ''"
        >
          <div class="relative" v-for="(i, index) in Wishlists" :key="i.id">
            <img class="hidden w-full h-64 lg:block" :src="getImageUrl(i.photo)" />
            <button
              @click="() => removeFromWishlist(index, i.product_id)"
              aria-label="close"
              class="top-4 right-4 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 absolute p-1.5 bg-gray-800 dark:bg-white dark:text-gray-800 text-white hover:text-gray-400"
            >
              <svg
                class="fil-current"
                width="14"
                height="14"
                viewBox="0 0 14 14"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M13 1L1 13"
                  stroke="currentColor"
                  stroke-width="1.25"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M1 1L13 13"
                  stroke="currentColor"
                  stroke-width="1.25"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </button>
            <div
              id="menu1"
              class="flex flex-col jusitfy-start items-start mt-12"
            >
              <div>
                <p
                  class="tracking-tight text-xs leading-3 text-gray-800 dark:text-white"
                >
                  {{ i.title }}
                </p>
              </div>
              <div class="mt-6">
                <p
                  class="tracking-tight text-base font-medium leading-4 text-gray-800 dark:text-white"
                >
                  {{ formatNumber(i.price) }}
                </p>
              </div>
              <div class="mt-6">
                <p
                  class="tracking-tight text-base font-medium leading-4 text-gray-800 dark:text-white"
                ></p>
              </div>
            </div>
          </div>
        </div>
        <div class="" v-if="userInfo == null || userInfo == ''">
          <!-- This is an example component -->
          <div class="bg-gray-50 flex items-center">
            <div
              class="container flex flex-col md:flex-row items-center justify-between px-5 text-gray-700"
            >
              <div class="w-full lg:w-1/2 mx-8">
                <div
                  class="text-7xl text-green-500 font-dark font-extrabold mb-8"
                >
                  Không tìm thấy sản phẩm
                </div>
                <p class="text-2xl md:text-3xl font-light leading-normal mb-8">
                  Đăng nhập để tìm sản phẩm của bạn
                </p>

                <router-link
                  to="/login"
                  class="px-5 inline py-3 text-sm font-medium leading-5 shadow-2xl text-white transition-all duration-400 border border-transparent rounded-lg focus:outline-none bg-green-600 active:bg-red-600 hover:bg-red-700"
                  >Đăng nhập</router-link
                >
              </div>
              <div class="w-full lg:flex lg:justify-end lg:w-1/2 mx-5 my-12">
                <img
                  src="https://png.pngtree.com/png-vector/20220630/ourmid/pngtree-stylish-girl-walks-in-with-an-empty-cart-to-a-discount-png-image_5611279.png"
                  class=""
                  alt="Page not found"
                />
              </div>
            </div>
          </div>
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
import WishlistsService from "../../../../service/WishlistsService";
import AccountService from "../../../../service/AccountService";

export default {
  name: "WishlistProductView",
  components: {
    Footer,
    Header,
    Banner,
  },
  data() {
    return {
      Wishlists: [],
      userInfo: null,
    };
  },
  methods: {
    getImageUrl(photo) {
      return `http://127.0.0.1:8000/uploads/${photo}`;
    },
    getAllInfoByAccountId() {
      if (sessionStorage.getItem("id") != null) {
        AccountService.getByID(sessionStorage.getItem("id")).then((res) => {
          console.log("chay vo day roui");
          this.userInfo = res.data;
          this.getWishList();
        });
      }
    },
    getWishList() {
      if (this.userInfo != null) {
        WishlistsService.getByID(this.userInfo.id).then((res) => {
          this.Wishlists = res.data;
        });
      }
    },
    formatNumber(value) {
      const formattedValue = new Intl.NumberFormat("vi-VN", {
        style: "currency",
        currency: "VND",
      }).format(value);

      // Thay thế ký hiệu mặc định (₫) bằng "VNĐ"
      return formattedValue.replace("₫", "VNĐ");
    },

    removeFromWishlist(index, productID) {
      console.log(index, productID, this.userInfo.id);
      WishlistsService.deleteWishlists(this.userInfo.id, productID).then(
        (res) => {
          console.log("re", res.data);
        }
      );
      this.Wishlists.splice(index, 1);
    },
  },
  created() {
    this.getAllInfoByAccountId();
  },
};
</script>

<style>
</style>