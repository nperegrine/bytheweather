<template>
  <a-table :dataSource="dataSource" :columns="columns">
    <template #bodyCell="{ column, record }">
      <template v-if="column.key === 'actions'">
        <span>
          <a-button>Edit 一 {{ record.name }}</a-button>
          <a-divider type="vertical" />
          <a-button danger>Delete</a-button>
        </span>
      </template>
    </template>
  </a-table>
</template>

<script setup>
import { ref } from "vue";

const dataSource = ref([
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