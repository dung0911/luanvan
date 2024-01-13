<template>
  <div class="">
    <Header />
    <Banner />
    <div class="flex shadow-md my-10">
      <div class="w-3/4 bg-white px-10 py-10 mx-auto">
        <div class="flex justify-between border-b pb-8">
          <h1 class="font-semibold text-2xl">
            Đơn hàng:
            <span v-for="o in orderName" :key="o.id">{{ o.order_number }}</span>
          </h1>
          <h1 class="font-semibold text-2xl">
            Tổng giá trị:
            {{ formatNumber(totalValue) }}
          </h1>
        </div>
        <div class="flex mt-10 mb-5">
          <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">
            Chi tiết sản phẩm
          </h3>
          <h3
            class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center"
          >
            Số lượng
          </h3>
          <h3
            class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center"
          >
            giá
          </h3>
          <h3
            class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center"
          >
            Tổng tiền
          </h3>
        </div>
        <div
          v-for="product in orderDetails"
          :key="product.id"
          class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5"
        >
          <div class="flex w-2/5">
            <div class="w-20">
              <img
                class="h-24"
                :src="`http://127.0.0.1:8000/uploads/` + product.photo"
                :alt="product.title"
              />
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
import AccountService from "../../../../service/AccountService";
import OrdersDetailService from "../../../../service/OrdersDetailService.js";
import OrdersService from "../../../../service/OrdersService.js";

export default {
  name: "OrderHistoryView",
  data() {
    return {
      orderDetails: [],
      userInfo: null,
      listProductDetails: [],
      orderName: [],
      giaTri: 0,
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
    getOrder(id) {
      OrdersService.getOrderById(id).then((res) => {
        this.orderName = res.data;
      });
    },
    getPage(id) {
      OrdersDetailService.getOrderByID(id).then((res) => {
        this.orderDetails = res.data;
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
      const baseUrl = "http://127.0.0.1:8000/uploads/";
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
  mounted() {},
  created() {
    this.getAllInfoByAccountId();
    this.getPage(this.id);
    this.getOrder(this.id);
  },
};
</script>
    
    <style>
</style>