<template>
    <div id="page-content" class="p20 clearfix">
      <div class="panel panel-default">
         <div class="page-title clearfix">
            <h1>Purchase</h1>
            <div class="title-button-group">
              <router-link class="btn btn-default float-right" to="purchase-requisition/create">
              <i class="fa fa-plus-circle"></i> New Purchase
              </router-link>
            </div>
          </div>
        <div class="table-responsive">
          <data-table
            :table-heading="tableHeading"
            permission-name="view_mis_purchase_requisition"
          >
            <template v-slot:filter>
              <list-filter @click="getDataList()"></list-filter>
            </template>
            <template v-slot:data>
              <tr v-for="(data, index) in dataList.data" :key="index">
                <td>{{ serialData(index) }}</td>
                <td>{{ data.requisition_no }}</td>
                <td>{{ data.remarks }}</td>
                <td class="">
                  <button
                    v-if="can('view_mis_purchase_requisition')"
                    class="btn btn-sm"
                    @click="editInformation(data, data.id, 'Edit Customer')"
                  >
                    <i class="fa fa-edit text-warning"></i>
                  </button>
                  <button
                    v-if="can('view_mis_products_delete')"
                    class="btn btn-sm"
                    @click="deleteInformation(index, data.id)"
                  >
                    <i class="fa fa-trash text-danger"></i>
                  </button>
                </td>
              </tr>
            </template>
            <template v-slot:pagination>
              <div class="datatable-tools clearfix">
                <div class="col-md-3">
                  <pagination-list></pagination-list>
                </div>
                <div class="col-md-9">
                  <pagination
                    previousText="PREV"
                    nextText="NEXT"
                    :data="dataList"
                    @paginateTo="getDataList"
                  />
                </div>
              </div>
            </template>
          </data-table>
        </div>
      </div>
    </div>
  </template>
  <script>
  // import PageTop from "../../../component/layouts/pageTop";
  import ListFilter from "../../../component/layouts/listFilter";
  import DataTable from "../../../component/layouts/dataTable";
  import FormModal from "../../../component/layouts/formModal";
  import PaginationList from "../../../component/layouts/paginationList.vue";
  export default {
    name: "product",
    components: { FormModal, DataTable, ListFilter, PaginationList },
    data() {
      return {
        tableHeading: {
          sl: "Sl",
          requisition_no: "Requisition No",
          remarks: "Remarks",
          action: "Action",
        },
      };
    },
      methods: {
      resetFormData() {
        const _this = this;
      //   this.$set(_this.formObject, "company_name", "");
      //   this.$set(_this.formObject, "contact_person", "");
      //   this.$set(_this.formObject, "address", "");
      //   this.$set(_this.formObject, "customer_type", "");
      }
    },
    mounted() {
      this.resetFormData();
      this.getDataList();
      this.getGeneralData(["product_type"]);
    },
  };
  </script>
  <style scoped>
  .form-control {
    display: inline;
  }
  .mx-datepicker{
    width: 100% !important;
  }
  </style>
  
  
  