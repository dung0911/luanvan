<template>
  <div class="">
    <Header />
    <Banner />
    <div class="py-16 bg-white">
      <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
        <div
          class="space-y-6 md:space-y-0 md:flex md:gap-6 lg:items-center lg:gap-12"
        >
          <div class="md:7/12 lg:w-6/12">
            <h2 class="text-2xl text-gray-900 font-bold md:text-4xl">
              Thông tin giao hàng
            </h2>
            <p class="mt-6 text-gray-600">
              Chúng tôi hiểu rằng việc giao hàng nhanh chóng, đáng tin cậy và
              thuận tiện là một phần quan trọng của trải nghiệm mua sắm trực
              tuyến. Vì vậy, chúng tôi đã thiết lập hệ thống giao hàng linh hoạt
              và hiệu quả để đảm bảo rằng bạn có thể nhận được sản phẩm của mình
              một cách an toàn và kịp thời.
            </p>
            <p class="mt-4 text-gray-600">
              Dịch vụ giao hàng của chúng tôi bao gồm:
            </p>
            <nav>
              <ol class="list-decimal">
                <li class="py-4">
                  <span class="font-bold">Giao hàng Nhanh Chóng: </span>Chúng
                  tôi cam kết giao hàng một cách nhanh chóng và hiệu quả. Thời
                  gian giao hàng có thể thay đổi tùy thuộc vào địa điểm của bạn,
                  nhưng chúng tôi luôn cố gắng để bạn nhận được đơn hàng trong
                  thời gian ngắn nhất có thể. Chúng tôi cam kết giao hàng một
                  cách nhanh chóng và hiệu quả. Thời gian giao hàng có thể thay
                  đổi tùy thuộc vào địa điểm của bạn, nhưng chúng tôi luôn cố
                  gắng để bạn nhận được đơn hàng trong thời gian ngắn nhất có
                  thể.
                </li>
                <li class="py-4">
                  <span class="font-bold">Theo dõi Đơn hàng: </span> Khi bạn đặt
                  hàng, bạn sẽ nhận được thông tin theo dõi đơn hàng để có thể
                  theo dõi tình trạng của đơn hàng của mình. Điều này giúp bạn
                  biết được khi nào sản phẩm sẽ được giao và chuẩn bị sẵn sàng.
                </li>
                <li class="py-4">
                  <span class="font-bold"> Đa dạng Phương thức Giao hàng: </span
                  >Chúng tôi cung cấp nhiều phương thức giao hàng để đáp ứng nhu
                  cầu của bạn. Tùy thuộc vào sự thoải mái và ưu tiên cá nhân của
                  bạn, bạn có thể chọn giao hàng tiêu chuẩn, giao hàng nhanh
                  hoặc các dịch vụ khác.
                </li>
                <li class="py-4">
                  <span class="font-bold">Miễn Phí Giao hàng: </span>Chúng tôi
                  có các chính sách miễn phí giao hàng cho đơn hàng đặc biệt
                  hoặc với một số điều kiện cụ thể. Điều này giúp bạn tiết kiệm
                  chi phí khi mua sắm trực tuyến với chúng tôi.
                </li>
              </ol>
            </nav>
          </div>
          <div class="md:5/12 lg:w-5/12">
            <img
              src="https://img.freepik.com/free-vector/delivery-staff-ride-motorcycles-shopping-concept_1150-34879.jpg?size=626&ext=jpg&ga=GA1.1.632798143.1705708800&semt=sph"
              alt="image"
              loading="lazy"
              width=""
              height=""
            />
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
  name: "ThongTinGiaoHangView",
  components: {
    Footer,
    Header,
    Banner,
  },
};
</script>
  
  <style>
</style>