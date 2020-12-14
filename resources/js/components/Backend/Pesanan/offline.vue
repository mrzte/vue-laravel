<template>
    <section>
               <div class="content-header" v-if="$gate.admin()">
                  <div class="container-fluid">
                    <div class="row mb-2">
                      <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manajemen Pesanan Offline</h1>
                      </div><!-- /.col -->
                      <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><router-link to="/">Halaman</router-link></li>
                          <li class="breadcrumb-item active">Manajemen Pesanan Offline</li>
                        </ol>
                      </div><!-- /.col -->
                    </div><!-- /.row -->
                  </div><!-- /.container-fluid -->
                 <div class="card">
              <div class="card-body">
                    <button class="btn alert-primary mb-3" @click="newModal">
                        <i class="fas fa-plus">
                        </i>
                        Tambah Data Pesanan Offline
                    </button>
                <table class="table table-hover table-bordered table-striped table-solid">
               <thead class="alert alert-primary">
                    <tr>
                      <th>No</th>
                      <th>Kode Toko</th>
                      <th>Nama</th>
                      <th>Jumlah Pesanan</th>
                      <th>Alamat</th>
                      <!-- <th>Email</th> -->
                      <th>Surel</th>
                      <th>Nomor Telepon</th>
                      <th>Provinsi</th>
                      <th>Kota</th>
                      <!-- <th>Kode Pos</th> -->
             
                      <th>Aksi</th>
                    </tr>
               </thead>
                  <tbody>
                    <tr v-for="lembaga, index) in lembaga" v-bind:key="lembaga.id" index:1>
                      <td>{{index+1}}</td>
                      <td width="30px">{{lembaga.kode}}</td>
                      <td width="30px">{{lembaga.nama}}</td>
                      <td>{{lembaga.alamat}}</td>
                      <td></td>
                      <td>{{lembaga.email}}</td>
                      <td width="30px">{{lembaga.phone}}</td>
                      <td>{{lembaga.propinsi}}</td>
                      <td>{{lembaga.kota}}</td>
                      <!-- <td>{{lembaga.kode_pos}}</td> -->
           
                       <td style="width:185px;">
                            <button @click="editModal(lembaga)" class="btn alert-primary">
                                <i class="fas fa-edit">

                                </i>
                            </button>
                           <button class="btn alert-success ml-1">
                               <i class="fas fa-eye">

                               </i>
                          </button>
                          <button title="Hapus User" @click="deleteUser(lembaga.id)"
                               class="btn alert-danger ml-1">
                               <i class="fas fa-trash">

                               </i>
                          </button>
                       </td>
                    </tr>
                  </tbody>
                </table>
             
          
               <div class="container-fluid mt-3">
                <div class="col-md-3 mt-3">
                  <div class="row">
                <pagination :data="lembaga" :limit="10" @pagination-change-page="getResults">
                  <br>
                </pagination>
                </div>
             
          
              </div>
            </div>
            </div>
          
              <!-- Modal -->
                <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                               <h5 v-show="!editmode" class="modal-title" id="addNewLabell" >Tambah Toko</h5>
                                <h5 v-show="editmode" class="modal-title" id="addNewLabel" >Perbarui Toko</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                         <form @submit.prevent="editmode ? updateUser() : buatPengguna() ">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input v-model="form.nama" type="text" name="nama"
                                    placeholder="Masukan Nama Toko"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('nama') }">
                                    <has-error :form="form" field="nama"></has-error>
                                </div>
                                <div class="form-group">
                                    <input v-model="form.kode" type="number" name="kode"
                                    placeholder="Masukan Kode Toko"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('kode') }">
                                    <has-error :form="form" field="kode"></has-error>
                               </div>
                               <div class="form-group">
                                    <input v-model="form.email" type="text" name="email"
                                    placeholder="Masukan Alamat Surel"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                    <has-error :form="form" field="email"></has-error>
                               </div>
                               <div class="form-group">
                                    <input v-model="form.alamat" type="text" name="alamat"
                                    placeholder="Masukan Alamat Toko"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('alamat') }">
                                    <has-error :form="form" field="alamat"></has-error>
                               </div>
                                <div class="form-group">
                                    <input v-model="form.phone" type="number" name="phone"
                                    placeholder="Masukan Nomor Telepon"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }">
                                    <has-error :form="form" field="phone"></has-error>
                               </div>
                                <!-- <div class="form-group">
                                    <select v-model="form.provinsi" class="form-control">
                                      <option value="">Pilih Provinsi</option>
                                      <option value="11">ACEH</option><option value="12">SUMATERA UTARA</option><option value="13">SUMATERA BARAT</option><option value="14">RIAU</option><option value="15">JAMBI</option><option value="16">SUMATERA SELATAN</option><option value="17">BENGKULU</option><option value="18">LAMPUNG</option><option value="19">KEPULAUAN BANGKA BELITUNG</option><option value="21">KEPULAUAN RIAU</option><option value="31">DKI JAKARTA</option><option value="32">JAWA BARAT</option><option value="33">JAWA TENGAH</option><option value="34">DI YOGYAKARTA</option><option value="35">JAWA TIMUR</option><option value="36">BANTEN</option><option value="51">BALI</option><option value="52">NUSA TENGGARA BARAT</option><option value="53">NUSA TENGGARA TIMUR</option><option value="61">KALIMANTAN BARAT</option><option value="62">KALIMANTAN TENGAH</option><option value="63">KALIMANTAN SELATAN</option><option value="64">KALIMANTAN TIMUR</option><option value="65">KALIMANTAN UTARA</option><option value="71">SULAWESI UTARA</option><option value="72">SULAWESI TENGAH</option><option value="73">SULAWESI SELATAN</option><option value="74">SULAWESI TENGGARA</option><option value="75">GORONTALO</option><option value="76">SULAWESI BARAT</option><option value="81">MALUKU</option><option value="82">MALUKU UTARA</option><option value="91">PAPUA BARAT</option><option value="94">PAPUA</option></select>
                                    <has-error :form="form" field="provinsi"></has-error>
                                </div> -->
                                <div class="form-group">
                                  <select v-model="form.provinsi" name="provinsi" id="provinsi"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('provinsi') }">
                                    <option value="">Pilih Provinsi</option>
                                    <option v-for="provinsi in provinsi" v-bind:key="provinsi.id" :value="provinsi.id">
                                      {{provinsi.provinsi}}
                                    </option>
                                  </select>
                                  <has-error :form="form" field="provinsi"></has-error> 
                                </div>
                                <div class="form-group">
                                  <input list="kota" v-model="form.kota" name="kota"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('kota') }">
                                   <datalist id="kota">
                                    <option v-for="kota in kota" v-bind:key="kota.id" :value="kota.id">
                                      {{kota.kota}}
                                    </option>
                                   </datalist>
                                  <has-error :form="form" field="kota"></has-error> 
                                </div>
                                <!-- <input list="dataprov" v-model="form.provinsi"
                                 class="form-control" :class="{ 'is-invalid': form.errors.has('provinsi') }">
                                <provinsi>
                                </provinsi>
                                 <has-error :form="form" field="provinsi"></has-error> -->
                                
                          </div>
                        <div class="modal-footer">
                            <button t="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button v-show="editmode" type="submit" class="btn btn-success">Perbarui</button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                        </form>
                    </div>
                </div>
           </div>
           <div class="card-footer">
                  
           </div>
              </div>
               </div>
           <div v-if="!$gate.admin()">
             <tidak-ada></tidak-ada>
           </div>
