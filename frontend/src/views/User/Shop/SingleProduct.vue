<template>
  <div class="">
    <Header />
    <Banner />
    <section
      class="overflow-hidden bg-white py-11 font-poppins dark:bg-gray-800"
    >
      <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
        <div class="flex flex-wrap -mx-4">
          <div class="w-full px-4 md:w-1/2">
            <div class="sticky top-0 overflow-hidden">
              <div class="relative mb-6 lg:mb-10 lg:h-2/4">
                <img
                  :src="fullImagePath"
                  :alt="Page.title"
                  class="object-cover w-full lg:h-full"
                />
              </div>
            </div>
          </div>
          <div class="w-full px-4 md:w-1/2">
            <div class="lg:pl-20">
              <div class="mb-8">
                <span
                  class="text-lg font-medium text-rose-500 dark:text-rose-200"
                  >New</span
                >
                <h2
                  class="max-w-xl mt-2 mb-6 text-2xl font-bold dark:text-gray-400 md:text-4xl"
                >
                  {{ Page.title }}
                </h2>
                Size
                <select
                  v-model="size"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-4"
                >
                  <option v-for="o in sizes" :key="o" :value="o">
                    {{ o }}
                  </option>
                </select>

                Màu : {{ Mau }}

                <div>
                  <div v-html="Page.summary"></div>
                </div>
                <p
                  class="inline-block mb-8 text-4xl font-bold text-gray-700 dark:text-gray-400"
                >
                  <span>{{ formatNumber(Page.price) }}</span>
                </p>
              </div>

              <div class="w-32 mb-8">
                <label
                  for=""
                  class="w-full text-xl font-semibold text-gray-700 dark:text-gray-400"
                  >Số lượng</label
                >
                <div
                  class="relative flex flex-row w-full h-10 mt-4 bg-transparent rounded-lg"
                >
                  <button
                    @click="decrease"
                    class="w-20 h-full text-gray-600 bg-gray-300 rounded-l outline-none cursor-pointer dark:hover:bg-gray-700 dark:text-gray-400 hover:text-gray-700 dark:bg-gray-900 hover:bg-gray-400"
                  >
                    <span class="m-auto text-2xl font-thin">-</span>
                  </button>
                  <input
                    disabled="true"
                    v-model="quantity"
                    @change="validateQuantity"
                    type="number"
                    min="0"
                    class="flex items-center w-full font-semibold text-center text-gray-700 placeholder-gray-700 bg-gray-300 outline-none dark:text-gray-400 dark:placeholder-gray-400 dark:bg-gray-900 focus:outline-none text-md hover:text-black"
                  />
                  <button
                    @click="increase"
                    class="w-20 h-full text-gray-600 bg-gray-300 rounded-r outline-none cursor-pointer dark:hover:bg-gray-700 dark:text-gray-400 dark:bg-gray-900 hover:text-gray-700 hover:bg-gray-400"
                  >
                    <span class="m-auto text-2xl font-thin">+</span>
                  </button>
                </div>
              </div>
              <div class="flex flex-wrap items-center -mx-4">
                <div class="w-full px-4 mb-4 lg:w-1/2 lg:mb-0">
                  <button
                    @click="addToCart"
                    class="flex items-center justify-center w-full p-4 text-blue-500 border border-blue-500 rounded-md dark:text-gray-200 dark:border-blue-600 hover:bg-blue-600 hover:border-blue-600 hover:text-gray-100 dark:bg-blue-600 dark:hover:bg-blue-700 dark:hover:border-blue-700 dark:hover:text-gray-300"
                  >
                    Thêm vào giỏ hàng
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="">
          <h1 class="font-bold text-3xl mb-4 mt-12">Mô tả chi tiết sản phẩm</h1>
          <p class="p-4" v-html="Page.description"></p>
        </div>
      </div>
      <section
        class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased"
        v-if="this.userInfo != null"
      >
        <div class="w-8/12 mx-auto px-4">
          <div class="flex justify-between items-center mb-6">
            <h2
              class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white"
            >
              Thảo luận
            </h2>
          </div>
          <form class="mb-6">
            <div
              class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700"
            >
              <label for="comment" class="sr-only">Your comment</label>
              <textarea
                v-model="comment"
                id="comment"
                rows="6"
                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                placeholder="Write a comment..."
                required
              ></textarea>
            </div>
            <div
              @click="submitForm"
              class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800"
            >
              Post comment
            </div>
          </form>
          <article
            v-for="com in PageComments"
            :key="com.id"
            class="p-6 text-base bg-white rounded-lg dark:bg-gray-900"
          >
            <footer class="flex justify-between items-center mb-2">
              <div class="flex items-center">
                <p
                  class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"
                >
                  <img
                    class="mr-2 w-6 h-6 rounded-full"
                    src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                    alt="Michael Gough"
                  />{{ com.name }}
                </p>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                  <time
                    pubdate
                    datetime="2022-02-08"
                    title="February 8th, 2022"
                    >{{ com.created_at }}</time
                  >
                </p>
              </div>
              <!-- Dropdown menu -->
            </footer>
            <p class="text-gray-500 dark:text-gray-400">
              {{ com.review }}
            </p>
          </article>
        </div>
      </section>
    </section>
    <!-- Footer -->
    <Footer />
    <!-- End Footer -->
  </div>
</template>
    
    <script>
