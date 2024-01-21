<template>
  <div class="">
    <Header />
    <Banner />
    <div class="py-16 bg-white">
      <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
        <div class="">
          <div class="w-8/12 mx-auto">
            <h2 class="text-2xl text-gray-900 font-bold md:text-4xl mb-12">
              ĐIỀU KHOẢN SỬ DỤNG
            </h2>
            <h4 class="font-bold text-2xl text-black">Giới thiệu chung</h4>
            <p class="p-5">
              Khi khách hàng truy cập vào ứng dụng HDStore, website
              http://localhost:8080/ hoặc đặt hàng qua hotline 0942597170 của
              HDStore có nghĩa là khách hàng đã đồng ý với các điều khoản này.
              HDStore có quyền thay đổi, chỉnh sửa, thêm hoặc lược bỏ bất kỳ
              phần nào trong Điều khoản sử dụng này vào bất cứ lúc nào. Các thay
              đổi có hiệu lực ngay khi được đăng trên trang web, ứng dụng mà
              không cần thông báo trước. Khi khách hàng tiếp tục sử dụng dịch vụ
              giao hàng của HDStore, sau khi các thay đổi về Điều khoản này được
              đăng tải, có nghĩa là khách hàng chấp nhận với những thay đổi đó.
            </p>
            <p class="px-5 py-2">
              Khách hàng vui lòng kiểm tra thường xuyên các quy định và điều
              khoản dưới đây để cập nhật những thay đổi của chúng tôi.
            </p>
            <h4 class="mt-12 font-bold text-2xl text-black">
              Chính sách Tài khoản Người dùng
            </h4>
            <p class="px-5 py-2">
              Khách hàng cam kết và cung cấp thông tin chính xác nhằm mục đích
              nhận được phục vụ tốt nhất từ HDStore
            </p>
            <p class="px-5 py-2">
              Mỗi số điện thoại chỉ tạo được một (01) tài khoản cho mục đích sử
              dụng cá nhân.
            </p>
            <p class="px-5 py-2">
              Để đảm bảo quyền lợi, khách hàng không chia sẻ thông tin tài khoản
              (tên truy cập và mật khẩu) cho người khác sử dụng tài khoản The
              Coffee House, hoặc chuyển nhượng tài khoản cho bất kỳ ai khác mà
              chưa thông qua HDStore.
            </p>
            <p class="px-5 py-2">Tạo các đơn hàng ảo, hoặc đánh giá ảo.</p>
            <p class="px-5 py-2">
              Không nhận đơn hàng đã đặt mà không cung cấp lý do chính đáng.
            </p>
            <p class="px-5 py-2">
              Tài khoản bị khóa hoặc khóa một phần tính năng sẽ được cấp lại sau
              khi hoàn thành quá trình xác minh qua các chứng từ/thông tin khách
              hàng cung cấp chứng minh việc mua hàng (hóa đơn, hình ảnh sản phẩm
              đã mua,..) và có sự đồng thuận giữa khách hàng và The Coffee
              House.
            </p>
            <h4 class="mt-12 font-bold text-2xl text-black">Hủy bỏ Đặt hàng</h4>
            <p class="p-5">
              Khách hàng được quyền chủ động hủy đơn hàng trên ứng dụng đối với
              trường hợp đơn hàng chưa có tài xế nhận giao hàng đối với đơn
              "Giao hàng" hoặc cửa hàng chưa thực hiện sản phẩm đối với đơn
              "Mang đi". Nếu khách hàng không thể thao tác hủy đơn hàng trên ứng
              dụng, vui lòng liên hệ hotline 094297170 để được nhân viên xử lý
              đơn hàng hỗ trợ kiểm tra tình trạng đơn hàng muốn hủy. Tùy từng
              trường hợp, nếu cửa hàng đã làm sản phẩm, HDStore rất tiếc chưa
              thể hỗ trợ hủy đơn hàng.
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
  name: "DieuKhoanSuDungView",
  components: {
    Footer,
    Header,
    Banner,
  },
};
</script>
  
  <style>
</style>