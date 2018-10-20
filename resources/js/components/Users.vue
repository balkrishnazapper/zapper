<template>
    <div class="container">
        <div class="row mt-5">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Agents List</h3>

                <div class="card-tools">
                  <button class="btn btn-success" @click="newModal">Add New Agent <i class="fas fa-user-plus"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>ID</th>
                    <th>Agent Name</th>
                    <th>Agent Email</th>
                    <th>Agent Type</th>
                    <th>Created_At</th>
                    <th>Modify</th>
                  </tr>
                 
                  <tr v-for="user in users" :key="user.id">
                    <td>{{user.id}}</td>
                    <td>{{user.first_name}} {{user.last_name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.user_type | upText}}</td>
                    <td>{{user.created_at | myDate}}</td>
                    <td>
                        <a href="#" @click="editModal(user)">
                            <i class="fa fa-edit blue"></i>
                        </a>
                        /
                        <a href="#" @click="deleteAgent(user.id)">
                            <i class="fa fa-trash red"></i>
                        </a>

                    </td>
                  </tr>
                  </tbody></table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
         <div class="modal fade" id="addagent" tabindex="-1" role="dialog" aria-labelledby="addagentLabel" aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                        <div class="modal-header">
                            <h5 v-show="editMode" class="modal-title" id="exampleModalLabel">Update Agent Information</h5>
                            <h5 v-show="!editMode" class="modal-title" id="exampleModalLabel">Create New Agent</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form @submit.prevent="editMode ? updateUser() : createUser()">
                            
                            <div class="modal-body">
                                <div class="form-group">
                                    <select name="title" v-model="form.title" id="title" class="form-control" :class="{
                                        'is-invalid': form.errors.has('title') }">
                                        <option value="">Select User Title</option>
                                        <option value="mr">Mr.</option>
                                        <option value="mrs">Mrs.</option>
                                        <option value="ms">Ms.</option>
                                    </select>
                                    <has-error :form="form" field="title"></has-error>   
                                </div>
                                <div class="form-group">
                                    <input v-model="form.first_name" type="text" name="first_name" placeholder="Enter agent first name"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('first_name') }">
                                    <has-error :form="form" field="first_name"></has-error>
                                </div>
                                <div class="form-group">
                                    <input v-model="form.last_name" type="text" name="last_name" placeholder="Enter agent last name"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('last_name') }">
                                    <has-error :form="form" field="last_name"></has-error>
                                </div>
                                <div class="form-group">
                                    <input v-model="form.email" type="email" name="email" placeholder="Email Address"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                    <has-error :form="form" field="email"></has-error>
                                </div>
                                <div class="form-group">
                                    <input v-model="form.password" type="password" name="password" placeholder="Enter Password"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                    <has-error :form="form" field="password"></has-error>
                                </div>
                                <div class="form-group">
                                    <select name="department" v-model="form.department" id="department" class="form-control" :class="{
                                        'is-invalid': form.errors.has('department') }">
                                        <option value="">Select User Department</option>
                                        <option value="admin">Admin</option>
                                        <option value="human-resource">Human Resource</option>
                                        <option value="it-support">IT Support</option>
                                        <option value="operations">Operations</option>
                                    </select>
                                    <has-error :form="form" field="department"></has-error>   
                                </div>
                                <div class="form-group">
                                    <select name="user_type" v-model="form.user_type" id="user_type" class="form-control" :class="{
                                        'is-invalid': form.errors.has('user_type') }">
                                        <option value="">Select User Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="team-leader">Team Leader</option>
                                        <option value="agent">Agent</option>
                                    </select>
                                    <has-error :form="form" field="user_type"></has-error>   
                                </div>
                                <div class="form-group">
                                    <input v-model="form.mobile_no" type="text" name="mobile_no" placeholder="Enter agent Mobile Number"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('mobile_no') }">
                                    <has-error :form="form" field="mobile_no"></has-error>
                                </div>
                                <div class="form-group">
                                    <textarea v-model="form.address"  name="address"
                                    placeholder="Address for User (Optional)" class="form-control" :class="{ 'is-invalid': form.errors.has('address') }"></textarea>
                                    <has-error :form="form" field="address"></has-error>
                                </div>
                                <div class="form-group">
                                    <input v-model="form.state" type="text" name="state" placeholder="Enter agent state name"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('state') }">
                                    <has-error :form="form" field="state"></has-error>
                                </div>
                                <div class="form-group">
                                    <input v-model="form.country" type="text" name="country" placeholder="Enter agent country"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('country') }">
                                    <has-error :form="form" field="country"></has-error>
                                </div>
                                <div class="form-group">
                                    <input v-model="form.zip_code" type="text" name="zip_code" placeholder="Enter agent zip code"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('zip_code') }">
                                    <has-error :form="form" field="zip_code"></has-error>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button v-show="editMode" type="submit" class="btn btn-success">Update Agent</button>
                                <button v-show="!editMode" type="submit" class="btn btn-primary">Create Agent</button>
                            </div>
                        </form>   
                  </div>
             </div>
         </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                editMode: false,
                users: {},
                form: new Form({
                    id: '',
                   title: '',
                   first_name: '',
                   last_name :  '',
                   email : '',
                   password: '',
                   department: '',
                   user_type: '',
                   mobile_no:'',
                   address:'',
                   state:'',
                   country:'',
                   zip_code:''
                })
            }
        },
        methods: {
            updateUser(){
                //console.log('Edit Mode');
                this.$Progress.start();
                this.form.put('api/user/'+this.form.id)
                .then(() => {
                    $('#addagent').modal('hide');
                    swal(
                            'Updated!',
                            'Agent Information Updated.',
                            'success'
                        )
                        this.$Progress.finish();
                        Fire.$emit('AfterCreate');
                })
                .catch(() => {
                    this.$Progress.fail();
                })
            },
            editModal(user){
                this.editMode = true;
                this.form.reset();
                $('#addagent').modal('show');
                this.form.fill(user);
            },
            newModal(){
                this.editMode = false;
                this.form.reset();
                $('#addagent').modal('show');
            },
            deleteAgent(id){
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if(result.value){
                             this.form.delete('api/user/'+ id).then(()=>{
                            swal(
                                'Deleted!',
                                'Your Agent has been deleted.',
                                'success'
                                )
                                Fire.$emit('AfterCreate');
                            }).catch(()=> {
                                swal("Failed!","There was something wrong","Warning");
                            })
                        }
                       
                    
                })

            },
            loadUsers(){
                axios.get("api/user").then(({ data }) => (this.users = data.data));
            },
            createUser(){
                this.$Progress.start();
                this.form.post('api/user')
                .then(() => {
                    Fire.$emit('AfterCreate');
                $('#addagent').modal('hide');
                toast({
                    type: 'success',
                    title: 'Agent Created successfully'
                });
                this.$Progress.finish();
                })
                .catch(() =>{

                });
                
            }
        },
        created() {
            this.loadUsers();
            Fire.$on('AfterCreate',() => {
                this.loadUsers();
            })
            //setInterval(() => this.loadUsers(),3000);
        }
    }
</script>
