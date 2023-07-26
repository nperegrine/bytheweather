<template>
  <body>
    <!-- begin::responsive navbar-->
    <header-layout></header-layout>

    <!-- begin::page content-->
    <div class="container">
      <div class="mt-5">
        <RouterView />
      </div>
    </div>

    <!-- begin::responsive footer -->
    <footer-layout></footer-layout>
  </body>
</template>

<script setup>
import HeaderLayout from "@/components/layout/Header.vue";
import FooterLayout from "@/components/layout/Footer.vue";
import { RouterView } from "vue-router";
import { onMounted } from "vue";
import { useUserStore } from "@/stores/modules/users";
const userStore = useUserStore();

onMounted(() => {
  window.Echo.channel(`weather`).listen("WeatherUpdated", (e) => {
    userStore.updateUserWeather(e.user.id, e.weather);
  });
});
</script>