<template>
  <div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
      <page-top
        page-heading="User List"
        modal-header="New User"
        modal-id="formModal"
        button-text="New User"
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
              <td>{{ data.name }}</td>
              <td>{{ data.email }}</td>
              <td>{{ data.username }}</td>
              <td class="">
                <button
                  class="btn btn-sm"
                  @click="editData(data, data.id, 'Edit User')"
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
      <div class="col-md-12 form-group">
        <label for="name" class="col-md-3"> Name <span>*</span></label>
        <div class="col-md-9">
          <input
            v-validate="'required'"
            name="name"
            type="text"
            v-model="formObject.name"
            class="form-control"
          />
        </div>
      </div>
      <div class="col-md-12 form-group">
        <label for="email" class="col-md-3"> Email <span>*</span></label>
        <div class="col-md-9">
          <input
            v-validate="'required'"
            name="email"
            type="text"
            v-model="formObject.email"
            class="form-control"
          />
        </div>
      </div>
      <div class="col-md-12 form-group">
        <label for="username" class="col-md-3"> User Name <span>*</span></label>
        <div class="col-md-9">
          <input
            v-validate="'required'"
            name="username"
            type="text"
            v-model="formObject.username"
            class="form-control"
          />
        </div>
      </div>
      <div class="col-md-12 form-group">
        <label for="password" class="col-md-3"
          > Password <span v-if="formType === 1">*</span></label
        >
        <div class="col-md-9">
          <input
            v-validate="formType === 1 ? 'required' : ''"
            name="password"
            type="password"
            v-model="formObject.password"
            class="form-control"
          />
        </div>
      </div>
    </form-modal>
  </div>
</template>
<script>
import PageTop from "../../../component/layouts/pageTop";
import ListFilter from "../../../component/layouts/listFilter";
import DataTable from "../../../component/layouts/dataTable";
import FormModal from "../../../component/layouts/formModal";
import listCount from "../../../component/layouts/listCount.vue";

export default {
  name: "userList",
  components: { FormModal, DataTable, ListFilter, PageTop, listCount },
  data() {
    return {
      tableHeading: {
        sl: "Sl",
        name: "Name",
        email: "Email",
        username: "User Name",
        action: "Action",
      },
    };
  },
  methods: {
    resetFormData() {
      const _this = this;
    },
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


