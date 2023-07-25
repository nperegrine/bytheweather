<template>
  <div>
    <a-breadcrumb style="margin: 16px 0">
      <a-breadcrumb-item
        ><router-link to="/" class="nav-link"
          >Home</router-link
        ></a-breadcrumb-item
      >
      <a-breadcrumb-item
        ><router-link to="/users" class="nav-link"
          >Users</router-link
        ></a-breadcrumb-item
      >
      <a-breadcrumb-item>User - {{ userId }} </a-breadcrumb-item>
    </a-breadcrumb>
    <div :style="{ padding: '24px', background: '#fff', minHeight: '360px' }">
      <h4>Edit User</h4>

      <!-- begin::user update form -->
      <div v-if="Object.keys(user).length === 0">
        <a-form
          :layout="formState.layout"
          :model="user"
          name="basic"
          autocomplete="off"
          class="mt-4"
          @finish="onFinish"
          @finishFailed="onFinishFailed"
        >
          <a-divider>Personal Data</a-divider>
          <a-form-item
            label="Name"
            name="name"
            :rules="[
              { required: true, message: 'Please enter the user name!' },
            ]"
          >
            <a-input
              v-model:value="user.name"
              placeholder="Please enter a user name"
            />
          </a-form-item>

          <a-divider>Location</a-divider>

          <a-form-item
            label="Latitude"
            name="latitude"
            :rules="[
              { required: true, message: 'Please enter the user latitude!' },
            ]"
          >
            <a-input
              v-model:value="user.latitude"
              placeholder="Please enter user latitude"
            />
          </a-form-item>

          <a-form-item
            label="Longitude"
            name="longitude"
            :rules="[
              { required: true, message: 'Please enter the user longitude!' },
            ]"
          >
            <a-input
              v-model:value="user.longitude"
              placeholder="Please enter user longitude"
            />
          </a-form-item>

          <a-divider></a-divider>

          <a-form-item class="mt-4">
            <a-button type="primary" html-type="submit">Update User</a-button>
          </a-form-item>
        </a-form>
      </div>
      <!-- end::user update form -->

      <!-- begin::loading -->
      <div v-else class="mt-2">
        <p class="text-muted">Loading user data...</p>
      </div>
      <!-- end::loading -->
    </div>
  </div>
</template>

<script setup>
import { defineComponent, reactive, ref, onMounted } from "vue";
import { useUserStore } from "@/stores/modules/users";
import { useRoute } from "vue-router";

const route = useRoute();
const userId = route.params.id;
const user = ref({});

const formState = reactive({
  layout: "horizontal",
});

const userStore = useUserStore();

const onFinish = (values) => {
  console.log("Success:", values);
  userStore.updateUser(values, userId);
};
const onFinishFailed = (errorInfo) => {
  console.log("Failed:", errorInfo);
};

const findUser = async () => {
  user.value = await userStore.findOrFetchUser(userId);
};

onMounted(findUser);
</script>