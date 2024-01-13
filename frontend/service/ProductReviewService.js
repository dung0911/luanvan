import axios from "axios";

const PRODUCT_API_URL =
  "http://localhost/LVTN/backend/Controller/ProductReviewController.php";

class ProductReviewService {
  getByID(product_id) {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: {
        action: "getCommentByID",
        product_id: product_id,
      },
    });
  }

  insertComment(user_id, product_id, review) {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: {
        action: "insertComment",
        user_id: user_id,
        product_id: product_id,
        review: review,
      },
    });
  }
}

export default new ProductReviewService();
