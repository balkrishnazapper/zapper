<template>
    <div class="container">
        <div class="row mt-5">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Contact List</h3>

                <div class="card-tools">
                    <router-link class="btn btn-success" to="/addContact">Add New Agent <i class="fas fa-user-plus"></i></router-link>
                  <!--<button class="btn btn-success" @click="newContact">Add New Agent <i class="fas fa-user-plus"></i></button>-->
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
         
    </div>
</template>

<script>
    export default {
        data() {
            return {
                editMode: false,
                users: {},
                basicForm: new Form({
                    id: '',
                    contact_id: '',
                    title: '',
                    first_name: '',
                    middle_name:'',
                    last_name :  '',
                    email : '',
                    home_phone: '',
                    mobile_phone:'',
                    secondery_phone:'',
                    ssn:'',
                    date_of_birth:'',
                    drivers_license:'',
                    drivers_license_state: '',
                    primary_email:'',
                    secondery_email:'',
                    contact_image:'',   
                    status:'',
                    created_by: '',
                    update_by:''

                })
            }
        },
        methods: {
            newContact(){
                
            },
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
            newContact(){
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
