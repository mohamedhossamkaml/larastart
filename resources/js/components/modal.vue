<template>
    <!-- Modal -->
    <div class="modal fade" id="add.addNew"  tabindex="-1" :aria-labelledby='add.addNew' aria-hidden="true">
        <!-- <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" :id="add.addNew" > {{ add.title }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input v-model="add.form.name" type="text" name="name" placeholder="Name"
                            class="form-control" :class="{ 'is-invalid': add.form.errors.has('name') }">
                        <has-error :form="add.form" field="name"></has-error>
                    </div>
                    <div class="form-group">
                        <input v-model="add.form.email" type="text" name="email" placeholder="Email Addres"
                            class="form-control" :class="{ 'is-invalid': add.form.errors.has('email') }">
                        <has-error :form="add.form" field="email"></has-error>
                    </div>
                    <div class="form-group">
                        <textarea v-model="add.form.bio" type="text" name="bio" placeholder="Short Bio for User (Optional)"
                            class="form-control" :class="{ 'is-invalid': add.form.errors.has('bio') }"><textarea>
                        <has-error :form="add.form" field="bio"></has-error>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"></button>
                </div>
            </div>
        </div> -->
    </div>
</template>

<script>
// import Users from './Users';
export default {
    name:"modal",
    props:['add'],
    data() {
        return {
        }
    },

}
</script>

<style>

</style>
