import axios from "axios";

const PRODUCT_API_URL =
  "http://localhost/LuanVanTotNghiep/LVTN/backend/Controller/PostCategoryController.php";

class PostCategoryService {
  getAll() {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: { action: "getAll" },
    });
  }
  getAllPostByCategory(post_cat_id) {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: {
        action: "getAllPostByCategory",
        post_cat_id: post_cat_id,
      },
    });
  }
}

export default new PostCategoryService();
