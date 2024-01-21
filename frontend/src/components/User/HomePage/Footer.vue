<template>
  <footer class="p-8 uppercase" style="background-color: hsl(240, 12%, 97%)">
    <div class="lg:flex justify-between w-8/12 mx-auto leading-loose">
      <div class="mb-12">
        <router-link to="/">
          <img
            src="../../../assets/White Minimalist Online Fashion Shop Bag Logo.jpg"
            class="h-32"
            alt=""
          />
        </router-link>
        <p>30 Đ. Tân Thắng, Sơn Kỳ, Tân Phú, Thành phố Hồ Chí Minh</p>
        <p>028 6288 7733</p>
        <p>contact@gmail.com</p>
        <div class="flex justify-left mt-6">
          <a href="https://www.facebook.com/trungdung.nguyen.0911"
            ><i class="mx-4 fa fa-facebook" aria-hidden="true"></i
          ></a>
          <a href="https://www.facebook.com/trungdung.nguyen.0911"
            ><i class="mx-4 fa fa-instagram" aria-hidden="true"></i
          ></a>
          <a href="https://www.facebook.com/trungdung.nguyen.0911"
            ><i class="mx-4 fa fa-twitter" aria-hidden="true"></i
          ></a>
          <a href="https://www.facebook.com/trungdung.nguyen.0911"
            ><i class="mx-4 fa fa-pinterest-p" aria-hidden="true"></i
          ></a>
          <a href="https://www.facebook.com/trungdung.nguyen.0911"
            ><i class="mx-4 fa fa-snapchat" aria-hidden="true"></i
          ></a>
        </div>
      </div>
      <div class="mb-12">
        <h3 class="text-xl font-semibold mb-4">Chính sách khách hàng</h3>
        <router-link to="/vechungtoi">Về chúng tôi</router-link><br />
        <router-link to="/thongtingiaohang">Thông tin giao hàng</router-link><br />
        <router-link to="/dieukhoansudung">Điều khoản & Điều kiện</router-link><br />
      </div>
      <div class="lg:w-1/3">
        <h3 class="text-xl font-semibold mb-4">THÔNG TIN CỬA HÀNG</h3>
        <table class="w-full">
          <thead></thead>
          <tbody>
            <tr class="border-b">
              <td class="text-left">Thứ 2 - Thứ 6</td>
              <td class="text-right">08:00 - 20:00</td>
            </tr>
            <tr class="border-b">
              <td class="text-left">Thứ 7</td>
              <td class="text-right">09:00 - 21:00</td>
            </tr>
            <tr class="border-b">
              <td class="text-left">Chủ nhật</td>
              <td class="text-right">13:00 - 22:00</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "footerPageView",
};
</script>

<style>
</style>