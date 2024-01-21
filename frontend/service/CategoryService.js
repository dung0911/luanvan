import axios from "axios";

const PRODUCT_API_URL =
  "http://localhost/LuanVanTotNghiep/LVTN/backend/Controller/CategoriesController.php";

class CategoryService {
  getAll() {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: { action: "getAll" },
    });
  }

  getByID(id) {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: {
        action: "getByID",
        id: id,
      },
    });
  }
}

export default new CategoryService();