import Footer from "../../../components/User/HomePage/Footer.vue";
import Header from "../../../components/User/HomePage/Header.vue";
import Banner from "../../../components/User/HomePage/Banner.vue";
import ProductsService from "../../../../service/ProductsService";
import ProductReviewService from "../../../../service/ProductReviewService";
import AccountService from "../../../../service/AccountService";
import ColorsService from "../../../../service/ColorsService";

import { mapActions } from "vuex";

export default {
  name: "SingleProductForBuyer",
  data() {
    return {
      isOpen: false,
      isOpen1: false,
      Page: {},
      cat: {},
      quantity: 1,
      stock: 0,
      PageComments: [],
      comment: "",
      size: null,
      userInfo: null,
      sizes: [],
      colors: [],
      Mau: "",
    };
  },
  components: {
    Footer,
    Header,
    Banner,
  },
  methods: {
    ...mapActions(["changeCartChangeNumber"]),
    getAllColors() {
      ColorsService.getAll().then((res) => {
        this.colors = res.data;
        for (let i = 0; i < this.colors.length; i++) {
          if (this.colors[i].id == this.Page.color_id) {
            this.Mau = this.colors[i].color;
            console.log(this.Mau);
          }
        }
      });
    },
    addToCart() {
      let cartJson = localStorage.getItem("CCNN");
      let list = [];
      let productItem = this.createCartObject();

      if (cartJson != null) {
        let jsonDecode = cartJson;
        list = JSON.parse(jsonDecode);

        // Check if the same size variant already exists in the cart
        let existingProduct = list.find(
          (item) => item.id === productItem.id && item.size === productItem.size
        );

        if (existingProduct) {
          // Update the quantity of the existing size variant
          existingProduct.quantity += productItem.quantity;
          this.changeCartChangeNumber(productItem.quantity);
        } else {
          // Add the new size variant to the cart
          list.push(productItem);
          this.changeCartChangeNumber(1);
        }
      } else {
        list.push(productItem);
        this.changeCartChangeNumber(1);
      }

      let jsonString = JSON.stringify(list);
      let jsonEncode = jsonString;
      localStorage.setItem("CCNN", jsonEncode);
    },
    loadCartFromLocalStorage() {
      this.cart = JSON.parse(localStorage.getItem("CCNN")) || [];
    },
    findProductInCart(listProduct, newProduct) {
      let listIndex = null;
      listProduct.forEach((product, index) => {
        if (product.id == newProduct.id) {
          listIndex = index;
        }
      });
      return listIndex;
    },
    updateProductQuantityInCart(list, productPosition, productItem) {
      let newList = list;
      newList[productPosition].quantity += productItem.quantity;
      this.changeCartChangeNumber(1);
      return newList;
    },
    createCartObject() {
      return {
        id: this.Page.id,
        title: this.Page.title,
        category_slug: this.Page.category_slug,
        price: this.Page.price,
        // parseFloat(this.Page.price) *
        // (parseFloat(this.Page.discount) != 1
        //   ? 1 - parseFloat(this.Page.discount)
        //   : 1)
        photo: this.Page.photo,
        quantity: this.quantity,
        size: this.size,
      };
    },

    increase() {
      if (this.stock > 0) {
        this.quantity += 1;
        // this.stock--;
      } else {
        console.log("qua gioi han");
      }
    },
    decrease() {
      if (this.quantity >= 2) {
        this.quantity -= 1;
        // this.stock++;
      }
    },
    validateQuantity() {
      if (this.quantity < 1) {
        this.quantity = 1;
      }
    },
    // Trong phương thức getPage
    getPage(id) {
      ProductsService.getByID(id).then((res) => {
        this.Page = res.data;

        // Sử dụng split để tách chuỗi thành mảng
        const sizesArray = this.Page.size.split(",");

        // Thêm mảng mới vào mảng sizes
        this.sizes.push(...sizesArray);
        this.size = this.sizes[0];
        console.log("sizes:", this.sizes);
        this.stock = this.Page.stock - 1;
        this.stock = 10; // Bạn có thể cần xác định giá trị này dựa trên dữ liệu thực tế từ API
      });
    },

    getPageComment(id) {
      ProductReviewService.getByID(id).then((res) => {
        this.PageComments = res.data;
        console.log("tesst", this.PageComments);
      });
    },
    submitForm() {
      if (this.userInfo != null) {
        ProductReviewService.insertComment(
          this.userInfo.id,
          this.Page.id,
          this.comment
        ).then(() => {
          this.comment = "";
          this.getPageComment(this.Page.id);
        });
      } else {
        return;
      }
      // console.log("this.blogData.id====" , this.userInfo.id);
    },
    getAllInfoByAccountId() {
      if (sessionStorage.getItem("id") != null) {
        AccountService.getByID(sessionStorage.getItem("id")).then((res) => {
          this.userInfo = res.data;
          // this.getWishList();
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
  },
  computed: {
    PageId() {
      return this.$route.params.id;
    },
    fullImagePath() {
      const baseUrl = "http://127.0.0.1:8000/uploads/";
      return baseUrl + this.Page.photo;
    },
  },
  created() {
    this.getAllInfoByAccountId();
    this.getPageComment(this.PageId);
    this.getPage(this.PageId);
    this.loadCartFromLocalStorage();
    this.getAllColors();
  },
};
</script>
    
    <style>
</style>