import axios from "axios";

const PRODUCT_API_URL =
  "http://localhost/LuanVanTotNghiep/LVTN/backend/Controller/PagesController.php";

class PagesService {
  getAll() {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: { action: "getAll" },
    });
  }

  getByID(blogId) {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: {
        action: "getByID",
        blogId: blogId,
      },
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
  findByTitle(title) {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: {
        action: "findByTitle",
        title: title,
      },
    });
  }
}

export default new PagesService();
