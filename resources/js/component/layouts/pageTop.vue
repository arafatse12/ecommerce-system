
<template>
  <div class="page-title clearfix">
    <h1>{{ pageHeading }}</h1>
    <div class="title-button-group">
      <button
        @click="modalOpen"
        class="btn btn-default"
      >
        <i class="fa fa-plus-circle"></i> {{ buttonText }}
      </button>
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
    modalId: {
      type: String,
      default: "formModal",
    },
    modalHeader: {
      type: String,
      default: "Add New",
    },
    buttonText: {
      type: String,
      default: "Add New",
    }
  },
  methods: {
    modalOpen() {
      let _this = this;
      _this.$emit("resetForm");
      _this.openModal(_this.modalId, _this.modalHeader);
    },
  },
  mounted() {},
};
</script>

<style scoped>
</style>
