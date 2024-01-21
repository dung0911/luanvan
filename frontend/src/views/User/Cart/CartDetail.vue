<template>
  <div class="">
    <Header />
    <Banner />

    <div class="py-14 px-4 md:px-6 2xl:px-20 2xl:container 2xl:mx-auto">
      <div class="flex justify-start item-start space-y-2 flex-col">
        <h1
          class="text-3xl dark:text-white lg:text-4xl font-semibold leading-7 lg:leading-9 text-gray-800"
        >
          Đơn hàng
          <span v-for="o in orderName" :key="o.id">{{ o.order_number }}</span>
        </h1>
      </div>
      <div
        class="mt-10 flex flex-col xl:flex-row jusitfy-center items-stretch w-full xl:space-x-8 space-y-4 md:space-y-6 xl:space-y-0"
      >
        <div
          class="flex flex-col justify-start items-start w-full space-y-4 md:space-y-6 xl:space-y-8"
        >
          <div
            class="flex flex-col justify-start items-start dark:bg-gray-800 bg-gray-50 px-4 py-4 md:py-6 md:p-6 xl:p-8 w-full"
          >
            <p
              class="text-lg md:text-xl dark:text-white font-semibold leading-6 xl:leading-5 text-gray-800"
            >
              Giỏ hàng
            </p>
          </div>
          <div
            v-for="product in orderDetails"
            :key="product.id"
            class="flex w-full hover:bg-gray-100 -mx-8 px-6 py-5"
          >
            <div class="flex justify-between">
              <div class="w-20">
                <img
                  class="h-24"
                  :src="`https://shopluanvan.x10.mx/uploads/` + product.photo"
                  :alt="product.title"
                />
                size: {{ product.cart_size  }}
              </div>
              <div class="flex flex-col justify-between ml-4 flex-grow">
                <span class="font-bold text-sm">{{ product.title }}</span>
              </div>
            </div>
            <div class="flex justify-center w-1/5">
              <p class="mx-2 text-center w-8">{{ product.quantity }}</p>
            </div>
            <span class="text-center w-1/5 font-semibold text-sm">{{
              formatNumber(product.price)
            }}</span>
            <span class="text-center w-1/5 font-semibold text-sm"
              >{{ formatNumber(product.price * product.quantity) }} VND</span
            >
          </div>
          <div
            class="flex justify-center flex-col md:flex-row flex-col items-stretch w-full space-y-4 md:space-y-0 md:space-x-6 xl:space-x-8"
          >
            <div
              class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-50 dark:bg-gray-800 space-y-6"
            >
              <h3
                class="text-xl dark:text-white font-semibold leading-5 text-gray-800"
              >
                Tổng kết
              </h3>
              <div
                class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4"
              >
                <div class="flex justify-between w-full">
                  <p class="text-base dark:text-white leading-4 text-gray-800">
                    Giá tiền sản phẩm
                  </p>
                  <p
                    class="text-base dark:text-gray-300 leading-4 text-gray-600"
                  >
                    {{ formatNumber(tongSP) }}
                  </p>
                </div>

                <div class="flex justify-between items-center w-full">
                  <p class="text-base dark:text-white leading-4 text-gray-800">
                    Phí vận chuyển
                  </p>
                  <p
                    class="text-base dark:text-gray-300 leading-4 text-gray-600"
                  >
                    {{ ship }}
                  </p>
                </div>
                <div class="flex justify-between items-center w-full">
                  <p class="text-base dark:text-white leading-4 text-gray-800">
                    Giảm giá
                  </p>
                  <p
                    class="text-base dark:text-gray-300 leading-4 text-gray-600"
                  >
                    <span v-for="co in orderName" :key="co.id">{{
                      formatNumber((co.coupon / 100) * totalValue)
                    }}</span>
                  </p>
                </div>
              </div>
              <div class="flex justify-between items-center w-full">
                <p
                  class="text-base dark:text-white font-semibold leading-4 text-gray-800"
                >
                  Tổng tiền
                </p>
                <p
                  class="text-base dark:text-gray-300 font-semibold leading-4 text-gray-600"
                >
                  <span>{{ formatNumber(giaTri) }}</span>
                </p>
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
import AccountService from "../../../../service/AccountService";
import OrdersDetailService from "../../../../service/OrdersDetailService.js";
import OrdersService from "../../../../service/OrdersService.js";
// import ShippingService from "../../../../service/ShippingService.js";

export default {
  name: "CartDetailViewPage",
  data() {
    return {
      userInfo: [],
      items: [],
      orderDetails: [],
      listProductDetails: [],
      orderName: [],
      giaTri: 0,
      ship: 0,
      coupons: [],
      tongSP: 0.0,
    };
  },
  components: {
    Footer,
    Header,
    Banner,
  },
  methods: {
    getAllInfoByAccountId() {
      if (sessionStorage.getItem("id") != null) {
        AccountService.getByID(sessionStorage.getItem("id")).then((res) => {
          this.userInfo = res.data;
        });
      }
    },
    getAllItemsByUser() {
      if (this.userInfo != null && this.userInfo != "") {
        OrdersService.getOrderByUser(this.userInfo.id).then((res) => {
          this.items = res.data;
        });
      }
    },
    getShipFromOrder(id) {
      OrdersService.getShipFromOrderId(id).then((res) => {
        this.ship = res.data[0].price;
        console.log(this.ship);
      });
    },
    getOrder(id) {
      OrdersService.getOrderById(id).then((res) => {
        this.orderName = res.data;
        this.giaTri = res.data[0].total_amount;
      });
    },
    getPage(id) {
      let sum = 0;
      OrdersDetailService.getOrderByID(id).then((res) => {
        this.orderDetails = res.data;
        this.orderDetails.forEach((element) => {
          console.log(element);
          sum += element.price * element.quantity;
        });
        this.tongSP = sum;
        // console.log(res.data);
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
  },
  computed: {
    id() {
      return this.$route.params.id;
    },
    fullImagePath() {
      const baseUrl = "https://shopluanvan.x10.mx/uploads/";
      return baseUrl + this.id.photo;
    },
    totalValue() {
      // Calculate the total value of products in the order
      return this.orderDetails.reduce(
        (total, product) => total + product.price * product.quantity,
        0
      );
    },
  },

  async created() {
    await this.getAllInfoByAccountId();
    await this.getPage(this.id);
    await this.getOrder(this.id);
    await this.getShipFromOrder(this.id);
  },

    async mounted() {
    await this.getAllInfoByAccountId();
    await this.getPage(this.id);
    await this.getOrder(this.id);
    await this.getShipFromOrder(this.id);
  },
};
</script>
      
      <style>
</style>
