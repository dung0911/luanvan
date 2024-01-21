import axios from "axios";

const PRODUCT_API_URL =
  "http://localhost/LuanVanTotNghiep/LVTN/backend/Controller/PostCommentController.php";

class PostCommentsService {
  getByID(post_id) {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: {
        action: "getByIDCom",
        post_id: post_id,
      },
    });
  }

  insertComment(user_id, post_id, comment) {
    return axios.get(`${PRODUCT_API_URL}`, {
      params: {
        action: "insertComment",
        user_id: user_id,
        post_id: post_id,
        comment: comment,
      },
    });
  }
}

export default new PostCommentsService();
