<template>
  <header class="shadow-lg border-b text-lg sticky top-0 bg-white z-50">
    <div class="flex items-center justify-between px-6">
      <div class="">
        <router-link to="/">
          <img src="../../../assets/1.png" class="h-32" alt="" />
        </router-link>
      </div>
      <div class="lg:hidden">
        <button @click="isOpen = !isOpen">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
      </div>
      <div
        v-if="!isOpen"
        class="fixed inset-x-0 top-16 p-4 bg-gray-50 md:hidden z-10 border-b"
      >
        <ul class="font-medium space-y-2">
          <li class="mx-5">
            <router-link to="/"> Trang chủ </router-link>
          </li>
          <li class="mx-5">
            <router-link to="/shop"> Cửa hàng </router-link>
          </li>
          <li class="mx-5">
            <router-link to="/page"> Tin tức </router-link>
          </li>
          <li class="mx-5">
            <router-link to="/contact"> Liên hệ </router-link>
          </li>
        </ul>
        <ul class="flex p-4 mt-3">
          <li
            class="mx-2"
            @click="isOptionsExpanded = !isOptionsExpanded"
            v-if="userInfo == null"
          >
            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
            <transition
              enter-active-class="transform transition duration-500 ease-custom"
              enter-class="-translate-y-1/2 scale-y-0 opacity-0"
              enter-to-class="translate-y-0 scale-y-100 opacity-100"
              leave-active-class="transform transition duration-300 ease-custom"
              leave-class="translate-y-0 scale-y-100 opacity-100"
              leave-to-class="-translate-y-1/2 scale-y-0 opacity-0"
            >
              <ul
                v-show="isOptionsExpanded"
                class="bg-white divide-y p-1 rounded-sm shadow-lg overflow-hidden"
              >
                <li class="py-1 hover:bg-gray-200 px-2 rounded-sm">
                  <router-link to="/login">Đăng nhập</router-link>
                </li>
                <li class="py-1 hover:bg-gray-200 px-2 rounded-sm">
                  <router-link to="/register">Đăng ký</router-link>
                </li>
              </ul>
            </transition>
          </li>
          <li>
            <div class="relative" v-if="userInfo != null">
              <button class="mx-3" @click="this.account = !this.account">
                <i class="fa fa-user" aria-hidden="true"></i>
              </button>
              <div
                class="absolute z-30 right-0 shadown-lg top-6"
                :class="{ hidden: !account }"
              >
                <div class="bg-white rounded-lg shadow-lg py-2 w-48">
                  <p
                    class="block font-semibold px-4 py-2 | hover:bg-gray-50 cursor-pointer border-b-2"
                  >
                    {{ userInfo.name }}
                  </p>
                  <router-link
                    to="/accountInfo"
                    href="#"
                    class="block font-semibold px-4 py-2 | hover:bg-gray-50 cursor-pointer"
                    >Thông tin</router-link
                  >
                  <button
                    @click="logout"
                    class="block font-semibold px-4 py-2 | hover:bg-gray-50 cursor-pointer w-full text-left"
                  >
                    Đăng xuất
                  </button>
                </div>
              </div>
            </div>
          </li>
          <li class="mx-2">
            <button class="" @click="isOpenCart = !isOpenCart">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              ({{ totalQuantity }})
            </button>
          </li>
          <li class="mx-2">
            <i class="fa fa-heart-o" aria-hidden="true"></i>
          </li>
        </ul>
      </div>
      <nav class="hidden lg:block">
        <ul class="flex">
          <li class="mx-5">
            <router-link to="/"> Trang chủ </router-link>
          </li>
          <li class="mx-5">
            <router-link to="/shop"> Cửa hàng </router-link>
          </li>
          <li class="mx-5">
            <router-link to="/page"> Tin tức </router-link>
          </li>
          <li class="mx-5">
            <router-link to="/contact"> Liên hệ </router-link>
          </li>
        </ul>
      </nav>
      <div class="hidden lg:block">
        <ul class="flex">
          <li
            v-if="userInfo == null || userInfo == ''"
            class="mx-2"
            @click="isOptionsExpanded = !isOptionsExpanded"
          >
            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
            <transition
              enter-active-class="transform transition duration-500 ease-custom"
              enter-class="-translate-y-1/2 scale-y-0 opacity-0"
              enter-to-class="translate-y-0 scale-y-100 opacity-100"
              leave-active-class="transform transition duration-300 ease-custom"
              leave-class="translate-y-0 scale-y-100 opacity-100"
              leave-to-class="-translate-y-1/2 scale-y-0 opacity-0"
            >
              <ul
                v-show="isOptionsExpanded"
                class="absolute right-10 mb-4 bg-white divide-y p-1 rounded-sm shadow-lg overflow-hidden w-1/12"
              >
                <li class="py-1 hover:bg-gray-200 px-2 rounded-sm">
                  <router-link to="/login">Đăng nhập</router-link>
                </li>
                <li class="py-1 hover:bg-gray-200 px-2 rounded-sm">
                  <router-link to="/register">Đăng ký</router-link>
                </li>
              </ul>
            </transition>
          </li>
          <div class="relative" v-if="userInfo != null && userInfo != ''">
            <button class="mx-3" @click="this.account = !this.account">
              <i class="fa fa-user" aria-hidden="true"></i>
            </button>
            <div
              class="absolute z-30 right-0 shadown-lg top-6"
              :class="{ hidden: !account }"
            >
              <div class="bg-white rounded-lg shadow-lg py-2 w-48">
                <div class="flex justify-center">
                  <img
                    class="object-cover w-32 h-32 rounded-full ring-4 ring-gray-300"
                    :src="getImageUrl(userInfo.photo)"
                    alt=""
                  />
                </div>
                <p
                  class="text-center block font-semibold px-4 py-2 | hover:bg-gray-50 cursor-pointer border-b-2"
                >
                  {{ userInfo.name }}
                </p>
                <router-link
                  to="/accountInfo"
                  href="#"
                  class="block font-semibold px-4 py-2 | hover:bg-gray-50 cursor-pointer"
                  >Thông tin</router-link
                >
                <button
                  @click="logout"
                  class="block font-semibold px-4 py-2 | hover:bg-gray-50 cursor-pointer w-full text-left"
                >
                  Đăng xuất
                </button>
              </div>
            </div>
          </div>
          <li class="mx-2">
            <button class="" @click="isOpenCart = !isOpenCart">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              ({{ totalQuantity }})
            </button>
          </li>
          <li class="mx-2">
            <router-link to="/wishlist" class="heart-container">
              <span class="heart-icon">
                <i class="fa fa-heart-o blinking-heart" aria-hidden="true"></i>
              </span>
            </router-link>
          </li>
        </ul>
      </div>
    </div>
    <div
      class="relative z-10"
      aria-labelledby="slide-over-title"
      role="dialog"
      aria-modal="true"
      v-if="isOpenCart"
    >
      <div
        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
      ></div>

      <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
          <div
            class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10"
          >
            <div class="pointer-events-auto w-screen max-w-md">
              <div
                class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl"
              >
                <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                  <div class="flex items-start justify-between">
                    <h2
                      class="text-lg font-medium text-gray-900"
                      id="slide-over-title"
                    >
                      Giỏ hàng
                    </h2>
                    <div class="ml-3 flex h-7 items-center">
                      <button
                        @click="isOpenCart = !isOpenCart"
                        type="button"
                        class="relative -m-2 p-2 text-gray-400 hover:text-gray-500"
                      >
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Close panel</span>
                        <svg
                          class="h-6 w-6"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke-width="1.5"
                          stroke="currentColor"
                          aria-hidden="true"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12"
                          />
                        </svg>
                      </button>
                    </div>
                  </div>

                  <div class="mt-8">
                    <div class="flow-root">
                      <ul role="list" class="-my-6 divide-y divide-gray-200">
                        <li
                          v-for="(product, index) in listProductInCart"
                          :key="product.id"
                          class="flex py-6"
                        >
                          <div
                            class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200"
                          >
                            <img
                              :src="product.photo"
                              :alt="product.title"
                              class="h-full w-full object-cover object-center"
                            />
                          </div>

                          <div class="ml-4 flex flex-1 flex-col">
                            <div>
                              <div
                                class="flex justify-between text-base font-medium text-gray-900"
                              >
                                <h3>
                                  <a href="#">{{ product.title }}</a>
                                </h3>
                                <p class="ml-4">
                                  {{ formatNumber(product.price) }}
                                </p>
                              </div>
                            </div>
                            <div
                              class="flex flex-1 items-end justify-between text-sm"
                            >
                              <p class="text-gray-500">
                                {{ product.size }}
                              </p>
                            </div>
                            <div
                              class="flex flex-1 items-end justify-between text-sm"
                            >
                              <p class="text-gray-500">
                                {{ product.quantity }}
                              </p>

                              <div class="flex">
                                <button
                                  @click="() => removeItemInList(index)"
                                  type="button"
                                  class="font-medium text-indigo-600 hover:text-indigo-500"
                                >
                                  xóa
                                </button>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div v-if="listProductInCart.length < 1">
                    <img
                      src="https://i0.wp.com/www.huratips.com/wp-content/uploads/2019/04/empty-cart.png?fit=603%2C288&ssl=1"
                      alt=""
                    />
                  </div>
                </div>

                <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                  <div
                    class="flex justify-between text-base font-medium text-gray-900"
                  >
                    <p>Tổng tiền:</p>
                    <p>{{ formatNumber(totalPrice) }}</p>
                  </div>
                  <p class="mt-0.5 text-sm text-gray-500"></p>
                  <div class="mt-6">
                    <router-link
                      v-if="userInfo != null && userInfo != ''"
                      to="/cart"
                      class="flex items-center my-2 justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700"
                      >Thanh toán</router-link
                    >
                    <router-link
                      v-if="userInfo != null && userInfo != ''"
                      to="/OrderHistory"
                      class="flex items-center my-2 justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700"
                      >Lịch sử đặt hàng</router-link
                    >
                    <router-link
                      to="/login"
                      v-if="userInfo == null || userInfo == ''"
                      class="flex mt-5 items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700"
                      >Đăng nhập để thanh toán</router-link
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
import { mapGetters } from "vuex";
import AccountService from "../../../../service/AccountService";

