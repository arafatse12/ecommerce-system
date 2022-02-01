<template>
  <div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
      <page-top
        page-heading="Product"
        modal-header="New Product"
        modal-id="formModal"
        button-text="New Product"
        @resetForm="resetFormData"
      ></page-top>
      <div class="table-responsive">
        <data-table
          :table-heading="tableHeading"
        >
          <template v-slot:filter>
            <list-filter @click="getDataList()"></list-filter>
          </template>
          <template v-slot:data>
            <tr v-for="(data, index) in dataList.data" :key="index">
              <td>{{ serialData(index) }}</td>
              <td>{{ data.product_title }}</td>
              <td>{{ data.price }}</td>
              <td>{{ data.description }}</td>
              <td class="">
                <button
                  class="btn btn-sm"
                  @click="editData(data, data.id, 'Edit Product')"
                >
                  <i class="fa fa-edit text-warning"></i>
                </button>
                <button
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
                        <list-count :data-list="dataList"></list-count>
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
    <form-modal
      modal-id="formModal"
      modal-size="modal-md"
      @submit="submitForm(formObject, 'formModal')"
    >
      <div class="form-row">
          <div class="form-group col-md-6">
              <label for="product_title"> Product Title <span>*</span></label>
             <input
            v-validate="'required'"
            name="product_title"
            type="text"
            v-model="formObject.product_title"
            class="form-control"
          />
          </div>
           <div class="form-group col-md-6">
              <label for="price"> Price <span>*</span></label>
               <input
                  v-validate="'required'"
                  name="price"
                  type="number"
                  v-model="formObject.price"
                  class="form-control"
                />
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-12">
              <label for="description"> Description </label>
              <textarea class="form-control"  v-model="formObject.description" type="text" name="description" id="" cols="10" rows="2">
              </textarea>
          </div>
      </div>
    </form-modal>
  </div>
</template>
<script>
import PageTop from "../../../component/layouts/pageTop.vue";
import ListFilter from "../../../component/layouts/listFilter.vue";
import DataTable from "../../../component/layouts/dataTable.vue";
import FormModal from "../../../component/layouts/formModal.vue";
import listCount from "../../../component/layouts/listCount.vue";

export default {
  name: "productManage",
  components: { FormModal, DataTable, ListFilter, PageTop, listCount },
  data() {
    return {
      tableHeading: {
        sl: "Sl",
        product_title: "Product Title",
        price: "Price",
        description: "Description",
        action: "Action",
      },
    };
  },
methods: {
    resetFormData() {
      const _this = this;
      this.$set(_this.formObject, "product_title", "");
      this.$set(_this.formObject, "price", "");
      this.$set(_this.formObject, "description", "");
    }
  },
  mounted() {
   this.resetFormData();
    this.getDataList();
  },
};
</script>
<style scoped>
.form-control {
  display: inline;
}
</style>


