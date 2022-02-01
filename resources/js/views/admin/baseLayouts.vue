<template>
  <div>
    <top-navbar></top-navbar>
    <div id="content" class="box">
      <nav-bar></nav-bar>
      <div id="page-container" class="box-content">
        <div class="scrollable-page">
          <router-view></router-view>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import TopNavbar from "../../component/layouts/topNavbar";
import NavBar from "../../component/layouts/navBar";
export default {
  name: "baseLayouts",
  components: { NavBar, TopNavbar },
  mounted() {
  },
};
</script>

<style scoped>
</style>
