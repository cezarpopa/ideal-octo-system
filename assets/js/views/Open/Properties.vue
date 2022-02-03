<template>
  <div class="row mt-4">
    <div class="col-12">
      <h1 class="h2 fw-bold my-4">Properties</h1>
    </div>

    <div class="row col">
      <MainTable :data="properties" :datafields="propertyFields"></MainTable>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import MainTable from "../../components/table/MainTable";

export default {
  name: "Jobs",
  components: {MainTable},
  data() {
    return {
      propertyFields: [{
        key: 'id', label: 'Property id', canSort: true, sortable: true,
      },
        {
          key: 'name', label: 'Property name', canSort: true, sortable: true,
        }
      ],
      properties: [],
    }
  },
  methods: {
    loadProperties: async function () {
      const response = await axios.get("https://localhost:8000/api/properties");
      this.properties = response.data;
    }
  },
  created: function () {
    this.loadProperties();
  }
};
</script>
