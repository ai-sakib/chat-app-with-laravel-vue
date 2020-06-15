<style type="text/css">
  .widget-user-header{
    height: 200px;
  }
  .widget-user .card-footer {
      padding: 0px;
  }
</style>
<template>
    <span>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white"
                   style="background: url('public/images/cover.jpg') center center;">
                <h3 class="widget-user-username text-right">{{ this.form.name }}</h3>
                <h5 class="widget-user-desc text-right">Web</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" :src="updateImage()" alt="User Avatar">
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
          </div>
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link " href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class=" tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="public/dist/img/user1-128x128.jpg" alt="user image">
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
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="public/dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <input class="form-control form-control-sm" placeholder="Response">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="public/dist/img/user6-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Posted 5 photos - 5 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <img class="img-fluid" src="public/dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="public/dist/img/photo2.png" alt="Photo">
                              <img class="img-fluid" src="public/dist/img/photo3.jpg" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="public/dist/img/photo4.jpg" alt="Photo">
                              <img class="img-fluid" src="public/dist/img/photo1.png" alt="Photo">
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

                  <div class="active tab-pane" id="settings">
                    <form @submit.prevent="updateProfile"  @keydown="form.onKeydown($event)">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" v-model="form.name" name="name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" id="name" placeholder="Enter Name">
                        <has-error :form="form" field="name"></has-error>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" v-model="form.email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" :class="{ 'is-invalid': form.errors.has('email') }" placeholder="Enter email">
                        <has-error :form="form" field="email"></has-error>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                      </div>

                      <div class="form-group">
                        <label for="bio">Personal Information (Bio)</label>
                        <textarea v-model="form.bio" class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }" id="bio" name="bio"></textarea>
                        <has-error :form="form" field="bio"></has-error>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" name="password" v-model="form.password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }"  id="password" placeholder="Password">
                              <has-error :form="form" field="password"></has-error>
                            </div>
                            
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="password_confirmation">Confirm Password</label>
                              <input type="password" name="password_confirmation" v-model="form.password_confirmation" class="form-control" id="password_confirmation" :class="{ 'is-invalid': form.errors.has('password_confirmation') }"  placeholder="Confirm Password">
                              <has-error :form="form" field="password_confirmation"></has-error>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="exampleFormControlFile1">Profile Picture</label>
                               <input type="file" @change="changeImage($event)" class="form-control-file" id="exampleFormControlFile1">
                          </div>
                          <div class="col-md-3">
                               <img :src="updateImage()" style="max-width: 200px; max-height: 100px" alt="">
                          </div>
                        </div>
                      </div>

                      <!-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                      </div> -->
                      <button type="submit" class="btn btn-success">Update</button>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          
        </div>
      </div>
      
        
    </span>
</template>

<script>
    export default {
      data () {
        return {
          form: new Form({
            id: '',
            name: '',
            email: '',
            bio: '',
            photo: '',
            type: '',
            provider_id: '',
          })
        }
      },
      created() {
          axios.get('api/profile')
            .then(({data}) => {
              this.form.fill(data)
            })
            .catch(()=>{

            })
      },
      methods:{
        updateProfile(){
          this.$Progress.start();
          this.form.put('api/profile/'+this.form.id)

            .then(() => {
              this.$Progress.finish();
              swalWithBootstrapButtons.fire(
                'Updated!',
                'Your file has been updated.',
                'success'
              )
            })
            .catch(()=>{
              this.$Progress.fail();
            })
        },
        changeImage(event){
          let file = event.target.files[0];
          if(file.size > 4194304){
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Sorry, the image is too large!',
              // footer: '<a href>Why do I have this issue?</a>'
            })
          }else if(file.type.split('/')[0] != 'image'){
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Sorry, the file is not image!',
              // footer: '<a href>Why do I have this issue?</a>'
            })
          }
          else{
            let reader = new FileReader();
            reader.onload = (event)=>{
              this.form.photo = event.target.result;
            }
            reader.readAsDataURL(file);
          }
        },
        updateImage(){
          let img = this.form.photo;
          console.log(img);
          if(this.form.provider_id == 1){
            return this.form.photo
          }else{
            if(img){
              if(img.length > 100){
                return this.form.photo
              }else{
                return "public/images/profile/"+this.form.photo;
              }
              
            }
            
          }

        }
      }
  }
</script>
