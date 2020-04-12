<template>
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 mt-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" :src="getProfilePhoto()" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{this.form.name}}</h3>

               

                <p class="text-muted text-center">{{this.form.name_univ}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b class="mr-3">{{this.form.email}}</b>
                  </li>
                  <li class="list-group-item">
                    <b class="mr-4">{{this.form.username}}</b> 
                  </li>
                 
                </ul>

                
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

                <p class="text-muted">{{this.form.kota}}</p>

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
          <div class="col-md-9 mt-3">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Kusioner</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Edit Data Pribadi</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="#" alt="user image">
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
                        <img class="img-circle img-bordered-sm" src="#" alt="User Image">
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
                        <img class="img-circle img-bordered-sm" src="#" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Posted 5 photos - 5 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <img class="img-fluid" src="#" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="#" alt="Photo">
                              <img class="img-fluid" src="#" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="#" alt="Photo">
                              <img class="img-fluid" src="#" alt="Photo">
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
                  <div class="tab-pane" id="timeline">
                   <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input v-model="form.name" type="name" class="form-control" id="inputName" placeholder="Nama"
                          :class="{ 'is-invalid': form.errors.has('name') }" name="name" required autocomplete="name">
                           <has-error :form="form" field="name"></has-error>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input v-model="form.email" class="form-control" type="email" id="inputExperience" placeholder="Masukan Email"
                          :class="{ 'is-invalid': form.errors.has('email') }" name="email" required autocomplete="email">
                           <has-error :form="form" field="email"></has-error>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-10">
                          <input v-model="form.phone" class="form-control" type="number" id="inputExperience" placeholder="Masukan Nomor Telepon"
                          :class="{ 'is-invalid': form.errors.has('phone') }" name="no_hp" required autocomplete="phone">
                           <has-error :form="form" field="phone"></has-error>
                        </div>
                      </div>
                        <!-- <div class="form-group row">
                            <label for="kota" class="col-md-4 col-form-label text-md-right">Kota</label>
                                <input id="kota" v-model="form.kota" type="text" :class="{ 'is-invalid': form.errors.has('kota') }" list="kotas" class="form-control  @error('kota') is-invalid @enderror" name="kota" value="{{ old('kota') }}" required autocomplete="level">
                                <datalist id="kotas">
                                    <option value="">Pilih Kota</option>
                                    @foreach($kota as $k)
                                    <option value="{{$k->kota}}">{{$k->kota}}</option>
                                    @endforeach
                                </datalist>
                                </div> -->
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Level</label>
                        <div class="col-sm-10">
                          <input v-model="form.level" disabled class="form-control" type="select" id="inputExperience">
                           <has-error :form="form" field="level"></has-error>
                        </div>
                      </div>
                       <label>
                              Photo                              
                            </label>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                           
                            <input @change="updateProfile" type="file" class="form-control-file">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input v-model="form.password" class="form-control" type="password" id="inputExperience" 
                          :class="{ 'is-invalid': form.errors.has('password') }" name="password" required autocomplete="new-password">
                           <has-error :form="form" field="password"></has-error>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button @click.prevent="updateInfo" type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
             </div>
             <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#kusioner" data-toggle="tab">Kusioner</a></li>
                  <li class="nav-item"><a class="nav-link" href="#data-univ" data-toggle="tab">Edit Data Perguruan Tinggi</a></li>
                </ul>
              </div><!-- /.card-header --> 
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="kusioner">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="#" alt="user image">
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
                        <img class="img-circle img-bordered-sm" src="#" alt="User Image">
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
                        <img class="img-circle img-bordered-sm" src="#" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Posted 5 photos - 5 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <img class="img-fluid" src="#" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="#" alt="Photo">
                              <img class="img-fluid" src="#" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="#" alt="Photo">
                              <img class="img-fluid" src="#" alt="Photo">
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
                  <div class="tab-pane" id="data-univ">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input v-model="form.name" type="name" class="form-control" id="inputName" placeholder="Nama">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Alamat"></textarea>
                        </div>
                      </div>
                       <label>
                              Logo                              
                            </label>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                           
                            <input type="file" class="form-control-file">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
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
    export default {
      data(){
        return {
          form: new Form({
            id:'',
            name: '',
            email: '',
            phone: '',
            level: '',
            kota: '',
            name_univ: '',
            password:'',
            photo: ''
            })
        }
      },
      kota(){
        return {
          form: new Form({
            id:'',
            id_provinsi:'',
            kota:''
          })
        }
      },
        mounted() {
            console.log('Component mounted.')
        },

        methods:{
          getProfilePhoto(){
            let photo = (this.form.photo.length > 200) ? this.form.photo : "img/profile/"+ this.form.photo ;
            return photo;
          },
          updateInfo(){
            this.$Progress.start();
            if(this.form.password == ''){
              this.form.password = undefined;
            }
              this.form.put('api/profile')
              .then(()=>{
                
                swalWithBootstrapButtons.fire(
                  'Berhasil!',
                  'Memperbarui data.',
                  'success'
                    )
                    Fire.$emit('SudahDibuat')
                    this.$Progress.finish();
                    

              })
              
              .catch(()=>{
                swalWithBootstrapButtons.fire(
                  'Gagal!',
                  'Perhatikan lagi kolom yang di isi!.',
                  'error'
                    )
                    this.$Progress.fail();
                  
                 
              });
          },
            updateProfile(e){
                // console.log('mencoba uplot');
                let file = e.target.files[0];
                // console.log(file);
                let reader = new FileReader();
                if(file['size'] < 2111775){
                  reader.onloadend = (file) => {
                  //  console.log('RESULT', reader.result)
                  this.form.photo = reader.result;
                  
                }
                reader.readAsDataURL(file);
                }else{
                  swalWithBootstrapButtons.fire(
                  'Maaf',
                  'File yang anda upload terlalu besar pastikan file berukuran kurang dari 2Mb.',
                  'error'
                    )
                    this.$Progress.fail();
                }
                
                
                
                  
            }
            
        },
        loadKota(){
                axios.get("api/users").then(({ kota }) => (this.users = kota));
            },
        
        created(){
          axios.get("api/profile").then(({ data }) => (this.form.fill(data)));
        }
    }
</script>
