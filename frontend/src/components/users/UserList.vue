<template>
  <div>
    <a-breadcrumb style="margin: 16px 0">
      <a-breadcrumb-item>Home</a-breadcrumb-item>
      <a-breadcrumb-item>Users</a-breadcrumb-item>
    </a-breadcrumb>
    <div :style="{ padding: '24px', background: '#fff', minHeight: '360px' }">
      <h4>
        <span class="float-start">All Users</span>
        <span class="float-end">
          <a-button type="primary"
            ><nuxt-link to="/users/new">Add User</nuxt-link></a-button
          >
        </span>
      </h4>

      <!-- begin::users list table -->
      <a-table
        :columns="columns"
        :data-source="users"
        :locale="{
          emptyText: `Users you add will show up here`,
        }"
        class="mt-5"
        rowKey="id"
      >
        <template #bodyCell="{ column, record }">
          <template v-if="column.key === 'actions'">
            <span>
              <a-button>Edit</a-button>
              <a-divider type="vertical" />
              <a-popconfirm
                title="Are you sure you want to delete this user?"
                ok-text="Yes"
                cancel-text="No"
                @confirm="userStore.deleteUser(record.id)"
              >
                <a-button danger>Delete</a-button>
              </a-popconfirm>
            </span>
          </template>
        </template>
      </a-table>
      <!-- end::users list table -->
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";

const users = ref([
  {
    key: "1",
    name: "Mike",
    coordinates: "91,92",
    weather: "28 degrees",
  },
  {
    key: "2",
    name: "John",
    coordinates: "91,97",
    weather: "26 degrees",
  },
]);

const columns = ref([
  {
    title: "Name",
    dataIndex: "name",
    key: "name",
  },
  {
    title: "Coordinates",
    dataIndex: "coordinates",
    key: "coordinates",
  },
  {
    title: "Current Weather",
    dataIndex: "weather",
    key: "weather",
  },
  {
    title: "Actions",
    key: "actions",
  },
]);
</script>