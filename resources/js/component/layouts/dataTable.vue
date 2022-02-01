<template>
  <div id="item-table_wrapper" class="dataTables_wrapper no-footer">
    <slot  name="filter"></slot>
    <table
      id="item-table"
      class="display dataTable no-footer"
      role="grid"
      aria-describedby="item-table_info"
      width="100%"
      cellspacing="0"
    >
      <template >
        <thead>
          <tr role="row">
            <th
              v-for="(heading, index) in tableHeading"
              :key="index"
              @click="customSort(index)"
              :id="index"
              style=""
              :class="
                !non_sorted_field.includes(index) ? 'sorting sort_both' : null
              "
            >
              {{ heading }}
            </th>
          </tr>
        </thead>
        <tbody>
          <slot name="data"></slot>
          </tbody>
      </template>
    </table>
    <slot name="pagination"></slot>
  </div>
</template>

<script>
export default {
  name: "dataTable",
  props: {
    tableHeading: {
      type: [Array, Object],
      default: [],
    }
  },
  computed: {
    calculateColspan() {
      return this.tableHeading.length ? this.tableHeading.length : "";
    },
  },
  data() {
    return {
      non_sorted_field: [
        "sl",
        "action"
      ],
    };
  },

  methods: {
    customSort(index) {
      if (!this.non_sorted_field.includes(index)) {
        this.$set(this.filter, "sort_column", index);
        $(".sort_both").removeClass("sort_both");
        $(".sorting_asc").removeClass("sorting_asc");
        $(".sorting_desc").removeClass("sorting_desc");
        if (this.filter.sort == "desc") {
          $(`#${index}`).addClass("sorting_asc");
          this.$set(this.filter, "sort", "asc");
        } else if (typeof this.filter.sort === "undefined") {
          $(`#${index}`).addClass("sorting_asc");
          this.$set(this.filter, "sort", "asc");
        } else {
          $(`#${index}`).addClass("sorting_desc");
          this.$set(this.filter, "sort", "desc");
        }
        this.getDataList();
      }
    },
  },
};
</script>

<style scoped>
table.dataTable thead th:first-child,
table.dataTable tbody td:first-child,
table.dataTable thead th:last-child,
table.dataTable tbody td:last-child {
  text-align: center;
  width: 10%;
}
</style>

