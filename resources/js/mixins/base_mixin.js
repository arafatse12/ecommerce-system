export default {
    data() {
        return {
            baseUrl: baseUrl,
            selectInputs: {},
        }
    },
    watch: {
        'errors': {
            handler: function(value) {
                var is_invalid = $('.is-invalid');
                $(is_invalid).removeAttr("title", '');
                $(is_invalid).removeClass('is-invalid');
                $('.error_message').remove();
                if (value.items.length > 0) {
                    value.items.forEach(function(val) {
                        var target = $("[name='" + val.field + "']");
                        var targetParent = $(target).parent();
                        var select2Target = $(targetParent).find('span.select2-selection');
                        var message = val.msg;

                        if ($('.is-invalid').length == 0) {
                            $(targetParent).remove(`#${val.field}_message`);
                        }
                        if ($(`#${val.field}_message`).length == 0) {
                            $(targetParent).append(`<span style="color:red" class="error_message" id="${val.field}_message">${message.replace(val.field, "")}</span>`);
                        }

                        $(target).addClass('is-invalid');
                        $(select2Target).addClass('is-invalid');

                        $(target).attr("title", message.replace(val.field, ""));
                    });
                }
            },
            deep: true
        },
        '$store.getters.httpRequest': function() {
            if (this.httpRequest) {
                $('button').attr('disabled', 'disabled');
                $('input').attr('disabled', 'disabled');
            } else {
                $('button').removeAttr('disabled');
                $('input').removeAttr('disabled');
            }
        },
        '$route.path': function() {}
    },
    computed: {
        formType: function() {
            return this.$store.getters.formType;
        },
        formObject: function() {
            return this.$store.getters.formObject;
        },
        dataList: function() {
            return this.$store.getters.dataList;
        },
        updateId: function() {
            return this.$store.getters.updateId;
        },
        httpRequest: function() {
            return this.$store.getters.httpRequest;
        },
        requiredData: function() {
            return this.$store.getters.requiredData;
        },
        modalTitle: function() {
            return this.$store.getters.modalTitle;
        },
        Config: function() {
            return this.$store.getters.Config;
        },
        currentPage: function() {
            return this.$store.getters.currentPage;
        },

    },
    methods: {
        showData(dataArray, fieldName) {
            if ((dataArray !== null && dataArray !== undefined) &&
                (dataArray[fieldName] !== undefined && dataArray[fieldName] !== null)) {
                return dataArray[fieldName];
            } else {
                return '-';
            }
        },
        getConfig: function(Obj, name) {
            if ((Obj !== undefined && Obj !== null !== null) &&
                (Obj[name] !== undefined && Obj[name] !== null)) {
                return Obj[name];
            } else {
                return name;
            }
        },
        openModal: function(modalName = 'formModal', title = false) {
            if (title) {
                this.$store.commit('modalTitle', title);
            }
            $('#' + modalName).modal({
                backdrop: 'static',
                keyboard: true,
                show: true
            });
            this.$validator.reset();
            this.removeErrorMessage();
        },
        closeModal: function(modalName = 'createModal', resetForm = true, resetFormType = true) {
            const _this = this;
            this.$validator.reset();
            this.removeErrorMessage();
            $('#' + modalName).modal('hide');
            this.$store.commit('formType', 1);
            if (resetForm) {
                this.$store.commit('formObject', {});
            }
            if (resetFormType) {
                _this.$store.state.formType = 1;
            }
        },
        getUrl: function() {
            if (this.$route.meta.dataUrl !== undefined) {
                return this.$route.meta.dataUrl;
            }
            return '';
        },
        urlGenerate: function(customUrl = false) {
            var url = '';
            if (customUrl) {
                url = `${baseUrl}/${customUrl}`;
            } else {
                url = `${baseUrl}/${this.getUrl()}`;
            }
            return url;
        },
        assignValidationError: function(errors) {
            const _this = this;
            $.each(errors, function(index, errorValue) {
                _this.$validator.errors.add({
                    id: index,
                    field: index,
                    name: index,
                    msg: errorValue[0],
                });
            })
        },
        resetForm: function(formData) {
            if (typeof formData == 'object') {
                Object.keys(formData).forEach(function(key) {
                    formData[key] = '';
                });
                return formData;
            }
        },
        pageTitle: function() {
            return this.$route.meta.pageTitle;
        },
        resetFilter: function(parameter = []) {
            this.$store.commit('resetFilter', parameter);
            this.getDataList();
        },
        getImage: function(imagePath) {
            if (imagePath !== undefined && imagePath !== '') {
                return `${baseUrl}/${imagePath}`;
            }
        },
        indexToLabel: function(string) {
            var removed_space = '';
            if (typeof string === 'string') {
                removed_space = string.replace(/_/g, ' ');
                if (typeof removed_space !== 'string') {
                    return index;
                }
                return removed_space.charAt(0).toUpperCase() + removed_space.slice(1)
            }
            return '';
        },
        removeErrorMessage: function() {
            var span = $('.error_message');
            var s = $('.is-invalid').removeClass('is-invalid');
            var s1 = $('.select2-selection').removeClass('is-invalid');
            $(this).addClass('is-valid');
            span.remove();
        },
        serialData: function(index) {
            return this.dataList.from > 1 ?
                this.dataList.from + index :
                index + 1
        }
    },
    filters: {

    },
    mounted() {}
}