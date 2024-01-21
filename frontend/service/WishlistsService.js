import axios from "axios";

const PRODUCT_API_URL =
  "http://localhost/LuanVanTotNghiep/LVTN/backend/Controller/WishlistController.php";

class WishlistsService {
  getAll() {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: { action: "getAll" },
    });
  }
  getByID(user_id) {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: {
        action: "getAllByUser",
        user_id: user_id,
      },
    });
  }
  deleteWishlists(user_id, product_id) {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: {
        action: "deleteWishlists",
        user_id: user_id,
        product_id: product_id,
      },
    });
  }
  insertWishlist(productID, user_id) {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: {
        action: "insertWishlist",
        product_id: productID,
        user_id: user_id,
      },
    });
  }
}

export default new WishlistsService();
