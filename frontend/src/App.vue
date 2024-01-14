<template>
  <router-view />
</template>
<script>
import AOS from "aos";

export default {
  name: "HomePageUser",

  mounted() {
    AOS.init();
  },
};
</script>
<style>
</style>
