<template>
    <div class="container-fluid" @click="editModal(pdpt)">
        <div class="row">
         <div class="col-md-3">
            <div class="card ">
              <!-- /.card-header -->
              <div class="card-body card-primary card-outline">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" :src="getProfilePhoto()" alt="User profile picture">
                </div>
                 <h3 class="profile-username text-center mt-2">{{this.form.name}}</h3>
                <strong><i class="fas fa-user-tie mr-1"></i>Nama Pengguna</strong>

                <p class="text-muted">
                 <span class="badge badge-success">{{this.form.username}}</span>
                </p>
                <hr>


                <strong><i class="fas fa-envelope mr-1"></i>Alamat Surel</strong>

                <p class="text-muted">
                  <span class="badge badge-success">{{this.form.email}}</span>
                  </p>

                <hr>

                <strong><i class="fas fa-phone mr-1"></i>Nomor Telepon</strong>

                <p class="text-muted">
                <span class="badge badge-success">{{this.form.phone}}</span>
                </p>

            

                
              </div>
              <!-- /.card-body -->
            </div>
            </div>
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profil</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Edit Data Profil</a></li>
                  <li class="nav-item"><a class="nav-link" href="#katasandi" data-toggle="tab">Ubah Kata Sandi</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="activity">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                          <input disabled v-model="form.name" type="name" class="form-control" id="name" placeholder="Nama"
                          :class="{ 'is-invalid': form.errors.has('name') }" name="name" required autocomplete="name">
                           <has-error :form="form" field="name"></has-error>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Nama Pengguna</label>
                        <div class="col-sm-10">
                          <input disabled v-model="form.username" type="username" class="form-control" id="username" placeholder="Masukan Nama Pengguna"
                          :class="{ 'is-invalid': form.errors.has('username') }" name="username" required autocomplete="username">
                           <has-error :form="form" field="username"></has-error>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="surel" class="col-sm-2 col-form-label">Surel</label>
                        <div class="col-sm-10">
                          <input disabled v-model="form.email" class="form-control" type="email" id="inputExperience" placeholder="Masukan Surel"
                          :class="{ 'is-invalid': form.errors.has('email') }" name="email" required autocomplete="email">
                           <has-error :form="form" field="email"></has-error>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-10">
                          <input disabled v-model="form.phone" class="form-control" type="number" id="inputExperience" placeholder="Masukan Nomor Telepon"
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
                          <input disabled v-model="form.level" disabled class="form-control" type="select" id="inputExperience">
                           <has-error :form="form" field="level"></has-error>
                        </div>
                      </div>
                       
                     
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button style="display:none;" @click.prevent="updateInfo" type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                   <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                          <input v-model="form.name" type="name" class="form-control" id="name" placeholder="Nama"
                          :class="{ 'is-invalid': form.errors.has('name') }" name="name" required autocomplete="name">
                           <has-error :form="form" field="name"></has-error>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Nama Pengguna</label>
                        <div class="col-sm-10">
                          <input v-model="form.username" type="username" class="form-control" id="username" placeholder="Masukan Nama Pengguna"
                          :class="{ 'is-invalid': form.errors.has('username') }" name="username" required autocomplete="username">
                           <has-error :form="form" field="username"></has-error>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="surel" class="col-sm-2 col-form-label">Surel</label>
                        <div class="col-sm-10">
                          <input v-model="form.email" class="form-control" type="email" id="inputExperience" placeholder="Masukan Surel"
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
                        <div class="offset-sm-2 col-sm-10">
                          <button @click.prevent="updateInfo" type="submit" class="btn btn-primary">Perbarui Data Pribadi</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="katasandi">
                   <form class="form-horizontal">
                     
                     
                      <div class="form-group row">
                        <label for="surel" class="col-sm-2 col-form-label">Surel</label>
                        <div class="col-sm-10">
                          <input disabled v-model="form.email" class="form-control" type="email" id="email" placeholder="Masukan Surel"
                          :class="{ 'is-invalid': form.errors.has('email') }" name="email" required autocomplete="email">
                           <has-error :form="form" field="email"></has-error>
                        </div>
                      </div>
                     
                   
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Kata Sandi</label>
                        <div class="col-sm-10">
                          <input v-model="form.password" class="form-control" type="password" id="inputExperience" 
                          :class="{ 'is-invalid': form.errors.has('password') }" name="password" required autocomplete="new-password">
                           <has-error :form="form" field="password"></has-error>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Konfirmasi Kata Sandi</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="confirm-password" id="inputExperience" 
                          :class="{ 'is-invalid': form.errors.has('password') }" name="password" required>
                           <has-error :form="form" field="password"></has-error>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button @click.prevent="updateInfo" type="submit" class="btn btn-primary">Perbarui Kata Sandi</button>
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
           
            <!-- /.card -->
          </div>
          <div v-if="!$gate.admin()">
          <pdpt></pdpt>
           </div>

         
            <!-- /.card -->
          <!-- /.col -->
          </div>
        
</template>

<script>
    export default {
       
      data(){
        return {
          form: new Form({
            id:'',
            name: '',
            nama: '',
            username: '',
            email: '',
            phone:'',
            level: '',
            password:'',
            photo: ''
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
                  'Memperbarui data Pengguna.',
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
        created(){
          axios.get("api/profile").then(({ data }) => (this.form.fill(data)));
        }
    }
</script>
