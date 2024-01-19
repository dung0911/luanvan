<template>
  <div class="">
    <Header />
    <Banner />
    <div class="px-4 sm:px-8 py-4 w-9/12 mx-auto">
      <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
          <thead>
            <tr>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
              >
                Mã đơn hàng
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
              >
                Họ tên
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
              >
                Email
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
              >
                Địa chỉ
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
              >
                Tổng tiền
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
              >
                Ngày đặt
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
              >
                Thanh toán đơn hàng
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
              >
                Trạng thái đơn đặt hàng
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
              >
                Chi tiết đơn hàng
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="order in orders" :key="order.id">
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                {{ order.order_number }}
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  {{ order.first_name }} {{ order.last_name }}
                </p>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  {{ order.email }}
                </p>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  {{ order.address1 }}
                </p>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  {{ order.total_amount }}
                </p>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                {{ order.created_at }}
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                {{
                  order.payment_status == "unpaid"
                    ? "Chưa thanh toán"
                    : "Đã thanh toán"
                }}
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                {{ order.status == 'new' ? "đơn hàng mới" : ""}}
                {{ order.status == 'process' ? "Đang xử lý" : ""}}
                {{ order.status == 'delivered' ? "Đã giao" : ""}}
                {{ order.status == 'cancel' ? "Đơn hàng đã hủy" : ""}}
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <button @click="() => showOrderDetail(order.id)">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
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
import OrdersService from "../../../../service/OrdersService.js";
import AccountService from "../../../../service/AccountService";

export default {
  name: "OrderHistoryView",
  data() {
    return {
      orders: [],
      userInfo: null,
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
          this.getAllOrderByUser();
        });
      }
    },
    getAllOrderByUser() {
      if (this.userInfo != null) {
        OrdersService.getOrderByUser(this.userInfo.id).then((res) => {
          this.orders = res.data;
        });
      }
    },
    showOrderDetail(id) {
      this.$router.push(`/OrderHistoryDetail/${id}`);
    },
  },
  mounted() {},
  created() {
    this.getAllInfoByAccountId();
    this.getAllOrderByUser();
  },
};
</script>
    
    <style>
</style>