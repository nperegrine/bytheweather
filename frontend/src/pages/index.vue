<template>
  <a-result
    title="Welcome to BTW"
    sub-title="The real-time weather platform you can trust."
    class="mt-5"
  >
    <template #icon>
      <cloud-sync-outlined />
    </template>
    <template #extra>
      <a-button type="primary" @click="$router.push('/users')"
        >Discover Users</a-button
      >
      <a-button @click="$router.push('/users')">Get started</a-button>
    </template>
  </a-result>
</template>

<script setup>
import { CloudSyncOutlined } from "@ant-design/icons-vue";
</script>
