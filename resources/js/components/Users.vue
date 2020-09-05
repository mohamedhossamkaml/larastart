<template>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users Table </h3>

                    <div class="card-tools">
                        <!-- <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div> -->
                        <button class="btn btn-success " data-toggle="modal" data-target="#addNew">
                            <i class="fa fa-user-plus fa-fw"></i>
                            Add New
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Registered At / Date</th>
                                <th>Modify</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in users" :key="user.id">
                                <td>{{ user.id }}</td>
                                <td>{{ user.name | upText }}</td>
                                <td>{{ user.email }}</td>
                                <td><span class="tag tag-success">{{ user.type | upText }}</span></td>
                                <td>{{ user.created_at | myDate }}</td>
                                <td>
                                    <a href="#" class=" col-5 ">
                                        <i class="fa fa-edit Teal"></i>
                                    </a>
                                    <a href="#" class=" col-5 ">
                                        <i class="fa fa-trash red"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- Button trigger modal
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
        </button> -->
    <!-- Modal -->
    <div class="modal fade" id="addNew" tabindex="-1" aria-labelledby='addNew' aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNew"> Create User </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="createUser" class="modal-body">
                    <div>
                        <div class="form-group">
                            <input v-model="form.name" type="text" id="name" name="name" placeholder="Name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="form-group">
                            <input v-model="form.email" type="text" id="email" name="email" placeholder="Email Addres" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="form-group">
                            <input v-model="form.password" type="password" id="password" name="password" placeholder="Password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                            <has-error :form="form" field="password"></has-error>
                        </div>
                        <div class="form-group">
                            <select v-model="form.type" name="type" id="type" class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                                <option value="">Select User Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">Standard User</option>
                                <option value="author">Author</option>
                            </select>
                            <has-error :form="form" field="type"></has-error>
                        </div>
                        <div class="form-group">
                            <textarea v-model="form.bio" id="bio" name="bio" placeholder="Short Bio for User (Optional)" class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
                            <has-error :form="form" field="bio"></has-error>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"> create </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: "Users",
    data() {
        return {
            users: {},
            form: new Form({
                name: '',
                email: '',
                password: '',
                type: '',
                bio: '',
                photo: '',
            }),
        }
    },
    methods: {
        createUser() {
            this.$Progress.start();
            this.form.post('api/user')
                .then(req => {

                    Fire.$emit('AfterCreate');
                    $('#addNew').modal('hide');

                    if (req.data.status == true) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Created User successfully'
                        });
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'eroro User successfully'
                        });
                    }
                })
                .catch(() => {

                });
            this.$Progress.finish();
        },
        loadUsers() {
            this.$Progress.start();
            axios.get("api/user")
                .then(
                    ({
                        data
                    }) => (this.users = data.data)
                )
                .catch(() => {

                });
            Toast.fire({
                icon: 'success',
                title: 'Walcome To User Controler'
            });
            this.$Progress.finish();
        },
    },
    created() {
        this.loadUsers();
        Fire.$on('AfterCreate', () => {
            this.loadUsers();
        });
        // setInterval(()=>this.loadUsers(), 3000);
    },
    mounted() {},
}
</script>

<style>

</style>
