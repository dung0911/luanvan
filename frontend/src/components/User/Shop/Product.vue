<template>
  <div class="group relative border rounded-sm">
    <div
      class="relative aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none lg:h-80"
    >
      <p
        v-if="blogData.discount != null && blogData.discount > 0"
        class="absolute top-2 right-4 py-1 px-5 bg-red-500 rounded-sm text-white"
      >
        Giảm giá {{ blogData.discount }}%
      </p>
      <img
        :src="fullImagePath"
        alt="Front of men&#039;s Basic Tee in black."
        class="h-full w-full object-cover object-center lg:h-full lg:w-full"
      />
      <div class="hidden group-hover:block absolute bottom-3 left-3">
        <button
          @click="addToCart"
          class="mx-1 bg-red-300 hover:bg-black hover:text-white px-3 py-2 my-1 rounded-full"
        >
          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        </button>

        <button
          @click="submitForm"
          v-if="userInfo != null"
          class="mx-1 bg-gray-300 hover:bg-black hover:text-white px-3 py-2 my-1 rounded-full"
        >
          <i class="fa fa-heart" aria-hidden="true"></i>
        </button>

        <button
          @click="() => showProductDetail(blogData.id, blogData.slug)"
          class="mx-1 bg-gray-300 hover:bg-black hover:text-white px-3 py-2 my-1 rounded-full"
        >
          <i class="fa fa-search" aria-hidden="true"></i>
        </button>
      </div>
    </div>
    <div class="flex justify-between p-4">
      <h3 class="text-sm text-gray-700">
        <router-link :to="`/singleProduct/${blogData.id}-${blogData.slug}`">
          {{ blogData.title }}
        </router-link>
      </h3>
      <p class="text-sm font-medium text-gray-900">
        {{ formatNumber(blogData.price) }}
      </p>
    </div>
  </div>

  <!-- More products... -->
</template>

<script>
import WishlistsService from "../../../../service/WishlistsService";
import AccountService from "../../../../service/AccountService";
// let currentDate = new Date();
import { mapActions } from "vuex";

export default {
  name: "ProductComponent",
  props: {
    blogData: Object,
  },
  data() {
    return {
      userInfo: null,
      wishlists: [],
    };
  },
  methods: {
    ...mapActions(["changeCartChangeNumber"]),
    addToCart() {
      let cartJson = localStorage.getItem("CCNN");
      let list = [];
      let productItem = this.createCartObject();
      if (cartJson != null) {
        let jsonDecode = cartJson;
        list = JSON.parse(jsonDecode);
        let productPosition = this.findProductInCart(list, productItem);
        if (productPosition != null) {
          list = this.updateProductQuantityInCart(
            list,
            productPosition,
            productItem
          );
        } else {
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
        id: this.blogData.id,
        title: this.blogData.title,
        category_slug: this.blogData.category_slug,
        price: this.blogData.price,
        // parseFloat(this.blogData.price) *
        // (parseFloat(this.blogData.discount) != 1
        //   ? 1 - parseFloat(this.blogData.discount)
        //   : 1)
        photo: this.blogData.photo,
        quantity: 1,
        size: this.blogData.size.split(",")[0],
      };
    },
    formatNumber(value) {
      const formattedValue = new Intl.NumberFormat("vi-VN", {
        style: "currency",
        currency: "VND",
      }).format(value);

      // Thay thế ký hiệu mặc định (₫) bằng "VNĐ"
      return formattedValue.replace("₫", "VNĐ");
    },
    showProductDetail(blogID, slug) {
      this.$router.push(`/singleProduct/${blogID} - ${slug}`);
    },
    getWishList() {
      if (this.userInfo != null) {
        WishlistsService.getByID(this.userInfo.id).then((res) => {
          this.wishlists = res.data;
        });
      }
    },
    isInWishList() {},
    submitForm() {
      WishlistsService.insertWishlist(this.blogData.id, this.userInfo.id).then(
        () => {}
      );
    },
    async getAllInfoByAccountId() {
      if (sessionStorage.getItem("id") != null) {
        await AccountService.getByID(sessionStorage.getItem("id")).then(
          (res) => {
            this.userInfo = res.data;
          }
        );
      }
    },
  },
  computed: {
    fullImagePath() {
      const baseUrl = "https://shopluanvan.x10.mx/uploads/";
      return baseUrl + this.blogData.photo;
    },
  },
  async created() {
    await this.getAllInfoByAccountId();
    // this.getWishList();
  },
};
</script>

<style>
</style>