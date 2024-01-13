<template>
  <div class="">
    <Header />
    <Banner />
    <div class="container mx-auto mt-10">
      <form>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
          <div>
            <label
              for="Tên họ"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Tên họ</label
            >
            <input
              type="text"
              id="first_name"
              v-model="first_name"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            />
          </div>
          <div>
            <label
              for="Tên "
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Tên</label
            >
            <input
              type="text"
              id="last_name"
              v-model="last_name"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            />
          </div>
          <div>
            <label
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Địa chỉ 1</label
            >
            <input
              type="text"
              v-model="address1"
              id="Address 1"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Flowbite"
            />
          </div>
          <div>
            <label
              for="phone"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Số điện thoại</label
            >
            <input
              type="text"
              v-model="phone"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="123-45-678"
              pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"
            />
          </div>
          <div>
            <label
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Địa chỉ 2</label
            >
            <input
              type="text"
              id="website"
              v-model="address2"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Address 2"
            />
          </div>
          <div>
            <label
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Country</label
            >
            <input
              type="text"
              v-model="country"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder=""
            />
          </div>
          <div></div>
          <div>
            <label
              for="visitors"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >post_code</label
            >
            <input
              type="text"
              v-model="post_code"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder=""
            />
          </div>
        </div>
        <div class="mb-6">
          <label
            for="email"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            >Email address</label
          >
          <input
            type="email"
            v-model="email"
            id="email"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="john.doe@Address 1.com"
          />
        </div>
        Loại thanh toán
        <select
          v-model="payment_method"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-4"
        >
          <option value="cod">cod</option>
          <option value="paypal">paypal</option>
        </select>
        Trạng thái thanh toán
        <select
          v-model="payment_status"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-4"
        >
          <option value="paid">Paid</option>
          <option value="unpaid">Unpaid</option>
        </select>
        Ship
        <select
          v-model="shipId"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-4"
        >
          <option v-for="ship in shippings" :key="ship.id" :value="ship.id">
            {{ ship.type }}
          </option>
        </select>
        Coupon
        <select
          v-model="couponId"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-4"
        >
          <option v-for="coupon in coupons" :key="coupon.id" :value="coupon.id">
            {{ coupon.code }}
          </option>
        </select>
      </form>

      <div class="flex shadow-md my-10">
        <div class="w-3/4 bg-white px-10 py-10">
          <div class="flex justify-between border-b pb-8">
            <h1 class="font-semibold text-2xl">Shopping Cart</h1>
            <h2 class="font-semibold text-2xl">
              Số lượng: {{ totalQuantity }}
            </h2>
          </div>
          <div class="flex mt-10 mb-5">
            <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">
              Product Details
            </h3>
            <h3
              class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center"
            >
              Quantity
            </h3>
            <h3
              class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center"
            >
              Price
            </h3>
            <h3
              class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center"
            >
              Total
            </h3>
          </div>
          <div
            v-for="(product, index) in listProductInCart"
            :key="product.id"
            class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5"
          >
            <div class="flex w-2/5">
              <!-- product -->
              <div class="w-20">
                <img class="h-24" :src="product.photo" :alt="product.title" />
              </div>
              <div class="flex flex-col justify-between ml-4 flex-grow">
                <span class="font-bold text-sm">{{ product.title }}</span>
                <div
                  @click="() => removeItemInList(index)"
                  class="font-semibold hover:text-red-500 text-gray-500 text-xs cursor-pointer"
                >
                  Remove
                </div>
              </div>
            </div>
            <div class="flex justify-center w-1/5">
              <p class="mx-2 text-center w-8">{{ product.quantity }}</p>
            </div>
            <span class="text-center w-1/5 font-semibold text-sm">{{
              product.price
            }}</span>
            <span class="text-center w-1/5 font-semibold text-sm"
              >{{ formatNumber(product.price * product.quantity) }} VND</span
            >
          </div>

          <router-link
            to="/shop"
            class="flex font-semibold text-indigo-600 text-sm mt-10"
          >
            <svg
              class="fill-current mr-2 text-indigo-600 w-4"
              viewBox="0 0 448 512"
            >
              <path
                d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"
              />
            </svg>
            Continue Shopping
          </router-link>
        </div>

        <div id="summary" class="w-1/4 px-8 py-10">
          <h1 class="font-semibold text-2xl pb-8">Order Summary</h1>
          <div class="border-t">
            <div
              class="flex font-semibold justify-between py-6 text-sm uppercase"
            >
              <span>Total cost</span>
              <span>{{ formatNumber(totalPrice) }}</span>
            </div>
            <div
              @click="insertOrder"
              class="bg-indigo-500 border rounded-sm text-center font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full"
            >
              Checkout
            </div>
          </div>
        </div>
      </div>
    </div>
    <Footer />
  </div>
