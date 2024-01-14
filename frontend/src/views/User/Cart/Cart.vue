<template>
  <div class="">
    <Header />
    <Banner />
    <div class="container mx-auto mt-10">
      <h1 class="text-red-500" v-if="!tb">{{ thongbao }}</h1>
      <h1 class="text-red-500" v-if="tb">{{ thongbao }}</h1>

      <form>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
          <div>
            <label
              for="first_name"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Tên họ</label
            >
            <input
              type="text"
              id="first_name"
              v-model="first_name"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Nguyễn Trung"
            />
          </div>
          <div>
            <label
              for="last_name"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Tên</label
            >
            <input
              type="text"
              id="last_name"
              v-model="last_name"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Dũng"
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
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Địa chỉ 1"
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
              placeholder="Địa chỉ 2"
            />
          </div>
          <div>
            <label
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Quốc gia</label
            >
            <input
              type="text"
              v-model="country"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Việt Nam"
            />
          </div>
          <div></div>
          <div>
            <label
              for="visitors"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Mã PostCode</label
            >
            <input
              type="text"
              v-model="post_code"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="700000"
            />
          </div>
        </div>
        <div class="mb-6">
          <label
            for="email"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            >Địa chỉ Email</label
          >
          <input
            type="email"
            v-model="email"
            id="email"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="demo@gmail.com"
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
        <div class="hidden">
          Trạng thái thanh toán
          <select
            v-model="payment_status"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-4"
          >
            <option value="paid">Paid</option>
            <option value="unpaid">Unpaid</option>
          </select>
        </div>
        Phương thức vận chuyển
        <select
          v-model="shipId"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-4"
        >
          <option v-for="ship in shippings" :key="ship.id" :value="ship.id">
            {{ ship.type }}
          </option>
        </select>
        Phiếu giảm giá
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
            <h1 class="font-semibold text-2xl">Giỏ hàng</h1>
            <h2 class="font-semibold text-2xl">
              Số lượng: {{ totalQuantity }}
            </h2>
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
            v-for="(product, index) in listProductInCart"
            :key="product.id"
            class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5"
          >
            <div class="flex w-2/5">
              <!-- product -->
              <div class="w-20">
                <img
                  class="h-24"
                  :src="`https://shopluanvan.x10.mx/uploads/` + product.photo"
                  :alt="product.title"
                />
              </div>
              <div class="flex flex-col justify-between ml-4 flex-grow">
                <span class="font-bold text-sm">{{ product.title }}</span>
                <div
                  @click="() => removeItemInList(index)"
                  class="font-semibold hover:text-red-500 text-gray-500 text-xs cursor-pointer"
                >
                  xóa
                </div>
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
            Tiếp tục mua sắm
          </router-link>
        </div>

        <div id="summary" class="w-1/4 px-8 py-10">
          <h1 class="font-semibold text-2xl pb-8">Tổng giá trị sản phẩm</h1>
          <div class="border-t">
            <div
              class="flex font-semibold justify-between py-6 text-sm uppercase"
            >
              <span>Tổng giá tiền sản phẩm</span>
              <span>{{ formatNumber(tongGiaTriXem) }}</span>
            </div>
            <div
              class="flex font-semibold justify-between py-6 text-sm uppercase"
            >
              <span>Giá trị giảm</span>
              <span>- {{ formatNumber(tongTienGiam) }}</span>
            </div>
            <div
              class="flex font-semibold justify-between py-6 text-sm uppercase border-b-4 pb-3"
            >
              <span>Tiền ship</span>
              <span>{{ formatNumber(tienShip) }}</span>
            </div>
            <div
              class="flex font-semibold justify-between py-6 text-sm uppercase"
            >
              <span>Giá tiền thanh toán</span>
              <span>{{ formatNumber(totalPrice) }}</span>
            </div>
            <div
              @click="insertOrderToO"
              class="bg-indigo-500 border rounded-sm text-center font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full"
            >
              Thanh toán
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
import OrdersDetailService from "../../../../service/OrdersDetailService.js";
import ProductsService from "../../../../service/ProductsService";

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
      country: "Việt Nam",
      post_code: "70000",
      email: "",
      payment_method: "paypal",
      payment_status: "unpaid",
      userInfo: [],
      shippings: [],
      shipId: null,
      coupons: [],
      couponId: null,
      StringOrderNumber: "",
      orderNumberInterval: null,
      thongbao: "",
      thongbao2: "",
      tb: false,
      products: [],
      tienShip: 0,
      tongGiaTriXem: 0,
      tongTienGiam: 0,
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
    getAllProducts() {
      ProductsService.getAll().then((res) => {
        this.products = res.data;
      });
    },
    getTotalQuantity(list) {
      let totalQuantity = 0;
      let totalPrice = 0;
      list.forEach((product) => {
        totalQuantity += product.quantity;
        totalPrice += product.quantity * product.price;
      });
      this.totalPrice = totalPrice + parseFloat(this.tienShip);
      this.tongGiaTriXem = totalPrice;
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

    insertOrderToO() {
      if (
        this.address1 == null ||
        this.address2 == null ||
        this.phone == null
      ) {
        this.tb = true;
        this.thongbao = "Vui lòng nhập đầy đủ thông tin!";
        return;
      }

      this.tb = false;
      this.listProductInCart.forEach((e) => {
        this.products.forEach((b) => {
          if (e.id == b.id && e.quantity > b.stock) {
            this.tb = true;
            this.thongbao = `Số lượng sản phẩm "${b.title}" trong giỏ hàng vượt quá số lượng trong kho.`;
            return;
          }
        });
      });

      if (this.tb == true) {
        return;
      }

      if (
        this.userInfo &&
        this.userInfo !== "" &&
        this.listProductInCart.length > 0
      ) {
        // if (this.listProductInCart[i].stock < this.products[j].stock) {
        this.tb = true;
        OrdersService.insertOrder(
          this.StringOrderNumber,
          this.userInfo.id,
          this.parseAndSum(
            this.totalPrice,
            this.shipping_price,
            this.voucher_price
          ),
          this.shipId,
          this.voucher_price,
          this.totalPrice,
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
          this.listProductInCart.forEach((product) => {
            OrdersDetailService.insertOrderDetail(
              product.id,
              res.data.id,
              this.userInfo.id,
              product.price,
              product.quantity,
              product.price * product.quantity,
              product.size
            );
            for (let j = 0; j < this.products.length; j++) {
              if (this.products[j].id == product.id) {
                ProductsService.updateProduct(
                  this.products[j].stock - product.quantity,
                  product.id
                ).then((res) => {
                  console.log("da update thanh cong" + res.data);
                });
              }
            }
          });
          localStorage.removeItem("CCNN");
          this.$router.push(`/CartDetail/${res.data.id}`);
        });
        //   console.log("lớn hơn");
        // } else {

        //   console.log("bé hơn");
        // }
      } else {
        this.tb = false;
        this.thongbao = "Giỏ hàng rỗng vui lòng mua sản phẩm để thanh toán";
        console.log("login account");
      }
    },
    parseAndSum(...values) {
      let total = 0;
      values.forEach((value) => {
        const parsedValue = parseFloat(value);
        if (!isNaN(parsedValue)) {
          total += parsedValue;
        }
      });
      return total.toFixed(2); // Giữ hai chữ số thập phân
    },
    getAllInfoByAccountId() {
      if (sessionStorage.getItem("id") != null) {
        AccountService.getByID(sessionStorage.getItem("id")).then((res) => {
          this.userInfo = res.data;
          this.first_name = res.data.name;
          this.last_name = res.data.name;
          this.email = res.data.email;
          this.address1 = res.data.diachi;
          this.address2 = res.data.diachi;
          this.phone = res.data.sodienthoai;
        });
      }
    },

    getAllShipping() {
      ShippingService.getAll().then((res) => {
        this.shippings = res.data;
        if (res.data.length > 0) {
          this.shipId = res.data[0].id;
        }
      });
    },
    getAllCoupon() {
      CouponService.getAll().then((res) => {
        this.coupons = res.data;
        if (res.data.length > 0) this.couponId = res.data[0].id;
      });
    },
    updateOrderNumber() {
      const date = new Date();
      const year = date.getFullYear();
      const month = (date.getMonth() + 1).toString().padStart(2, "0");
      const day = date.getDate().toString().padStart(2, "0");
      const hours = date.getHours().toString().padStart(2, "0");
      const minutes = date.getMinutes().toString().padStart(2, "0");
      const seconds = date.getSeconds().toString().padStart(2, "0");
      const milliseconds = date.getMilliseconds().toString().padStart(3, "0");

      const newOrderNumber =
        "ĐH" +
        `${year}${month}${day}${hours}${minutes}${seconds}${milliseconds}`;

      if (newOrderNumber !== this.StringOrderNumber) {
        this.StringOrderNumber = newOrderNumber;
      }
    },
    getTotalPriceWithoutShip() {
      let totalPrice = 0;
      this.listProductInCart.forEach((product) => {
        totalPrice += product.quantity * product.price;
      });
      return totalPrice;
    },
    calculateTotalPrice() {
      const totalPrice =
        this.parseAndSum(this.getTotalPriceWithoutShip()) -
        (this.voucher_price / 100) *
          this.parseAndSum(this.getTotalPriceWithoutShip());
      this.totalPrice = totalPrice + parseFloat(this.tienShip);
      this.tongGiaTriXem = this.parseAndSum(this.getTotalPriceWithoutShip());
      this.tongTienGiam =
        (this.voucher_price / 100) *
        this.parseAndSum(this.getTotalPriceWithoutShip());
    },
  },
  watch: {
    shipId: function (newShipId) {
      // Lấy giá trị tiền ship tương ứng với shipId mới
      const selectedShipping = this.shippings.find(
        (ship) => ship.id === newShipId
      );

      // Cập nhật tổng tiền với tiền ship mới
      this.tienShip = selectedShipping ? selectedShipping.price : 0;
      this.totalPrice =
        this.parseAndSum(this.getTotalPriceWithoutShip()) -
        (this.voucher_price / 100) *
          this.parseAndSum(this.getTotalPriceWithoutShip()) +
        parseFloat(this.tienShip);
      this.tongGiaTriXem = this.parseAndSum(this.getTotalPriceWithoutShip());
      this.tongTienGiam =
        (this.voucher_price / 100) *
        this.parseAndSum(this.getTotalPriceWithoutShip());
    },
    couponId: function (newCouponId) {
      // Lấy thông tin về mã giảm giá dựa trên couponId mới
      const selectedCoupon = this.coupons.find(
        (coupon) => coupon.id === newCouponId
      );

      // Kiểm tra xem mã giảm giá có tồn tại không
      if (selectedCoupon) {
        // Thực hiện các hành động cần thiết với thông tin mã giảm giá đã chọn
        console.log("Bạn đã chọn mã giảm giá:", selectedCoupon.code);
        // Thực hiện các hành động khác tùy thuộc vào yêu cầu của bạn
        // Ví dụ: Cập nhật giá trị voucher_price, và sau đó cập nhật tổng giá trị
        this.voucher_price = selectedCoupon.value;
        this.calculateTotalPrice();
      } else {
        // Nếu mã giảm giá không tồn tại, bạn có thể thực hiện các hành động khác tùy thuộc vào yêu cầu của bạn
        console.log("Mã giảm giá không hợp lệ");
      }
    },
  },
  created() {
    this.updateOrderNumber();

    // Set up interval to update StringOrderNumber every second
    this.orderNumberInterval = setInterval(() => {
      this.updateOrderNumber();
    }, 1000);
    this.getAllProductInCart();
    this.getAllInfoByAccountId();
    this.getAllShipping();
    this.getAllCoupon();
    this.getAllProducts();
    this.calculateTotalPrice();
  },
  beforeUnmount() {
    // Clear the interval when the component is about to be unmounted
    clearInterval(this.orderNumberInterval);
  },
};
</script>
    
    <style>
</style>