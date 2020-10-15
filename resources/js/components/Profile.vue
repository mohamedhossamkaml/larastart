<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header text-white" style="background-image: url('./img/wallpaper.jpg');">
                    <h3 class="widget-user-username text-right">Elizabeth Pierce</h3>
                    <h5 class="widget-user-desc text-right">Web Designer</h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" :src="gitImageProfile()"  alt="User Avatar">
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">3,200</h5>
                                <span class="description-text">SALES</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">13,000</h5>
                                <span class="description-text">FOLLOWERS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">35</h5>
                                <span class="description-text">PRODUCTS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.widget-user -->
        </div>
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <!--<div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="" alt="User profile picture">
                </div>-->

                    <h3 class="profile-username text-center">Nina Mcintire</h3>

                    <p class="text-muted text-center">Software Engineer</p>

                    <!--<ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                    </li>
                    <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                    </li>
                </ul>-->

                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Education</strong>

                    <p class="text-muted">
                        B.S. in Computer Science from the University of Tennessee at Knoxville
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                    <p class="text-muted">Malibu, California</p>

                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                    <p class="text-muted">
                        <span class="tag tag-danger">UI Design</span>
                        <span class="tag tag-success">Coding</span>
                        <span class="tag tag-info">Javascript</span>
                        <span class="tag tag-warning">PHP</span>
                        <span class="tag tag-primary">Node.js</span>
                    </p>

                    <hr>

                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="" alt="user image">
                                    <span class="username">
                                        <a href="#">Jonathan Burke Jr.</a>
                                        <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                    </span>
                                    <span class="description">Shared publicly - 7:30 PM today</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore the hate as they create awesome
                                    tools to help create filler text for everyone from bacon lovers
                                    to Charlie Sheen fans.
                                </p>

                                <p>
                                    <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                    <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                    <span class="float-right">
                                        <a href="#" class="link-black text-sm">
                                            <i class="far fa-comments mr-1"></i> Comments (5)
                                        </a>
                                    </span>
                                </p>

                                <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                            </div>
                            <!-- /.post -->

                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="" alt="User Image">
                                    <span class="username">
                                        <a href="#">Adam Jones</a>
                                        <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                    </span>
                                    <span class="description">Posted 5 photos - 5 days ago</span>
                                </div>
                                <!-- /.user-block -->
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <img class="img-fluid" src="" alt="Photo">
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <img class="img-fluid mb-3" src="" alt="Photo">
                                                <img class="img-fluid" src="" alt="Photo">
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <img class="img-fluid mb-3" src="" alt="Photo">
                                                <img class="img-fluid" src="" alt="Photo">
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <p>
                                    <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                    <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                    <span class="float-right">
                                        <a href="#" class="link-black text-sm">
                                            <i class="far fa-comments mr-1"></i> Comments (5)
                                        </a>
                                    </span>
                                </p>

                                <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                            </div>
                            <!-- /.post -->
                        </div>
                        <!-- /.tab-pane -->

                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input 
                                            type="name" 
                                            name="name" 
                                            v-model="form.name" 
                                            class="form-control" 
                                            id="inputName" 
                                            placeholder="Name"
                                            :class="{ 'is-invalid': form.errors.has('name') }">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input 
                                            type="email" 
                                            name="email" 
                                            v-model="form.email" 
                                            class="form-control" 
                                            id="inputEmail" 
                                            placeholder="Email"
                                            :class="{ 'is-invalid': form.errors.has('email') }">
                                        <has-error :form="form" field="email" ></has-error>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Bio" class="col-sm-2 col-form-label">Bio</label>
                                    <div class="col-sm-10">
                                        <input 
                                            type="text" 
                                            name="bio" 
                                            v-model="form.bio" 
                                            class="form-control" 
                                            id="Bio" 
                                            placeholder="Bio"
                                            :class="{ 'is-invalid': form.errors.has('bio') }">
                                        <has-error :form="form" field="bio"></has-error>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                    <div class="col-sm-10">
                                        <textarea 
                                            class="form-control" 
                                            name="education" 
                                            v-model="form.education" 
                                            id="inputExperience" 
                                            placeholder="Experience"
                                            :class="{ 'is-invalid': form.errors.has('education') }">
                                        </textarea>
                                        <has-error :form="form" field="education"></has-error>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                    <div class="col-sm-10">
                                        <input 
                                            type="text" 
                                            name="skills" 
                                            v-model="form.skills"
                                            class="form-control"
                                            id="inputSkills" 
                                            placeholder="Skills"
                                            :class="{ 'is-invalid': form.errors.has('skills') }">
                                        <has-error :form="form" field="skills"></has-error>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input 
                                            type="password" 
                                            name="password" 
                                            v-model="form.password" 
                                            class="form-control" 
                                            id="inputPassword" 
                                            placeholder="Password ( Leave Input If Not Changed ) "
                                            :class="{ 'is-invalid': form.errors.has('password') }">
                                        <has-error :form="form" field="password"></has-error>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="photo" class="col-sm-2 col-form-label">Profile Photo</label>
                                    <div class="col-sm-5">
                                        <input 
                                            type="file" 
                                            @change="updateProfile"  
                                            name="photo" 
                                            class="form-control" 
                                            id="photo">
                                    </div>
                                </div>

                                <!--<div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>-->
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" @click.prevent="updateInfo" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
</div>
</template>

