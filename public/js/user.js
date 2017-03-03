Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({

    el: '#users',

    data: {
        items: [],
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        offset: 4,
        formErrors:{},
        formErrorsUpdate:{},
        newUser : {'name':'','surname':'','email':'','password':''},
        fillUser : {'name':'','surname':'', 'email':'', 'password':'','id':''}
    },

    computed: {
        isActived: function () {
            return this.pagination.current_page;
        },
        pagesNumber: function () {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },

    ready : function(){
        this.getVueUsers(this.pagination.current_page);
    },

    methods : {

        getVueUsers: function(page){
            this.$http.get('/vueusers?page='+page).then((response) => {
                this.$set('users', response.data.data.data);
            this.$set('pagination', response.data.pagination);
        });
        },

        createUser: function(){
            var input = this.newUser;
            this.$http.post('/vueusers',input).then((response) => {
                this.changePage(this.pagination.current_page);
            this.newUser = {'name':'','surname':'','email':'','password':''};
            $("#create-user").modal('hide');
            toastr.success('User Created Successfully.', 'Success Alert', {timeOut: 5000});
        }, (response) => {
                this.formErrors = response.data;
            });
        },

        deleteUser: function(user){
            this.$http.delete('/vueusers/'+user.id).then((response) => {
                this.changePage(this.pagination.current_page);
            toastr.success('User Deleted Successfully.', 'Success Alert', {timeOut: 5000});
        });
        },

        editUser: function(user){
            this.fillUser.name = user.name;
            this.fillUser.surname = user.surname;
            this.fillUser.email = user.email;
            this.fillUser.password = user.password;
            this.fillUser.id = user.id;
            $("#edit-user").modal('show');
        },

        updateUser: function(id){
            var input = this.fillUser;
            this.$http.put('/vueusers/'+id,input).then((response) => {
                this.changePage(this.pagination.current_page);
            this.fillUser = {'name':'','surname':'','email':'','password':'','id':''};
            $("#edit-user").modal('hide');
            toastr.success('User Updated Successfully.', 'Success Alert', {timeOut: 5000});
        }, (response) => {
                this.formErrorsUpdate = response.data;
                toastr.success(response.data, 'Error Alert', {timeOut: 5000});
            });
        },

        changePage: function (page) {
            this.pagination.current_page = page;
            this.getVueUsers(page);
        }

    }

});