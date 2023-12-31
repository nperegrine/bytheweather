import { createRouter, createWebHistory } from "vue-router";
import HomePage from "../pages/index.vue";
import UsersPage from "../pages/users/index.vue";
import UserSinglePage from "../pages/users/single.vue";
import UserEditPage from "../pages/users/edit.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomePage,
    },
    {
      path: "/users",
      name: "users",
      component: UsersPage,
    },
    {
      path: "/users/:id",
      name: "user-single",
      component: UserSinglePage,
    },
    {
      path: "/users/:id/edit",
      name: "user-edit",
      component: UserEditPage,
    },
  ],
});

export default router;