<script>
import {
    VueEditor,
    Quill
} from "vue2-editor";

export default {
    data() {
        return {
            form: new Form({
                id: '',
                name: '',
                email: '',
                password: '',
                type: '',
                bio: '',
                education: '',
                skills: '',
                photo: '',
            }),
        }

    },
    methods: {
        gitImageProfile(){
            let photo = (this.form.photo.length > 200 ) ? this.form.photo :  "storage/User/profile/" + this.form.photo;
            return photo
        },
        loadData() { // load User Data
            this.$Progress.start();
            axios.get("api/profile")
                .then(({
                    data
                }) => (
                    this.form.fill(data),
                    this.$Progress.finish()
                ))
                .catch(() => {
                    this.$Progress.fail();
                });
        }, // end of loadData

        updateProfile(e){ // Reder Base64
            // console.log('updateProfile')

            let file = e.target.files[0];
            // console.log(file);

            let readr = new FileReader();

            if(file['size'] <  3111775 ){
                readr.onloadend = (file) => {
                    // console.log('resut', readr.result)

                    this.form.photo = readr.result;
                }
                readr.readAsDataURL(file);
            }else{
                Swal.fire({
                    icon: 'error',
                    type: 'error',
                    title: 'Oops...',
                    text: 'You Are Uploading a Large File',
                    // footer: ''
                })
            }

        },// end of updateProfile


        updateInfo(){
            this.$Progress.start();
            this.form.put('api/profile')
            .then(()=>{
                // Success
                Fire.$emit('AfterCreate');
                Swal.fire({
                    position: 'center-center',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 790
                })
                this.$Progress.finish()
            })
            .catch(()=>{
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                })
                this.$Progress.fail();
            });
            
        },

    }, // end Of Methods

    mounted() {

    }, // end of mounted

    created() {
        this.$Progress.start();
        this.loadData();
        Fire.$on('AfterCreate', () => {
            this.loadData();
        });
        this.$Progress.finish();
    }, //end of created
}
</script>

<style>
.widget-user-header {
    background-position: center center;
    background-size: cover;
    height: 300px !important;
}

.widget-user .widget-user-image {
    top: 207px;
    left: 49%;
}


.widget-user .widget-user-image > img{
    width: 121px  !important;
    box-shadow: 1px 0px 20px black;
}


.widget-user .widget-user-header{
    box-shadow: 0px 1px 20px 0px #1313139e;
}
</style>
