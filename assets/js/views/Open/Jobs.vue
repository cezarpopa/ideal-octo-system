<template>
  <div class="row mt-4">
    <div class="col-12">
      <h1 class="h2 fw-bold my-4">Logged Jobs</h1>
    </div>

    <div class="row col">
      <MainTable :data="enquiries" :datafields="fields"></MainTable>
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
      fields: [
        {
          key: 'id', label: 'Property ID', canSort: true, sortable: true,
        },
        {
          key: 'property', label: 'Property', canSort: true, sortable: true,
        },
        {
          key: 'status', label: 'Job Status', canSort: true, sortable: true,
        },
        {
          key: 'description', label: 'Description of fault'
        },
        {
          key: 'email', label: 'User email'
        },
        {
          key: 'firstName', label: 'User Name'
        },
      ],
      enquiries: [],
    }
  },
  methods: {
    loadJobs: async function () {
      const response = await axios.get("https://localhost:8000/api/jobs");
      this.enquiries = response.data;
    }
  },
  created: function () {
    this.loadJobs();
  }
};
</script>
