<template>
  <div class="">
    <Header />
    <Banner />
    <div
      class="w-full flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
    >
      <div class="w-full sm:max-w-md p-5 mx-auto">
        <h2 class="mb-12 text-center text-5xl font-extrabold">Xin chào</h2>
        <form @submit.prevent="validate()" method="post">
          <div class="mb-4">
            <label class="block mb-1" for="email">Email-Address</label>
            <input
              v-model="account.email"
              required
              id="email"
              type="text"
              name="email"
              class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full"
            />
          </div>
          <div class="mb-4">
            <label class="block mb-1" for="password">Mật khẩu</label>
            <input
              v-model="account.password"
              required
              id="password"
              type="password"
              name="password"
              class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full"
            />
          </div>
          <div class="mt-6">
            <button
              type="submit"
              class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold capitalize text-white hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition"
            >
              Sign In
            </button>
          </div>
          <div class="mt-6 text-center">
            <router-link to="/register" class="underline"
              >Đăng ký tài khoản</router-link
            >
          </div>
        </form>
        <notification
          v-if="notification.show"
          :show="notification.show"
          :type="notification.type"
          :message="notification.message"
        />
      </div>
    </div>
    <Footer />
  </div>
</template>
      
      <script>
import Footer from "../../../components/User/HomePage/Footer.vue";
import Header from "../../../components/User/HomePage/Header.vue";
import Banner from "../../../components/User/HomePage/Banner.vue";
import AccountService from "../../../../service/AccountService.js";
import Notification from "../../../components/User/Notification/Notification";

export default {
  name: "LoginViewPage",
  data() {
    return {
      account: {
        password: "",
        email: "",
      },
      notification: {
        show: false,
        type: "success", // or "error"
        message: "",
      },
    };
  },
  components: {
    Footer,
    Header,
    Banner,
    Notification,
  },
  methods: {
    validate() {
      if (!this.account.email || !this.account.password) {
        return false;
      }
      this.getCheckLogin();
    },
    getCheckLogin() {
      AccountService.checkLogin(this.account.email, this.account.password).then(
        (res) => {
          if (res.data != null) {
            AccountService.getByID(res.data.id).then((res) => {
              sessionStorage.setItem("id", res.data.id);
              console.log("Login thanh cong");
              this.$router.push("/");
            });
          } else {
            console.log("Sai ten dang nhạp hoac mat khau");
            this.showNotification("error", "Sai tên đăng nhập hoặc mật khẩu");
          }
        }
      );
    },
    showNotification(type, message) {
      this.notification = {
        show: true,
        type,
        message,
      };

      // Hide the notification after a delay (e.g., 5 seconds)
      setTimeout(() => {
        this.notification.show = false;
      }, 5000);
    },
  },
};
</script>
      
      <style>
</style>