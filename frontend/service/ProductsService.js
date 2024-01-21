import axios from "axios";

const PRODUCT_API_URL =
  "http://localhost/LuanVanTotNghiep/LVTN/backend/Controller/ProductsController.php";

class ProductsService {
  getAll() {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: { action: "getAll" },
    });
  }

  getAllFeatureProducts() {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: { action: "getAllFeatureProducts" },
    });
  }

  getByID(productID) {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: {
        action: "getByID",
        productID: productID,
      },
    });
  }

  getByIDCat(cat_id) {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: {
        action: "getByIDCat",
        cat_id: cat_id,
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
  updateProduct(stock, id) {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: {
        action: "updateProduct",
        stock: stock,
        id: id,
      },
    });
  }
}

export default new ProductsService();
