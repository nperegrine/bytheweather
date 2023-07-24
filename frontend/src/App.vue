<template>
  <body>
    <!-- begin::responsive navbar-->
    <header-layout></header-layout>

    <!-- begin::page content-->
    <div class="container">
      <div class="text-center mt-5">
        <RouterView />
      </div>
    </div>

    <!-- begin::responsive footer -->
    <footer-layout></footer-layout>
  </body>
</template>

<script setup lang="ts">
import HeaderLayout from "@/components/layout/Header.vue";
import FooterLayout from "@/components/layout/Footer.vue";
import { RouterView } from "vue-router";
</script>