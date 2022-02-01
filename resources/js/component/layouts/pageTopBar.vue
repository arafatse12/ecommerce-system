
<template>
<div class="page-title clearfix">
          <h1>{{ pageHeading }}</h1>
          <div class="title-button-group">
            
            <slot></slot>
          </div>
      </div>
</template>
<script>
export default {
  name: "pageTop",
  props: {
    pageHeading: {
      type: String,
      default: "Dashboard",
    },
    buttonText: {
      type: String,
      default: "Add New",
    }
  },
  methods: {

  },
  mounted() {},
};
</script>

<style scoped>
</style>
