import { createRouter, createWebHistory } from "vue-router";

const routes = [
  {
    path: "/",
    name: "home",
    component: () => import("../views/User/HomePage/HomeView.vue"),
  },
  {
    path: "/shop",
    name: "shop",
    component: () => import("../views/User/Shop/Shop.vue"),
  },
  {
    path: "/page",
    name: "page",
    component: () => import("../views/User/NewFeed/Blog.vue"),
  },
  {
    path: "/singlePage/:id",
    name: "singlePage",
    component: () => import("../views/User/NewFeed/SingleBlog.vue"),
  },
  {
    path: "/singleProduct/:id",
    name: "singleProduct",
    component: () => import("../views/User/Shop/SingleProduct.vue"),
  },
  {
    path: "/contact",
    name: "contact",
    component: () => import("../views/User/Contact/Contact.vue"),
  },
  {
    path: "/cart",
    name: "cart",
    component: () => import("../views/User/Cart/Cart.vue"),
  },
  {
    path: "/cartDetail/:id",
    name: "cartDetail",
    component: () => import("../views/User/Cart/CartDetail.vue"),
  },
  {
    path: "/login",
    name: "login",
    component: () => import("../views/User/Authentication/Login.vue"),
  },
  {
    path: "/register",
    name: "register",
    component: () => import("../views/User/Authentication/Register.vue"),
  },
  {
    path: "/wishlist",
    name: "wishlist",
    component: () => import("../views/User/Wishlist/Wishlist.vue"),
  },
  {
    path: "/cart",
    name: "cart",
    component: () => import("../views/User/Cart/Cart.vue"),
  },
  {
    path: "/OrderHistory",
    name: "OrderHistory",
    component: () => import("../views/User/Order/OrderHistory.vue"),
  },
  {
    path: "/OrderHistoryDetail/:id",
    name: "OrderHistoryDetail",
    component: () => import("../views/User/Order/OrderHistoryDetail.vue"),
  },
  {
    path: "/accountInfo",
    name: "accountInfo",
    component: () => import("../views/User/Authentication/AccountInfo.vue"),
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition;
    } else {
      return { top: 0, behavior: "smooth" };
    }
  },
});

export default router;
