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
      <a-breadcrumb-item>{{ user.name }} - {{ userId }} </a-breadcrumb-item>
    </a-breadcrumb>
    <div
      class="text-center"
      :style="{ padding: '24px', background: '#fff', minHeight: '360px' }"
    >
      <h4>Detailed Weather Report</h4>

      <!-- begin::user update form -->
      <div v-if="Object.keys(user).length > 0">
        <p>Detailed weather report will show up here.</p>
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
import { defineComponent, ref, onMounted } from "vue";
import { useUserStore } from "@/stores/modules/users";
import { useRoute } from "vue-router";

const route = useRoute();
const userId = route.params.id;
const user = ref({});

const userStore = useUserStore();

const findUser = async () => {
  user.value = await userStore.findOrFetchUser(userId);
};

onMounted(findUser);
</script>