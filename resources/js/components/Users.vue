<template>
<div class="container">
    <div class="row mt-5" v-if="$gate.isAdminOrAuthor()">
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
                        <button class="btn btn-success " v-if="$gate.isAdmin()"  @click="newModal">
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
                                <th v-if="$gate.isAdmin()">Modify</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in users" :key="user.id">
                                <td>{{ user.id }}</td>
                                <td>{{ user.name | upText }}</td>
                                <td>{{ user.email }}</td>
                                <td><span class="tag tag-success">{{ user.type | upText }}</span></td>
                                <td>{{ user.created_at | myDate }}</td>
                                <td v-if="$gate.isAdmin()">
                                    <a href="#" class=" col-5 " @click="editModal(user)">
                                        <i class="fa fa-edit Teal"></i>
                                    </a>
                                    <a href="#" @click="deleteUser(user.id)" class=" col-5 ">
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
    <div class="row " v-else>
        <not-found/>
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
                    <h5 v-show="+editmode" class="modal-title" id="addNew"> Update User </h5>
                    <h5 v-show="!editmode" class="modal-title" id="addNew"> Create User </h5>
                    <h5 v-show="editmode==null" class="modal-title" id="addNew"> Error Function </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="editmode ? updateUser() : createUser()" class="modal-body">
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
                        <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                        <button v-show="editmode" type="submit" class="btn btn-success"> Update </button>
                        <button v-show="!editmode" type="submit" class="btn btn-primary"> create </button>
                        <button v-show="editmode==null" type="button" class="btn btn-warning"> Error </button>
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
            editmode: null,
            users: {},
            form: new Form({
                id: '',
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
        newModal() {
            this.editmode = false;
            this.form.reset();
            $('#addNew').modal('show');
        },
        editModal(user) {
            this.editmode = true;
            this.form.reset();
            $('#addNew').modal('show');
            this.form.fill(user);
        },

        createUser() { // Created User Function //
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
                    $('#addNew').modal('hide');
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    })
                    this.$Progress.fail();
                });
            // this.$Progress.finish();
        },

        updateUser(id) { // Updated User Function //
            // console.log("Edit Function");
            this.$Progress.start();
            this.form.put('api/user/' + this.form.id)
                .then(() => {
                    // Success
                    $('#addNew').modal('hide');
                    Fire.$emit('AfterCreate');
                    Swal.fire(
                        'Updated!',
                        'Information Has Been Updated. :)',
                        'success'
                    )
                    this.$Progress.finish();
                })
                .catch(() => {
                    $('#addNew').modal('hide');
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    })
                    this.$Progress.fail();
                });
            // this.$Progress.finish();
        },

        deleteUser(id) { // Delete User Function //
            // Sweet Alert2 Model //
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                this.$Progress.start();
                if (result.value) {
                    // Send Reuest To the Server //
                    this.form.delete('api/user/' + id).then(() => {
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            Fire.$emit('AfterCreate');
                            this.$Progress.finish();
                        })
                        .catch(() => {
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            })
                            this.$Progress.fail();
                        });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                    this.$Progress.fail();
                }
            }); // End Sweet Alert2 Model //
        },

        loadUsers() { // Reload User When Make Refresh The Page And When Added New User //
            if(this.$gate.isAdminOrAuthor() ){
                this.$Progress.start();
                axios.get("api/user")
                    .then(
                        ({
                            data
                        }) => (this.users = data.data),
                        this.$Progress.finish()
                    )
                    .catch(() => {
                        this.$Progress.fail();
                    });
                // this.$Progress.finish();
            }
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
