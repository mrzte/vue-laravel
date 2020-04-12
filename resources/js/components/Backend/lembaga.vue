<template>
             <div class="card mt-3">
              <div class="card-header">
                <h3 class="card-title">Manajemen Lembaga</h3>
                <div class="card-tools">
                    <button class="btn alert-primary" @click="newModal">
                        Tambah Lembaga
                        <i class="fas fa-plus">
                        </i>
                    </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered table-striped table-solid">
               <tbody>
                    <tr>
                      <th>ID</th>
                      <th>Kode Lembaga</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <!-- <th>Email</th> -->
                      <th>Surel</th>
                      <th>Nomor Telepon</th>
                      <!-- <th>Provinsi</th> -->
                      <!-- <th>Kota</th> -->
                      <!-- <th>Kode Pos</th> -->
             
                      <th>Aksi</th>
                    </tr>
                  
                  
                    <tr v-for="lembaga in lembaga.data" v-bind:key="lembaga.id">
                      <td>{{lembaga.id}}</td>
                      <td>{{lembaga.kode}}</td>
                      <td>{{lembaga.nama}}</td>
                      <td>{{lembaga.alamat}}</td>
                      <td>{{lembaga.email}}</td>
                      <td>{{lembaga.phone}}</td>
                      <!-- <td>{{lembaga.provinsi}}</td> -->
                      <!-- <td>{{lembaga.kota}}</td> -->
                      <!-- <td>{{lembaga.kode_pos}}</td> -->
           
                       <td style="width:75px;">
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
                               <h5 v-show="!editmode" class="modal-title" id="addNewLabell" >Tambah Lembaga</h5>
                                <h5 v-show="editmode" class="modal-title" id="addNewLabel" >Perbarui Lembaga</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                         <form @submit.prevent="editmode ? updateUser() : buatPengguna() ">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input v-model="form.nama" type="text" name="nama"
                                    placeholder="Masukan Nama Lembaga"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('nama') }">
                                    <has-error :form="form" field="nama"></has-error>
                                </div>
                                <div class="form-group">
                                    <input v-model="form.kode" type="number" name="kode"
                                    placeholder="Masukan Kode Lembaga"
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
                                    placeholder="Masukan Alamat Lembaga"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('lembaga') }">
                                    <has-error :form="form" field="lembaga"></has-error>
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
        
</template>

<script>
    export default {
      data() {
            return {
               editmode: false,
               provinsi:{},
               form: new Form({
                    id:'',
                    provinsi: '',
               })
            }
        },
        data() {
            return {
               editmode: false,
               lembaga:{},
               form: new Form({
                    id:'',
                    nama: '',
                    kode:'',
                    email:'',
                    provinsi: '',
                    kota: '',
                    alamat:'',
                    phone: '',
                    kode_pos:'',
                    logo:'',
                    kontak: ''

               })
            }
        },
         
        methods: {
            getResults(page = 1) {
            axios.get('api/lembaga?page=' + page)
            .then(response => {
              this.lembaga = response.data;
            });
          },
          updateUser(){
               this.$Progress.start();
               this.form.put('api/lembaga/'+this.form.id)
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
            editModal(lembaga){
                this.editmode = true;
                this.form.clear();
                this.form.reset();
               $('#addNew').modal('show');
               this.form.fill(lembaga);
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
                    this.form.delete('/api/lembaga/'+id).then(()=>{
                      
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
                axios.get("api/provinsi2").then(({data}) => (this.provinsi = data));
                axios.get("api/lembaga").then(({data}) => (this.lembaga = data));
                this.$Progress.finish();
            },
            buatPengguna(){
                this.$Progress.start();
                this.form.post('api/lembaga')
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
        },
        // terbuat() {
        //     this.loadProvinsi();
        //     Fire.$on('SudahDibuat',()=>{
        //         this.loadProvinsi();
        //     });
        // }
    }
</script>
