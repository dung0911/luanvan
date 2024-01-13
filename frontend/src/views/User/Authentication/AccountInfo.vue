<template>
  <div>
    <Header />
    <Banner />

    <section class="py-1 bg-blueGray-50">
      <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        <form action="">
          <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
          >
            <h1 class="text-red-500" v-if="tb">{{ thongBao }}</h1>
            <div class="rounded-t bg-white mb-0 px-6 py-6">
              <div class="text-center flex justify-between">
                <h6 class="text-blueGray-700 text-xl font-bold">
                  Tài khoản của tôi
                </h6>
                <button
                  v-if="!editMode"
                  @click="updateUserInfo"
                  class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                  type="button"
                >
                  Cập nhật
                </button>
                <button
                  v-if="editMode"
                  @click="submitForm"
                  class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                  type="button"
                >
                  Lưu
                </button>
              </div>
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
              <h6
                class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase"
              >
                Thông tin người dùng
              </h6>
              <div class="w-full">
                <div class="relative w-full mb-3">
                  <label
                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    for="avatar"
                  >
                    Ảnh đại diện
                  </label>
                  <input
                    v-if="editMode"
                    type="file"
                    id="avatar"
                    @change="handleFileChange"
                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                  />
                  <img
                    v-else
                    :src="`https://shopluanvan.x10.mx/uploads/` + userInfo.photo"
                    alt="Avatar"
                    class="flex justify-center rounded-full mx-auto w-64 h-64 p-1 border-2"
                  />
                </div>
              </div>
              <div class="flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4">
                  <div class="relative w-full mb-3">
                    <label
                      class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                      for="name"
                    >
                      Tên người dùng
                    </label>
                    <input
                      v-if="editMode"
                      v-model="name"
                      type="text"
                      id="name"
                      class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                      :disabled="!editMode"
                    />

                    <input
                      v-if="!editMode"
                      type="text"
                      disabled
                      :value="userInfo.name"
                      class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    />
                  </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                  <div class="relative w-full mb-3">
                    <label
                      class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                      for="email"
                    >
                      Địa chỉ email
                    </label>
                    <input
                      v-if="editMode"
                      type="email"
                      v-model="email"
                      id="email"
                      pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="example@example.com"
                      required
                    />

                    <input
                      v-if="!editMode"
                      type="text"
                      disabled
                      :value="userInfo.email"
                      class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    />
                  </div>
                </div>
              </div>
              <div class="flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4">
                  <div class="relative w-full mb-3">
                    <label
                      class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    >
                      Địa chỉ
                    </label>
                    <input
                      v-if="editMode"
                      v-model="diachi"
                      type="text"
                      id="diachi"
                      class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                      :disabled="!editMode"
                    />

                    <input
                      v-if="!editMode"
                      type="text"
                      id="diachi"
                      disabled
                      :value="userInfo.diachi"
                      class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    />
                  </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                  <div class="relative w-full mb-3">
                    <label
                      class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                      for="quocgia"
                    >
                      Quốc gia
                    </label>
                    <input
                      v-if="editMode"
                      type="text"
                      v-model="quocgia"
                      id="quocgia"
                      pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="example@example.com"
                      required
                    />

                    <input
                      v-if="!editMode"
                      type="text"
                      disabled
                      :value="userInfo.quocgia"
                      class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    />
                  </div>
                </div>
              </div>
              <div class="flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4">
                  <div class="relative w-full mb-3">
                    <label
                      class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                      for="name"
                    >
                      Số điện thoại
                    </label>
                    <input
                      v-if="editMode"
                      v-model="sodienthoai"
                      type="text"
                      class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                      :disabled="!editMode"
                    />

                    <input
                      v-if="!editMode"
                      type="text"
                      id="sodienthoai"
                      disabled
                      :value="userInfo.sodienthoai"
                      class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    />
                  </div>
                </div>

                <div class="w-full lg:w-6/12 px-4">
                  <div class="relative w-full mb-3">
                    <label
                      class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                      for="password"
                    >
                      Mật khẩu
                    </label>
                    <input
                      v-if="editMode"
                      v-model="password"
                      type="password"
                      id="password"
                      class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                      :disabled="!editMode"
                    />
                    <input
                      v-if="!editMode"
                      type="password"
                      disabled
                      :value="userInfo.password"
                      class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
    <Footer />
  </div>
</template>

<script>
import Footer from "../../../components/User/HomePage/Footer.vue";
import Header from "../../../components/User/HomePage/Header.vue";
import Banner from "../../../components/User/HomePage/Banner.vue";
import AccountService from "../../../../service/AccountService.js";
export default {
  name: "AccountInfomationView",
  data() {
    return {
      userInfo: [],
      editMode: false,
      name: "",
      email: "",
      password: "",
      quocgia: "",
      diachi: "",
      sodienthoai: "",
      photo: null,
      thongBao: "",
      tb: false,
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
    getUserInfo() {
      this.name = this.userInfo.name;
      this.email = this.userInfo.email;
      this.password = this.userInfo.password;
    },
    updateUserInfo() {
      // Enable edit mode
      this.editMode = true;

      // Assign current user info to form fields
      this.name = this.userInfo.name;
      this.email = this.userInfo.email;
      this.password = this.userInfo.password;
      this.sodienthoai = this.userInfo.sodienthoai;
      this.quocgia = this.userInfo.quocgia;
      this.diachi = this.userInfo.diachi;
    },
    isEmailValid(email) {
      const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      return emailRegex.test(email);
    },
    submitForm() {
      if (this.editMode && this.isEmailValid(this.email)) {
        this.tb = false;

        // Disable edit mode
        this.editMode = false;
        AccountService.updateAccount(
          this.name,
          this.email,
          this.password,
          this.photo,
          this.sodienthoai,
          this.diachi,
          this.quocgia,
          this.userInfo.id
        ).then(() => {
          this.getAllInfoByAccountId();
        });
      } else {
        this.tb = true;
        this.thongBao = "Thông tin không hợp lệ vui lòng xem lại";
      }
      this.getAllInfoByAccountId();
    },
    handleFileChange(event) {
      const file = event.target.files[0];

      if (file == null) {
        this.photo = "";
      }

      if (file) {
        this.photo = file.name;
      }
    },
  },

  created() {
    // Fetch initial user info
    this.getAllInfoByAccountId();

    // Get user info without enabling edit mode
    this.getUserInfo();
  },
};
</script>

<style>
/* ... */
</style>