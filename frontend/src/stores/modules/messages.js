import { defineStore } from "pinia";
import { message } from "ant-design-vue";
import { notification } from "ant-design-vue";

export const useMessageStore = defineStore({
  id: "messages",

  state: () => ({}),
  actions: {
    displayErrorMessage(description) {
      const placement = "bottomLeft";

      notification["error"]({
        message: "Sorry an error occured",
        description,
        placement,
      });
    },
    displaySuccessMessage(description) {
      message.success(description);
    },
    async processValidationError() {
      //
    },
  },
});
