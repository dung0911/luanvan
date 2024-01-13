<template>
  <div class="">
    <Header />
    <Banner />
    <div
      class="w-full flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
    >
      <div class="w-full sm:max-w-md p-5 mx-auto">
        <h2 class="mb-12 text-center text-5xl font-extrabold">Đăng ký tài khoản.</h2>
        <form
          @submit.prevent="validate()"
          action=""
          method="post"
          class="realtive border p-4 bg-gray-50 py-5"
        >
          <div class="">
            <div>
              <input
                required
                type="text"
                v-model="account.name"
                class="border px-4 py-2 my-2 w-full bg-white"
                placeholder="Tên tài khoản"
              />
            </div>
            <input
              required
              type="email"
              v-model="account.email"
              class="border px-4 py-2 my-2 w-full"
              placeholder="Email*"
            />
            <div class="flex items-center w-full">
              <div class="w-full">
                <input
                  required
                  v-bind:type="showPassword ? 'text' : 'password'"
                  class="border px-4 py-2 my-2 w-full bg-white"
                  v-model="account.password"
                  placeholder="Mật khẩu*"
                />
              </div>
              <div class="border py-2 px-3">
                <div class="button" @click="toggleShow">
                  <span class="icon is-small is-right">
                    <i
                      class="fas"
                      :class="{
                        'fa fa-eye': showPassword,
                        'fa fa-eye-slash': !showPassword,
                      }"
                    ></i>
                  </span>
                </div>
              </div>
            </div>
            <div class="flex items-center w-full">
              <div class="w-full">
                <input
                  required
                  v-bind:type="showRePassword ? 'text' : 'password'"
                  class="border px-4 py-2 my-2 w-full bg-white"
                  v-model="account.Repeat_password"
                  placeholder="Nhập lại mật khẩu*"
                />
              </div>
              <div class="border py-2 px-3">
                <div class="button" @click="toggleShowRepwd">
                  <span class="icon is-small is-right">
                    <i
                      class="fas"
                      :class="{
                        'fa fa-eye': showRePassword,
                        'fa fa-eye-slash': !showRePassword,
                      }"
                    ></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <button
            type="submit"
            class="w-full py-3 bg-black hover:bg-gray-800 duration-500 text-white border my-2 uppercase"
          >
            Đăng ký
          </button>
        </form>
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

export default {
  name: "RegisterViewPage",
  data() {
    return {
      showPassword: false,
      showRePassword: false,
      account: {
        name: "",
        email: "",
        password: "",
        Repeat_password: "",
        role: "user",
      },
    };
  },
  components: {
    Footer,
    Header,
    Banner,
  },
  computed: {
    buttonLabel() {
      return this.showPassword ? "Hide" : "Show";
    },
  },
  methods: {
    toggleShow() {
      this.showPassword = !this.showPassword;
    },
    toggleShowRepwd() {
      this.showRePassword = !this.showRePassword;
    },
    validate() {
      // if (this.account.password !== this.account.Repeat_password) {
      //   this.notification = "check your repeate password !!!";
      //   this.modelToggle = true;
      //   return false;
      // } else if (this.account.password.length < 8) {
      //   this.notification = "Your password is too short !!!";
      //   this.modelToggle = true;
      //   return false;
      // }
      this.checkRegister();
    },
    checkRegister() {
      console.log("Vo duoc day");

      AccountService.checkEmailExisted(this.account.email).then((res) => {
        console.log("Khong bi trung mail");

        this.saveData(res.data);
      });
    },
    saveData(data) {
      if (data) {
        this.notification = "your email is existed !!!";
        this.modelToggle = true;
      } else {
        console.log("Vo day duoc roi");
        AccountService.registerAccount(
          this.account.name,
          this.account.email,
          this.account.password,
          this.account.role
        ).then((res) => {
          if (res.data) {
            this.$router.push("/login");
          }
        });
      }
    },
  },
};
</script>
<style>
</style>