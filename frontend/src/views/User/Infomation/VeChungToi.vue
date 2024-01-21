<template>
  <div class="">
    <Header />
    <Banner />
    <div class="py-16 bg-white">
      <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
        <div
          class="space-y-6 md:space-y-0 md:flex md:gap-6 lg:items-center lg:gap-12"
        >
          <div class="md:5/12 lg:w-5/12">
            <img
              src="https://tailus.io/sources/blocks/left-image/preview/images/startup.png"
              alt="image"
              loading="lazy"
              width=""
              height=""
            />
          </div>
          <div class="md:7/12 lg:w-6/12">
            <h2 class="text-2xl text-gray-900 font-bold md:text-4xl">
              Về chúng tôi
            </h2>
            <p class="text-md py-4">
              Chào mừng bạn đến với chúng tôi - nơi mang đến cho bạn trải nghiệm
              mua sắm trực tuyến độc đáo và thú vị! Chúng tôi tự hào giới thiệu
              mình là trang web bán quần áo hàng đầu, nơi bạn có thể tìm thấy
              những xu hướng thời trang mới nhất và những bộ trang phục phong
              cách để nâng cao vẻ ngoại hình của mình.
            </p>
            <p class="text-md py-4">
              Tại đây, chúng tôi cam kết đem đến cho khách hàng những sản phẩm
              chất lượng cao, thiết kế độc đáo và giá trị vô song. Chúng tôi
              không chỉ là nơi để bạn mua sắm, mà còn là nguồn cảm hứng cho
              phong cách cá nhân của bạn. Đội ngũ chuyên gia thời trang của
              chúng tôi liên tục theo dõi xu hướng thị trường để mang đến cho
              bạn những bộ sưu tập đa dạng và phong cách.
            </p>
            <p class="text-md py-4">
              Chất lượng là ưu tiên hàng đầu của chúng tôi. Chúng tôi tự hào về
              việc cung cấp những sản phẩm được chọn lọc cẩn thận, sử dụng các
              vật liệu chất lượng và được sản xuất bởi các nhãn hiệu uy tín. Mỗi
              sản phẩm trên trang web của chúng tôi đều đi qua quy trình kiểm
              tra chất lượng nghiêm ngặt để đảm bảo rằng bạn nhận được sự hoàn
              hảo mỗi khi mua sắm tại đây.
            </p>
            <p class="text-md py-4">
              Chúng tôi hiểu rằng sự thoải mái và phong cách là quan trọng khi
              chọn quần áo. Vì vậy, chúng tôi cung cấp một loạt các lựa chọn về
              kích thước, kiểu dáng và màu sắc để đảm bảo rằng mọi khách hàng
              đều có thể tìm thấy những bộ trang phục phù hợp với nhu cầu cá
              nhân của họ.
            </p>
            <p class="text-md py-4">
              Chúng tôi cam kết đem lại trải nghiệm mua sắm trực tuyến tuyệt vời
              nhất cho bạn, với dịch vụ khách hàng tận tâm và giao hàng nhanh
              chóng. Hãy cùng chúng tôi khám phá thế giới thời trang đa dạng và
              phong cách - nơi mà phong cách của bạn được thể hiện!
            </p>
          </div>
        </div>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script>
import Footer from "../../../components/User/HomePage/Footer.vue";
import Header from "../../../components/User/HomePage/Header.vue";
import Banner from "../../../components/User/HomePage/Banner.vue";
export default {
  name: "VeChungToiView",
  components: {
    Footer,
    Header,
    Banner,
  },
};
</script>

<style>
</style>