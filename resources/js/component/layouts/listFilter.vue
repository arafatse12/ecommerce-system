
<template>
  <div class="datatable-tools">
    <div class="col-md-2 toolbar-left-top">
      <div class="dataTables_length" id="item-table_length">
        <select
          name="dataTable_length"
          v-model="$store.state.filter.per_page"
          @change="search"
          class="custom-select custom-select-sm form-control form-control-sm"
        >
          <option value="10">10</option>
          <option value="20">20</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
      </div>
    </div>
    <div class="col-md-10 custom-toolbar">
      <div id="item-table_filter" class="dataTables_filter">
        <input
          v-model="$store.state.filter.keyword"
          @keyup.enter="search()"
          type="search"
          class="form-control form-control-sm"
          placeholder="Search"
        />
        <button @click="search()" class="btn btn-primary btn-md mt-5">
          <i class="fa fa-search"></i>
        </button>
      </div>
    </div>
    <div
      id="item-table_processing"
      class="dataTables_processing"
      style="display: none"
    >
      <div class="table-loader"><span class="loading"></span></div>
    </div>
  </div>
</template>

<script>
export default {
  name: "listFilter",
  methods: {
    search: function () {
      this.$emit("click");
    },
  },
};
</script>

<style scoped>
.btn {
  padding: 7.3px 13px !important;
}
</style>
