import axios from "axios";

const BANNER_API_URL =
  "http://localhost/LVTN/backend/Controller/BannersController.php";

class BannersService {
  getAll() {
    return axios.get(`${BANNER_API_URL}`, {
      params: { action: "getAll" },
    });
  }
}

export default new BannersService();
