<template>
  <div id="app">
    <navbar />
    <div class="container">
      <router-view />
    </div>
  </div>
</template>

<script>
import Navbar from '../components/header/navbar/navbar';

export default {
  name: 'App',
  components: { Navbar },
};
</script>