export default {
  name: "HeaderPageView",
  data() {
    return {
      isOpen: false,
      account: false,
      isOpenCart: false,
      isOptionsExpanded: false,
      userInfo: [],
      listProductInCart: [],
      totalQuantity: 0,
      totalPrice: 0,
    };
  },
  watch: {
    getCartChangeNumber() {
      this.getAllProductInCart();
    },
  },
  computed: {
    ...mapGetters(["getCartChangeNumber"]),
  },
  methods: {
    setOption(option) {
      this.selectedOption = option;
      this.isOptionsExpanded = false;
    },
    logout() {
      sessionStorage.removeItem("id");
      sessionStorage.removeItem("roleID");
      // Điều hướng đến trang đăng nhập
      this.hidden = true;
      this.$router.push("/login");
    },
    getAllInfoByAccountId() {
      if (sessionStorage.getItem("id") != null) {
        AccountService.getByID(sessionStorage.getItem("id")).then((res) => {
          this.userInfo = res.data;
        });
      }
    },
    // Láy item
    getItemFromsessionStorage() {
      if (sessionStorage.getItem("id") != undefined) {
        this.hidden = false;
        this.hideLogout = true;
      } else {
        this.hidden = true;
        this.hideLogout = false;
      }
    },
    getAllProductInCart() {
      let cartJson = localStorage.getItem("CCNN");
      let list = [];
      if (cartJson != null) {
        let jsonDecode = cartJson;
        list = JSON.parse(jsonDecode);
      }
      this.listProductInCart = list;
      this.totalQuantity = this.getTotalQuantity(list);
    },
    getTotalQuantity(list) {
      let totalQuantity = 0;
      let totalPrice = 0;
      list.forEach((product) => {
        totalQuantity += product.quantity;
        totalPrice += product.quantity * product.price;
      });
      this.totalPrice = totalPrice;
      return totalQuantity;
    },
    removeItemInList(index) {
      this.listProductInCart.splice(index, 1);
      let jsonDecode = JSON.stringify(this.listProductInCart);
      localStorage.setItem("CCNN", jsonDecode);
      this.totalQuantity = this.getTotalQuantity(this.listProductInCart);
    },
    formatNumber(value) {
      const formattedValue = new Intl.NumberFormat("vi-VN", {
        style: "currency",
        currency: "VND",
      }).format(value);

      // Thay thế ký hiệu mặc định (₫) bằng "VNĐ"
      return formattedValue.replace("₫", "VNĐ");
    },
    getImageUrl(photo) {
      return `http://127.0.0.1:8000/uploads/${photo}`;
    },
  },
  created() {
    this.getAllProductInCart();
    this.getAllInfoByAccountId();
    this.getItemFromsessionStorage();
  },
};
</script>

<style scoped>
@keyframes blink {
  0% {
    color: red;
  }
  50% {
    color: darkred;
  }
  100% {
    color: red;
  }
}

.blinking-heart {
  animation: blink 1s infinite;
}
</style>