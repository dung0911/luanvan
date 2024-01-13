import axios from "axios";

const PRODUCT_API_URL =
  "http://localhost/LVTN/backend/Controller/ShippingController.php";

class ShippingService {
  getAll() {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: { action: "getAll" },
    });
  }
}

export default new ShippingService();
