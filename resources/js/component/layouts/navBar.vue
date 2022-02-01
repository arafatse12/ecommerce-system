<template>
  <div id="sidebar" class="box-content ani-width">
    <div id="sidebar-scroll">
      <ul class="" id="sidebar-menu">
          <template>
            <li>
              <router-link to="dashboard">
                <i class="fa fa-desktop"></i>
                    <span class="text-capitalize"> Dashboard </span>
              </router-link>
               <router-link to="user">
                <i class="fa fa-user"></i>
                    <span class="text-capitalize"> User </span>
              </router-link>
              <router-link to="product">
                <i class="fa fa-product-hunt"></i>
                    <span class="text-capitalize"> Product </span>
              </router-link>
            </li>
          </template>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "navBar",
  data() {
    return {};
  },
  mounted() {},
};
</script>
