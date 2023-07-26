import axios from "@/plugins/axios";

import { defineStore } from "pinia";
import { useMessageStore } from "@/stores/modules/messages";

export const useUserStore = defineStore({
  id: "users",

  state: () => ({
    users: [],
    currentUserId: null,
    currentUser: {},
    loading: true,
  }),
  getters: {
    getUser: (state) => {
      return state.users.find((f) => f.id === Number(state.currentUserId));
    },
  },
  actions: {
    async getUsers() {
      this.loading = true;
      axios
        .get(`/users`)
        .then((response) => {
          this.users = response.data.items;
          this.loading = false;
        })
        .catch((error) => {
          const messageStore = useMessageStore();
          messageStore.displayErrorMessage(error.message || error.data.message);
          this.loading = false;
        });
    },
    async storeUser(form) {
      axios
        .post(`/users`, { form })
        .then((response) => {
          this.users.push(response.data.item);

          const messageStore = useMessageStore();
          messageStore.displaySuccessMessage("User successfully added");
        })
        .catch((error) => {
          const messageStore = useMessageStore();
          messageStore.displayErrorMessage(error.message || error.data.message);
        });
    },
    async showUser(userId) {
      axios
        .get(`/users/${userId}`)
        .then((response) => {
          this.currentUser = response.data.item;
        })
        .catch((error) => {
          const messageStore = useMessageStore();
          messageStore.displayErrorMessage(error.message || error.data.message);
        });
    },
    async updateUser(form, userId) {
      this.loading = true;
      axios
        .post(`/users/${userId}/update`, form)
        .then(() => {
          const messageStore = useMessageStore();
          messageStore.displaySuccessMessage("User successfully updated");
          this.loading = false;
        })
        .catch((error) => {
          const messageStore = useMessageStore();
          messageStore.displayErrorMessage(error.message || error.data.message);
          this.loading = false;
        });
    },
    async deleteUser(userId) {
      this.loading = true;
      axios
        .delete(`/users/${userId}/delete`)
        .then(() => {
          this.users.map((user, index) => {
            if (user.id === userId) {
              this.users.splice(index, 1);
            }
          });

          const messageStore = useMessageStore();
          messageStore.displaySuccessMessage("User successfully deleted");
          this.loading = false;
        })
        .catch((error) => {
          const messageStore = useMessageStore();
          messageStore.displayErrorMessage(error.message || error.data.message);
          this.loading = false;
        });
    },
    async findOrFetchUser(userId) {
      if (this.users.length !== 0) {
        this.currentUserId = userId;
        this.currentUser = this.getUser;
      } else {
        await this.showUser(userId);
      }
    },
    async updateUserWeather(userId, weather) {
      this.users.map((user, index) => {
        if (user.id === userId) {
          user.weather = weather;
        }
      });
    },
  },
});
