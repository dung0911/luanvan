import axios from "axios";

const PRODUCT_API_URL =
  "http://localhost/LuanVanTotNghiep/LVTN/backend/Controller/OrderController.php";

class OrdersService {
  insertOrder(
    order_number,
    user_id,
    sub_total,
    shipping_id,
    coupon,
    total_amount,
    quantity,
    payment_method,
    payment_status,
    first_name,
    last_name,
    email,
    phone,
    country,
    post_code,
    address1,
    address2
  ) {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: {
        action: "insertOrder",
        order_number: order_number,
        user_id: user_id,
        sub_total: sub_total,
        shipping_id: shipping_id,
        coupon: coupon,
        total_amount: total_amount,
        quantity: quantity,
        payment_method: payment_method,
        payment_status: payment_status,
        first_name: first_name,
        last_name: last_name,
        email: email,
        phone: phone,
        country: country,
        post_code: post_code,
        address1: address1,
        address2: address2,
      },
    });
  }

  getOrderByUser(user_id) {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: {
        action: "getOrderByUser",
        user_id: user_id,
      },
    });
  }
  getOrderById(id) {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: {
        action: "getOrderById",
        id: id,
      },
    });
  }
  updateOrder(status, id) {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: {
        action: "updateOrder",
        status: status,
        id: id,
      },
    });
  }

  getShipFromOrderId(id) {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: {
        action: "getShipFromOrderId",
        id: id,
      },
    });
  }
}

export default new OrdersService();
