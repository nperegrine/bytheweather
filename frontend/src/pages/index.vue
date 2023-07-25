<template>
  <a-result
    title="Welcome to BTW"
    sub-title="The real-time weather platform you can trust."
    class="mt-5"
  >
    <template #icon>
      <team-outlined />
    </template>
    <template #extra>
      <a-button type="primary"
        ><router-link to="/users" class="nav-link"
          >Discover Users</router-link
        ></a-button
      >
      <a-button
        ><router-link to="/users" class="nav-link"
          >Get started</router-link
        ></a-button
      >
    </template>
  </a-result>
</template>

<script setup lang="ts">
import { TeamOutlined } from "@ant-design/icons-vue";
</script>