</section>
</template>

<script>
    export default {
        data: {
          Tampilkan: false
        },
        data() {
            return {
               profile:{},
               form: new Form({
                    name:'',
                    kode:'',
                   
                    
                   

               })
            }
        },
        data() {
            return {
               pertanyaan:{},
               form: new Form({
                    id_pertanyaan:'',
                    id_indikator:'',
                    pertanyaan: '',
                    jenis:'',
                    urutan:'',
                    petunjuk: '',
                    
                   

               })
            }
        },
        data() {
            return {
               pilihan:{},
               form: new Form({
                    id_pilihan:'',
                    id_pertanyaan:'',
                    pilihan: '',
                    level: '',
                    
                   

               })
            }
        },
        data() {
            return {
               editmode: false,
               indikator:{},
               form: new Form({
                    id_indikator:'',
                    indikator: '',
                    
                   

               })
            }
        },
        data() {
            return {
               editmode: false,
               pertanyaan:{},
               form: new Form({
                    id_pertanyaan:'',
                    id_indikator:'',
                    pertanyaan: '',
                    jenis:'',
                    urutan:'',
                    petunjuk: '',
                   

               })
            }
        },
        
        methods: {
            getResults(page = 1) {
            axios.get('api/pertanyaan?page=' + page)
            .then(response => {
              this.pertanyaan = response.data;
            });
          },
          updatePilihan(){
               this.$Progress.start();
               this.form.put('api/pilihan/'+this.form.id_pertanyaan)
               .then(()=>{
                //succes
                $('#pilihan').modal('hide');
                swalWithBootstrapButtons.fire(
                  'Berhasil!',
                  'Pilihan Sudah Berhasil Diperbarui!.',
                  'success'
                    )
                this.$Progress.finish();
                Fire.$emit('SudahDibuat');
               })
               .catch(()=>{
                //gagal
                swalWithBootstrapButtons.fire(
                  'Pilihan Gagal Diperbarui',
                  'Silahkan Periksa Kembali.',
                  'error'
                    )
                this.$Progress.fail();
               });
            },
          updateUser(){
               this.$Progress.start();
               this.form.put('api/pertanyaan/'+this.form.id_pertanyaan)
               .then(()=>{
                //succes
                $('#addNew').modal('hide');
                swalWithBootstrapButtons.fire(
                  'Berhasil!',
                  'Pertanyaan Sudah Berhasil Diperbarui!.',
                  'success'
                    )
                this.$Progress.finish();
                Fire.$emit('SudahDibuat');
               })
               .catch(()=>{
                //gagal
                swalWithBootstrapButtons.fire(
                  'Pertanyaan Gagal Diperbarui',
                  'Silahkan Periksa Kembali.',
                  'error'
                    )
                this.$Progress.fail();
               });
            },
            editModal(pertanyaan){
                this.editmode = true;
                this.form.clear();
                this.form.reset();
               
                this.form.fill(pertanyaan);
            
            },
            editPilihan(pilihan){
                this.form.clear();
                this.form.reset();
               $('#pilihan').modal('show');
               this.form.fill(pilihan);
            
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
               $('#addNew').modal('show');
            },
            deleteUser(id){
                swalWithBootstrapButtons.fire({
                  title: 'Apa anda yakin?',
                  text: "",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Ya, Hapus Saja!',
                  cancelButtonText: 'Tidak, Batalkan!',
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {
                    this.form.delete('/api/pertanyaan/'+id_pertanyaan).then(()=>{
                      
                        swalWithBootstrapButtons.fire(
                      'Terhapus!',
                      'Lembaga Telah Terhapus!.',
                      'success'
                    )
                    Fire.$emit('SudahDibuat')
                    })
                    
                    .catch(()=>{
                        swalWithBootstrapButtons.fire(
                      'Error',
                      'Ada Sesuatu Yang Salah!.',
                      'error'
                    )
                    })
                    
                  } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === swal.DismissReason.cancel
                  ) {
                    swalWithBootstrapButtons.fire(
                      'Dibatalkan!',
                      'Lembaga Tidak Jadi Di Hapus!',
                      'error'
                    )
                  }
                })
            },
            cekKode(){
               swal.fire({
                title: 'Submit your Github username',
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Look up',
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    return fetch(`//api.github.com/users/${login}`)
                    .then(response => {
                        if (!response.ok) {
                        throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                        `Request failed: ${error}`
                        )
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                if (result.value) {
                    swal.fire({
                    title: `${result.value.login}'s avatar`,
                    imageUrl: result.value.avatar_url
                    })
                }
                })
             },
            loadPengguna(){
                this.$Progress.start();
                axios.get("api/profile").then(({data}) => (this.profile = data));
                axios.get("api/pertanyaan2").then(({data}) => (this.pertanyaan = data));
                axios.get("api/pilihan").then(({data}) => (this.pilihan = data));
                axios.get("api/indikator2").then(({data}) => (this.indikator = data));
                axios.get("api/pertanyaan").then(({data}) => (this.pertanyaan = data));
                
                
                this.$Progress.finish();
            },
           
            buatPengguna(){
                this.$Progress.start();
                this.form.post('api/pertanyaan')
                .then(() => {
                Fire.$emit('SudahDibuat')
                $('#addNew').modal('hide')
      
                swalWithBootstrapButtons.fire(
                  'Berhasil!',
                  'Lembaga Berhasil dibuat',
                  'success'
                  )

                this.$Progress.finish();

                })
                .catch(()=>{
                    this.$Progress.fail();
                    
                swalWithBootstrapButtons.fire(
                  'Gagal!',
                  'Perhatikan lagi bidang yang di isi!',
                  'error'
                )


                })
            }
        },
        
        created() {
            this.loadPengguna();
      
            Fire.$on('SudahDibuat',()=>{
                this.loadPengguna();
                
            });
        }
    }
</script>
