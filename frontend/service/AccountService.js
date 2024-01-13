import axios from "axios";

const Account_API_URL =
  "http://localhost/LVTN/backend/Controller/AccountController.php";

class AccountsService {
  getByID(id) {
    return axios.get(`${Account_API_URL}`, {
      params: {
        action: "getByID",
        id: id,
      },
    });
  }

  checkLogin(email, password) {
    return axios.get(`${Account_API_URL}`, {
      params: {
        action: "checkLogin",
        email: email,
        password: password,
      },
    });
  }
  checkEmailExisted(email) {
    return axios.get(`${Account_API_URL}`, {
      params: {
        action: "checkEmailExisted",
        email: email,
      },
    });
  }

  registerAccount(name, email, password, role) {
    return axios.get(`${Account_API_URL}`, {
      params: {
        action: "insertAccount",
        name: name,
        email: email,
        password: password,
        role: role,
      },
    });
  }
  updateAccount(
    name,
    email,
    password,
    photo,
    sodienthoai,
    diachi,
    quocgia,
    id
  ) {
    return axios.get(`${Account_API_URL}`, {
      params: {
        action: "updateAccount",
        name: name,
        email: email,
        password: password,
        photo: photo,
        sodienthoai: sodienthoai,
        diachi: diachi,
        quocgia: quocgia,
        id: id,
      },
    });
  }
}

export default new AccountsService();
