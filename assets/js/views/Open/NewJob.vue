<template>
  <div class="row mt-4">
    <div class="col-12">
      <h1 class="h2 fw-bold my-4">
        New Job Request
      </h1>
    </div>

    <div class="col-12">
      <new-job-request-form :propertiesList="propertiesList" />
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import NewJobRequestForm from '../../components/form/NewJobRequestForm';

export default {
  name: 'NewJob',
  components: { NewJobRequestForm },
  data() {
    return {
      propertiesList: [],
    };
  },
  methods: {
    async loadProperties() {
      const response = await axios.get('https://localhost:8000/api/properties');
      this.propertiesList = response.data;
    },
  },
  created() {
    this.loadProperties();
  },
};
</script>
