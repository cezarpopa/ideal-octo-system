<template>
  <div class="row">
    <b-form class="col-12" @submit="onSubmit">
      <div class="row">
        <b-form-group id="input-group-2" class="col-12 col-sm-6" label="First Name:" label-for="input-2">
          <b-form-input
              id="input-2"
              v-model="form.firstName"
              placeholder="Enter name"
              required
          ></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-2" class="col-12 col-sm-6" label="Last Name:" label-for="input-3">
          <b-form-input
              id="input-3"
              v-model="form.lastName"
              placeholder="Enter name"
              required
          ></b-form-input>
        </b-form-group>

        <b-form-group
            id="input-group-1"
            class="col-12 col-sm-6"
            label="Email address:"
            label-for="input-1"
            description="We'll never share your email with anyone else."
        >
          <b-form-input
              id="input-1"
              v-model="form.email"
              type="email"
              placeholder="Enter email"
              required
          ></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-4" class="col-12 col-sm-6" label="Property:" label-for="input-4">
          <b-form-select
              id="input-4"
              v-model="form.property"
              :options="propertiesList"
              value-field="id"
              text-field="name"
              required
          ></b-form-select>
        </b-form-group>


        <b-form-group id="input-group-5" class="col-12" label="Property:" label-for="input-5">
          <b-form-textarea
              id="input-5"
              v-model="form.description"
              placeholder="Enter something..."
              rows="3"
              max-rows="6"
          ></b-form-textarea>
        </b-form-group>

        <div class="col-12">
          <b-button type="submit" variant="primary">Submit</b-button>
        </div>
      </div>
    </b-form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: 'NewJobRequestForm',
  props: ['propertiesList'],
  data() {
    return {
      form: {
        email: '',
        firstName: '',
        lastName: '',
        description: '',
        property: null,
      },
    }
  },
  methods: {
    onSubmit() {
      axios.post("https://localhost:8000/api/jobs/new", this.form);
    },
  }
}
</script>
