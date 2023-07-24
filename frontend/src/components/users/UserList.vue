<template>
  <a-table :dataSource="dataSource" :columns="columns" />
</template>

<script>
export default {
  setup() {
    return {
      dataSource: [
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
      ],

      columns: [
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
      ],
    };
  },
};
</script>