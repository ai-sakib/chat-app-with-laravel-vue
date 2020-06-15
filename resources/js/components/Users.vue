<template>
  <div>
    <span v-if="$gate.isAdminOrSubAdmin()">
        <div class="content-header" >
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->

          <!-- Main content -->
          <div class="content">
            <div class="container-fluid">
              <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Users List</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-success" @click="addModal()">Add New <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th>Created At</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(user,index) in users.data" :key="user.id">
                      <td>{{ index+1 }}</td>
                      <td>{{ user.name }}</td>
                      <td>{{ user.email }}</td>
                      <td>{{ userType(user.type) }}</td>
                      <td>{{ user.created_at | timeformat }}</td>
                      <td>
                        <a @click="editModal(user)" class="btn  bg-primary btn-sm" style="cursor: pointer;"><i class="fas fa-edit"></i></a>
                        <a @click="deleteUser(user.id)" class="btn  bg-danger btn-sm" style="cursor: pointer;"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="card-footer">
                <pagination :data="users" @pagination-change-page="getResults">
                  <!-- <span slot="prev-nav">&lt; Previous</span>
                  <span slot="next-nav">Next &gt;</span> -->
                </pagination>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
              <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- Modal -->
      <div class="modal fade" id="addNewModal" tabindex="-1" role="dialog" aria-labelledby="addNewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" v-show="!editMode" id="addNewModalLabel">Add New User</h5>
              <h5 class="modal-title" v-show="editMode" id="addNewModalLabel">Update User Info</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form  @submit.prevent="editMode ? updateUser() : createUser()" @keydown="form.onKeydown($event)">
              <div class="modal-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input v-model="form.name" type="text" class="form-control" id="name" name="name" placeholder="Add Name" :class="{ 'is-invalid': form.errors.has('name') }">
                  <has-error :form="form" field="name"></has-error>
                </div>
                
                <div class="form-group">
                  <label for="bio">Personal Information (Bio)</label>
                  <textarea v-model="form.bio" type="text" class="form-control" id="bio" name="bio" placeholder="Personal Information (Bio)" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
                  <has-error :form="form" field="bio"></has-error>
                </div>
                <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input v-model="form.email" type="text" class="form-control" id="email" name="email" placeholder="Email Address" :class="{ 'is-invalid': form.errors.has('email') }">
                      <has-error :form="form" field="email"></has-error>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="type">Type</label>
                      <select id="type" name="type" v-model="form.type" class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                        <option value="" disabled="disabled" selected>Select One</option>
                        <option value="1">Admin</option>
                        <option value="2">Sub Admin</option>
                        <option value="3">Editor</option>
                      </select>
                      <has-error :form="form" field="type"></has-error>
                    </div>
                  </div>
                </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input v-model="form.password" type="password" class="form-control" id="password" name="password" placeholder="Password" :class="{ 'is-invalid': form.errors.has('password') }">
                      <has-error :form="form" field="password"></has-error>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="password_confirmation">Confirm Password</label>
                      <input v-model="form.password_confirmation" type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" :class="{ 'is-invalid': form.errors.has('password_confirmation') }">
                      <has-error :form="form" field="password_confirmation"></has-error>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" v-show="!editMode" class="btn btn-success">Create</button>
                <button type="submit" v-show="editMode" class="btn btn-success">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </span>
    <span v-if="!$gate.isAdminOrSubAdmin()">
      <error401></error401>
    </span>
  </div>
</template>

<script>
    export default {
      data () {
        return {
          users: {},
          editMode: false,
          form: new Form({
                id: '',
                name: '',
                email: '',
                bio: '',
                photo: '',
                type: '',
                password: '',
                password_confirmation: '',
                remember: false
              })
          }
      },
      methods: {
        getResults(page = 1) {
          axios.get('api/user?page=' + page)
            .then(response => {
              this.users = response.data;
            });
        },
        editModal(user){
          this.editMode = true;
          this.form.clear();
          this.form.reset();
          $('#addNewModal').modal('show');
          this.form.fill(user);
        },
        addModal(){
          this.editMode = false;
          this.form.clear();
          this.form.reset();
          $('#addNewModal').modal('show');
        },
        createUser() {
          this.$Progress.start();
          this.form.post('api/user')
            .then(()=>{

              Fire.$emit('AfterActions');
              this.$Progress.finish();
              $('#addNewModal').modal('hide');

              Toast.fire({
                icon: 'success',
                title: 'User created successfully'
              });
            })
        },
        updateUser(){
          this.$Progress.start();
          this.form.put('api/user/'+this.form.id)
            .then(({data})=>{

              $('#addNewModal').modal('hide');
              Fire.$emit('AfterActions');
              this.$Progress.finish();
              
              swalWithBootstrapButtons.fire(
                'Updated!',
                'Your file has been updated.',
                'success'
              )
              
            })
            .catch(()=>{
              this.$Pregress.fail();
            })
        },
        deleteUser(id) {
          swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
          }).then((result) => {
            if (result.value) {
              this.form.delete('api/user/'+id)
                .then(()=>{
                  swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
                  Fire.$emit('AfterActions');
                })
              
            } else if (
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
              )
            }
          })
        },
        loadUsers(){
          if(this.$gate.isAdminOrSubAdmin()){
            axios.get('api/user').then(({ data }) => (
              this.users = data
            ));
          }        },
        userType(type){
          let name='';
          if(type == 1){ 
            name='Admin' 
          }
          else if(type == 2){ 
            name='Sub Admin' 
          }
          else if(type == 3){ 
            name='Editor' 
          }
          return name;
        }
      },
      created(){
        Fire.$on('searching',()=>{

          let keyword = this.$parent.keyword;
          axios.get('api/search?s='+keyword)
            .then((response)=>{
              this.users = response.data;
            })
            .catch((response)=>{

            })
        })
        this.loadUsers();
        Fire.$on('AfterActions',()=>{
          this.loadUsers();
        })
      },
    }
</script>
<!-- <script>
    export default {
      data () {
        return {
          // users: {},
          form: new Form({
                name: '',
                email: '',
                bio: '',
                photo: '',
                type: '',
                password: '',
                password_confirmation: '',
                remember: false
              })
          }
      },
      methods: {
        createUser() {
          this.$Progress.start();
          this.form.post('api/user')
            .then(({data})=>{

              Fire.$emit('AfterActions');

              $('#addNewModal').modal('hide');
              this.$Progress.finish();

              Toast.fire({
                icon: 'success',
                title: 'User created successfully'
              });
            })
        },
        deleteUser(id) {
          swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
          }).then((result) => {
            if (result.value) {
              this.form.delete('api/user/'+id)
                .then(()=>{
                  swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
                  this.$store.dispatch("getUsers")
                  // Fire.$emit('AfterActions');
                })
              
            } else if (
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
              )
            }
          })
        },
        loadUsers(){
          axios.get('api/user').then(({ data }) => (
            this.users = data.users
          ));
        },
        userType(type){
          let name='';
          if(type == 1){ 
            name='Admin' 
          }
          else if(type == 2){ 
            name='Sub Admin' 
          }
          else if(type == 3){ 
            name='Editor' 
          }
          return name;
        }
      },
      created(){
        this.$store.dispatch("getUsers")
        // this.loadUsers();
        // Fire.$on('AfterActions',()=>{
        //   this.loadUsers();
        // })
      },
      computed:{
        users(){
          return this.$store.getters.getUsers;
        }
      }
    }
</script> -->
