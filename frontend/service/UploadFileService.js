import axios from "axios";

const UploadFile_API_URL = "http://localhost/LVTN/backend/Controller/UploadFileController.php";

class UploadFileService {
  handleUpload(file) {
    const formData = new FormData();
    formData.append("file", file);

    return axios.post(`${UploadFile_API_URL}?action=handleUpload`, formData, {
      headers: {
        "Content-Type": "multipart/form-data",
      },
    });
  }
}

export default new UploadFileService();