</template>
      
      <script>
import { mapActions } from "vuex";

import Footer from "../../../components/User/HomePage/Footer.vue";
import Header from "../../../components/User/HomePage/Header.vue";
import Banner from "../../../components/User/HomePage/Banner.vue";
import AccountService from "../../../../service/AccountService";
import OrdersService from "../../../../service/OrdersService.js";
import ShippingService from "../../../../service/ShippingService.js";
import CouponService from "../../../../service/CouponService.js";

const StringOrderNumber = "DH_" + formatDateToCustomString(new Date());

function formatDateToCustomString(date) {
  const year = date.getFullYear();
  const month = (date.getMonth() + 1).toString().padStart(2, "0");
  const day = date.getDate().toString().padStart(2, "0");
  const hours = date.getHours().toString().padStart(2, "0");
  const minutes = date.getMinutes().toString().padStart(2, "0");
  const seconds = date.getSeconds().toString().padStart(2, "0");
  const milliseconds = date.getMilliseconds().toString().padStart(3, "0");

  return `${year}${month}${day}${hours}${minutes}${seconds}${milliseconds}`;
}

export default {
  name: "CartViewPage",
  data() {
    return {
      listProductInCart: [],
      totalPrice: 0,
      totalQuantity: 0,
      first_name: "",
      last_name: "",
      address1: "",
      phone: "",
      address2: "",
      country: "",
      post_code: "",
      email: "",
      payment_method: "paypal",
      payment_status: "unpaid",
      userInfo: [],
      shippings: [],
      shipId: null,
      coupons: [],
      couponId: null,
    };
  },
  components: {
    Footer,
    Header,
    Banner,
  },
  methods: {
    ...mapActions(["changeCartChangeNumber"]),

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
      this.changeCartChangeNumber(1);
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

    insertOrder() {
      if (this.userInfo != null && this.userInfo != "") {
        OrdersService.insertOrder(
          StringOrderNumber,
          this.userInfo.id,
          this.totalPrice,
          this.shipId,
          this.couponId,
          this.totalQuantity,
          this.totalQuantity,
          this.payment_method,
          this.payment_status,
          this.first_name,
          this.last_name,
          this.email,
          this.phone,
          this.country,
          this.post_code,
          this.address1,
          this.address2
        ).then((res) => {
          this.$router.push("/cartDetail");
        });
      } else {
        console.log("login account");
      }
      // console.log("DH_" + this.formatDateToCustomString(new Date()));
    },

    getAllInfoByAccountId() {
      if (sessionStorage.getItem("id") != null) {
        AccountService.getByID(sessionStorage.getItem("id")).then((res) => {
          this.userInfo = res.data;
        });
      }
    },

    getAllShipping() {
      ShippingService.getAll().then((res) => {
        this.shippings = res.data;
        if (res.data.length > 0) this.shipId = res.data[0].id;
      });
    },
    getAllCoupon() {
      CouponService.getAll().then((res) => {
        this.coupons = res.data;
        if (res.data.length > 0) this.couponId = res.data[0].id;
      });
    },
  },

  created() {
    this.getAllProductInCart();
    this.getAllInfoByAccountId();
    this.getAllShipping();
    this.getAllCoupon();
  },
};
</script>
      
      <style>
</style>