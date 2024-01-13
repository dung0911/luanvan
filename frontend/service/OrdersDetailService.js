import axios from "axios";

const PRODUCT_API_URL =
  "http://localhost/LVTN/backend/Controller/OrderDetailController.php";

class OrdersDetailService {
  insertOrderDetail(
    product_id,
    order_id,
    user_id,
    price,
    quantity,
    amount,
    size
  ) {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: {
        action: "insertOrderDetail",
        product_id: product_id,
        order_id: order_id,
        user_id: user_id,
        price: price,
        quantity: quantity,
        amount: amount,
        size: size,
      },
    });
  }

  getOrderByID(order_id) {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: {
        action: "getOrderByID",
        order_id: order_id,
      },
    });
  }
}

export default new OrdersDetailService();
