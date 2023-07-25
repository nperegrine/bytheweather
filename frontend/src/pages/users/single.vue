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
      <a-breadcrumb-item>{{ userId }} </a-breadcrumb-item>
    </a-breadcrumb>
    <div :style="{ padding: '24px', background: '#fff', minHeight: '360px' }">
      <h4>Detailed Weather Report</h4>
    </div>
  </div>
</template>

<script setup>
</script>