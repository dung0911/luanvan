<template>
  <div class="relative">
    <img :src="fullImagePath" alt="" />
    <div class="absolute lg:top-1/3 top-1/4" style="left: 20%">
      <h1 class="lg:text-2xl text-xl font-semibold uppercase mb-2">
        {{ header }}
      </h1>
      <p class="lg:text-6xl text-4xl mb-4 font-bold">{{ desc }}</p>
      <router-link
        to="/shop"
        class="text-white bg-black px-4 py-2 rounded-sm hover:text-black hover:bg-white border"
      >
        Explore now
      </router-link>
    </div>
  </div>
</template>

<script>
import BannersService from "../../../../service/BannersService";

export default {
  name: "BannerComponent",
  data() {
    return {
      banners: [],
    };
  },
  props: {
    header: String,
    desc: String,
  },
  methods: {
    getAllBanners() {
      BannersService.getAll().then((res) => {
        this.banners = res.data;
      });
    },
  },
  created() {
    this.getAllBanners();
  },
  computed: {
    fullImagePath() {
      const baseUrl = "https://shopluanvan.x10.mx//uploads/";
      return baseUrl + this.banners.photo;
    },
  },
};
</script>

<style>
</style>