<template>
  <div>
    <a-breadcrumb style="margin: 16px 0">
      <a-breadcrumb-item
        ><router-link to="/" class="nav-link"
          >Home</router-link
        ></a-breadcrumb-item
      >
      <a-breadcrumb-item>Users</a-breadcrumb-item>
    </a-breadcrumb>
    <div :style="{ padding: '24px', background: '#fff', minHeight: '360px' }">
      <h4>
        <span class="float-start">All Users</span>
      </h4>

      <!-- begin::users list table -->
      <a-table
        :columns="columns"
        :data-source="users"
        :locale="{
          emptyText: `Users will show up here`,
        }"
        class="mt-5"
        rowKey="id"
      >
        <template #bodyCell="{ column, record }">
          <template v-if="column.key === 'actions'">
            <span>
              <a-button
                type="primary"
                ghost
                @click="$router.push('/users/' + record.id)"
              >
                View More</a-button
              >
              <a-divider type="vertical" />
              <a-tooltip title="Edit user">
                <a-button
                  class="pt-0"
                  @click="$router.push('/users/' + record.id + '/edit')"
                  ><form-outlined
                    :style="{ fontSize: '16px', color: '#5A5A5A' }"
                /></a-button>
              </a-tooltip>
              <a-divider type="vertical" />
              <a-popconfirm
                title="Are you sure you want to delete this user?"
                ok-text="Yes"
                cancel-text="No"
                @confirm="userStore.deleteUser(record.id)"
              >
                <a-tooltip title="Delete user">
                  <a-button danger class="pt-0"
                    ><delete-outlined :style="{ fontSize: '16px' }"
                  /></a-button>
                </a-tooltip>
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
import { FormOutlined, DeleteOutlined } from "@ant-design/icons-vue";

const users = ref([
  {
    id: "1",
    name: "Mike Andreezen",
    coordinates: "91,92",
    weather: "28 degrees",
  },
  {
    id: "2",
    name: "John Fillipo",
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