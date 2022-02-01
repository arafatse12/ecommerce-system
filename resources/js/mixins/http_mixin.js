export default {
    data() {
        return {
            formData: {},
            SelectFilter: {},
            filter: {},
            per_page: 20,
            keyword: "",
            imageData: [],
        }
    },
    methods: {
        getDataList: function(page = 1) {
            const _this = this;
            var data_params = Object.assign(this.filter, _this.$store.state.filter, { page: page });
            this.$store.commit('httpRequest', true);
            _this.axios({ method: "get", url: _this.urlGenerate(), params: data_params })
                .then(function(response) {
                    var retData = response.data;
                    _this.$store.commit('httpRequest', false);
                    if (parseInt(retData.status) === 2000) {
                        _this.$store.commit('dataList', retData.result)

                    } else if (retData.status === 3001) {
                        _this.$toastr('warning', retData.message, 'Warning');
                    } else {
                        _this.$store.state.DataList = [];
                        _this.$toastr(retData.type, retData.message, 'Warning');
                    }
                }).catch(function(error) {
                    var retData = error.response.data;
                    _this.$toastr('error', retData.message, 'Error');
                });
        },
        submitForm: function(formData = false, model = true, callback = false) {
            const _this = this;
            var URL, method;
            if (_this.formType === 2) {
                URL = `${_this.urlGenerate()}/${_this.updateId}`;
                method = 'put';
            } else {
                URL = _this.urlGenerate();
                method = 'post';
            }
            this.$validator.validate().then(valid => {
                if (valid) {
                    this.$validator.errors.clear();
                    _this.$store.commit('httpRequest', true);
                    var Data = formData ? formData : _this.formObject;
                    var form_data = Object.assign(Data, this.imageData);

                    _this.axios({ method: method, url: URL, data: form_data }).then(function(response) {
                        var retData = response.data;

                        _this.$store.commit('httpRequest', false);
                        if (parseInt(retData.status) === 2000) {
                            if (model) {
                                _this.$store.state.currentFromModel = 1;
                                _this.closeModal(model);
                                _this.getDataList();
                                _this.resetForm(formData);
                            }
                            if (typeof callback == 'function') {
                                callback(retData.result);
                            }
                            _this.resetForm(formData);
                            _this.$toastr('success', retData.message, 'Success');
                        }
                        if (parseInt(retData.status) === 3000) {
                            _this.$toastr('warning', retData.message, 'Warning');
                            _this.assignValidationError(retData.result);
                        }
                        if (parseInt(retData.status) === 3001) {
                            _this.$toastr('warning', retData.message, 'Warning');
                        }
                        if (parseInt(retData.status) === 5000) {
                            _this.$toastr('error', retData.message, 'Error');
                        }
                    }).catch(function(error) {
                        _this.$store.commit('httpRequest', false);
                        if (error.response.status == 422) {
                            var retData = error.response.data;
                            _this.$toastr('warning', retData.message, 'Warning');
                            _this.assignValidationError(retData.errors);
                        } else if (error.response.status == 403) {
                            var retData = error.response.data;
                            _this.$toastr('warning', retData.message, 'Warning');
                        } else {
                            _this.$toastr('error', 'Something Wrong', 'Error');

                        }
                    });
                }
            });
        },
        editData: function(data, updateId, modalTitle = '', modalName = 'formModal', callback = false) {
            const _this = this;

            _this.$store.commit('formObject', Object.assign({}, data));
            _this.$store.commit('updateId', updateId);
            _this.$store.commit('formType', 2);
            _this.openModal(modalName, modalTitle);

            if (typeof callback == 'function') {
                callback(data);
            }

        },
        deleteInformation: function(index, ID, url = false, callback = false, callDataList = true) {
            const _this = this;
            this.$swal({
                title: 'Are you sure..??',
                text: 'Data will be delete Permanently??',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '<i class="fa fa-check">Yes</i>',
                cancelButtonText: '<i class="fa fa-close">Cancel</i>',
                showCloseButton: true,
            }).then((result) => {
                if (result.value) {
                    var URL = !url ? `${_this.urlGenerate()}/${ID}` : url;
                    _this.axios.delete(URL)
                        .then(function(response) {
                            var retData = response.data;
                            _this.$store.commit('httpRequest', false);
                            if (parseInt(retData.status) === 2000) {
                                _this.$toastr('success', retData.message, 'Success');
                                if (callDataList) {
                                    _this.getDataList();
                                }
                                if (typeof callback == 'function') {
                                    callback(true);
                                }
                            } else {
                                _this.$toastr('warning', retData.message, 'Warning');
                            }
                        }).catch(function(error) {
                            _this.$toastr('error', 'Something Wrong', 'Error');
                        });
                }
            });
        },
    },
}