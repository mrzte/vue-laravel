<template>
<div class="row">
    <!-- About Me Box -->
    <div class="col-md-3">
            <div class="card card-primary card-outline" >
             
              <!-- /.card-header -->
              <div class="card-body">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" :src="getProfileLogo()" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center mt-2">{{this.form.nama}}</h3>

               

                <hr>
                <strong><i class="fas fa-code mr-1"></i>Kode Lembaga</strong>

                <p class="text-muted">
                  <span class="badge badge-primary">{{this.form.kode}}</span>
                </p>
                 <hr>
                <strong><i class="fas fa-envelope mr-1"></i>Alamat Surel</strong>
                
                 <p class="text-muted">
                  <span class="badge badge-primary">{{this.form.email}}</span>
                </p>
                <hr>

                <strong><i class="fas fa-phone mr-1"></i>Nomor Telepon</strong>
                
                 <p class="text-muted">
                  <span class="badge badge-primary">{{this.form.phone}}</span>
                </p>
                

               
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <!-- /.card -->
   <div class="col-md-9">
               <div class="card card-primary card-outline">
                 <div class="card-header p-2"> 
                  <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#kusioner" data-toggle="tab">Data Lembaga</a></li>
                  <li class="nav-item"><a class="nav-link" href="#data-univ" data-toggle="tab">Edit Data Lembaga</a></li>
                </ul>
                 </div><!-- /.card-header --> 
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="kusioner">
                     <!-- <form @submit.prevent="updateUser()"> -->
                      <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input disabled v-model="form.nama" type="name" class="form-control" id="nama" placeholder="Nama">
                        </div>
                      </div>                      <div class="form-group row">
                        <label for="kode" class="col-sm-2 col-form-label">Kode Lembaga</label>
                        <div class="col-sm-10">
                          <input disabled v-model="form.kode" class="form-control" id="kode" placeholder="Alamat">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="alamat2" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <textarea disabled v-model="form.alamat" class="form-control" id="alamat" placeholder="Alamat"></textarea>
                        </div>
                      </div>
                     <div class="form-group row">
                        <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
                         <div class="col-sm-10">
                          <select disabled v-model="form.provinsi" name="provinsi" id="provinsi"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('provinsi') }">
                            <option value="">Pilih Provinsi</option>
                            <option v-for="provinsi in provinsi" v-bind:key="provinsi.id" :value="provinsi.id">
                              {{provinsi.provinsi}}
                            </option>
                          </select>
                         </div>
                          <has-error :form="form" field="provinsi"></has-error> 
                        </div>
                      <div class="form-group row">
                        <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                         <div class="col-sm-10">
                          <select disabled v-model="form.kota" name="kota" id="kota"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('kota') }">
                            <option value="">Pilih Kota</option>
                            <option v-for="kota in kota" v-bind:key="kota.id" :value="kota.id">
                              {{kota.kota}}
                            </option>
                          </select>
                         </div>
                          <has-error :form="form" field="provinsi"></has-error> 
                        </div>
                           <!-- <label>
                              Logo                              
                            </label>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                           
                            <input @change="updateLogo" type="file" class="form-control-file">
                          </div>
                        </div>
                      </div> -->
                      <!-- <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div> -->
                  <!-- </form> -->
                  </div>
                  <div class="tab-pane" id="data-univ">
                  <form @submit.prevent="updateUser()">
                      <div class="form-group row">
                        
                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input v-model="form.nama" type="name" class="form-control" id="inputName" placeholder="Nama">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <textarea v-model="form.alamat" class="form-control" id="inputExperience" placeholder="Alamat"></textarea>
                        </div>
                      </div>
                      <div class="form-group row"> 
                        <label for="inputName" class="col-sm-2 col-form-label">Kode Pos </label>
                        <div class="col-sm-10">
                          <input v-model="form.kode_pos" type="kode_pos" class="form-control" id="kode_pos" placeholder="Kode Pos">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
                         <div class="col-sm-10">
                          <select readonly disabled v-model="form.provinsi" name="provinsi" id="provinsi"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('provinsi') }">
                            <option value="">Pilih Provinsi</option>
                            <option v-for="provinsi in provinsi" v-bind:key="provinsi.id" :value="provinsi.id">
                              {{provinsi.provinsi}}
                            </option>
                          </select>
                         </div>
                          <has-error :form="form" field="provinsi"></has-error> 
                        </div>
                      <div class="form-group row">
                        <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                         <div class="col-sm-10">
                          <select readonly disabled v-model="form.kota" name="kota" id="kota"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('kota') }">
                            <option value="">Pilih Kota</option>
                            <option v-for="kota in kota" v-bind:key="kota.id" :value="kota.id">
                              {{kota.kota}}
                            </option>
                          </select>
                         </div>
                          <has-error :form="form" field="provinsi"></has-error> 
                        </div>
                        <label>
                          Logo                              
                        </label>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                           
                            <input @change="updateLogo" type="file" class="form-control-file">
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
              </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->  
              </div>
              </div>
</template>
<script>
    export default {
      data() {
            return {
               editmode: false,
               kota:{},
               form: new Form({
                    id:'',
                    kota: '',
               })
            }
        },
      data() {
            return {
             
               provinsi:{},
               form: new Form({
                    id:'',
                    provinsi: '',
               })
            }
        },
        data() {
            return {
             
               lembaga:{},
               form: new Form({
                    id:'',
                    nama: '',
                    kode:'',
                    logo:'',
                    kota:'',
                    kode_pos:'',
                    provinsi:'',
                    alamat:'',
                    email:'',
                    phone:'',
                    kontak:'',
            
                   

               })
            }
        },
        
        methods: {
            getProfileLogo(){
            let logo = (this.form.logo.length > 200) ? this.form.logo : "img/logo/"+ this.form.logo ;
            return logo;
          },
          updateLogo(e){
                // console.log('mencoba uplot');
                let file = e.target.files[0];
                // console.log(file);
                let reader = new FileReader();
                if(file['size'] < 2111775){
                  reader.onloadend = (file) => {
                  //  console.log('RESULT', reader.result)
                  this.form.logo = reader.result;
                  
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
                
                
                

            },
          updateUser(){
               this.$Progress.start();
               this.form.put('api/pdpt/'+this.form.id)
               .then(()=>{
                //succes
                $('#addNew').modal('hide');
                swalWithBootstrapButtons.fire(
                  'Berhasil!',
                  'Lembaga Sudah Berhasil Diperbarui!.',
                  'success'
                    )
                this.$Progress.finish();
                Fire.$emit('SudahDibuat');
               })
               .catch(()=>{
                //gagal
                swalWithBootstrapButtons.fire(
                  'Lembaga Gagal Diperbarui',
                  'Silahkan Periksa Kembali.',
                  'error'
                    )
                this.$Progress.fail();
               });
            },
            editModal(pdpt){
             
                this.form.clear();
                this.form.reset();
            
               this.form.fill(pdpt);
            
            },
           
            loadPengguna(){
                this.$Progress.start();
                axios.get("api/kota2").then(({data}) => (this.kota = data));
                axios.get("api/provinsi2").then(({data}) => (this.provinsi = data));
                axios.get("api/pdpt").then(({data}) => (this.form.fill(data)));
                // axios.get("api/profile").then(({ data }) => (this.form.fill(data)));
                
                
                this.$Progress.finish();
            },
            
           
           
        },
        
        
        
        created() {
          
            this.loadPengguna();
            Fire.$on('SudahDibuat',()=>{
                this.loadPengguna();
                
            });
        }
    }
</script>
