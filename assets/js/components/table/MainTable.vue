<template>
  <div class="table">
    <b-table hover :items="data" :fields="datafields">
      <template v-slot:cell(property)="data">
        {{ data.item.property.name }}
      </template>
      <template v-slot:cell(firstName)="data">
        {{ data.item.firstName }} {{ data.item.lastName }}
      </template>
    </b-table>
  </div>
</template>

<script>
export default {
  name: 'MainTable',
  props: ['datafields', 'data'],
};
</script>
