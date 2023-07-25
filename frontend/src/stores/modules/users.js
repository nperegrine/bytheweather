// import axios from "axios";

import { useMessageStore } from "@/stores/modules/messages";
const messageStore = useMessageStore();

export const useUserStore = defineStore({
  id: "users",

  state: () => ({ users: [], currentUserId: null }),
  getters: {
    getUser: (state) => {
      return state.users.find((f) => f.id === Number(state.currentUserId));
    },
  },
  actions: {
    async getUsers() {
      axios
        .get(`/users`)
        .then((response) => {
          this.users = response.items;
        })
        .catch((errors) => {
          messageStore.displayErrorMessage(errors.data.message);
        });
    },
    async storeUser(form) {
      axios
        .post(`/users`, { form })
        .then((response) => {
          this.users.push(response.item);
          messageStore.displaySuccessMessage("User successfully added");
        })
        .catch((errors) => {
          messageStore.displayErrorMessage(errors.data.message);
        });
    },
    async showUser(userId) {
      axios
        .get(`/users/${userId}`)
        .then((response) => {
          return response.item;
        })
        .catch((errors) => {
          messageStore.displayErrorMessage(errors.data.message);
        });
    },
    async updateUser(form, userId) {
      axios
        .post(`/users/${userId}`, { form })
        .then(() => {
          messageStore.displaySuccessMessage("User successfully updated");
        })
        .catch((errors) => {
          messageStore.displayErrorMessage(errors.data.message);
        });
    },
    async deleteUser(userId) {
      axios
        .delete(`/users/${userId}`)
        .then(() => {
          this.users.map((user, index) => {
            if (user.id === userId) {
              this.users.splice(index, 1);
            }
          });

          messageStore.displaySuccessMessage("User successfully deleted");
        })
        .catch((errors) => {
          messageStore.displayErrorMessage(errors.data.message);
        });
    },
    async findOrFetchUser(userId) {
      if (this.users.length !== 0) {
        this.currentUserId = userId;
        return this.getUser;
      } else {
        return await this.showUser(userId);
      }
    },
  },
});

if (import.meta.hot) {
  import.meta.hot.accept(acceptHMRUpdate(useUserStore, import.meta.hot));
}
