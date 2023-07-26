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
      <a-breadcrumb-item
        >{{ user.name }} &mdash; {{ userId }}
      </a-breadcrumb-item>
    </a-breadcrumb>
    <div
      class="text-center"
      :style="{ padding: '24px', background: '#fff', minHeight: '360px' }"
    >
      <h4>Detailed Weather Report</h4>
      <small class="text-muted">{{ user.name }}</small>

      <!-- begin::weather data -->
      <div v-if="Object.keys(user).length > 0">
        <div v-if="user.weather !== null" class="text-start">
          <a-divider>Basic</a-divider>
          <p v-for="(value, propertyName) in user.weather" :key="propertyName">
            <span v-if="propertyName !== 'weather'"
              ><b class="text-capitalize"
                >{{ propertyName.replace("_", " ") }}:</b
              >
              {{ value }}</span
            >
            <span v-else>
              <a-divider>Weather</a-divider>
              <p
                v-for="(value, innerPropertyName) in user.weather.weather[0]"
                :key="innerPropertyName"
              >
                <b class="text-capitalize">{{ innerPropertyName }}:</b>
                {{ value }}
              </p>
            </span>
          </p>
        </div>
        <div v-else class="mt-3">
          <p class="text-danger">
            No weather data available at the moment, please check back shortly.
          </p>
        </div>
      </div>
      <!-- end::weather data -->

      <!-- begin::loading -->
      <div v-else class="mt-2">
        <p class="text-muted">Loading data...</p>
      </div>
      <!-- end::loading -->
    </div>
  </div>
</template>

<script setup>
import { defineComponent, ref, onMounted } from "vue";
import { useUserStore } from "@/stores/modules/users";
import { useRoute } from "vue-router";
import { computed } from "vue";

const route = useRoute();
const userId = route.params.id;

const userStore = useUserStore();
const user = computed(() => userStore.currentUser);

const findUser = async () => {
  await userStore.findOrFetchUser(userId);
};

onMounted(findUser);
</script>