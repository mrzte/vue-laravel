
          <template>
             <div class="card mt-3">
              <div class="card-header">
                <h3 class="card-title">Manajemen Pertanyaan</h3>
                <div class="card-tools">
                    <button class="btn alert-primary" @click="newModal">
                        Tambah Pertanyaan
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
                      <th>Urutan</th>
                      <th>Indikator</th>
                      <th>Pertanyaan</th>
                      <th>Jenis</th>
                      <!-- <th>Provinsi</th> -->
                      <!-- <th>Kota</th> -->
                      <!-- <th>Kode Pos</th> -->
             
                      <th>Edit Isi Pilihan</th>
                      <th>Aksi</th>
                    </tr>
                  
                  
                    <tr v-for="pertanyaan in pertanyaan.data" v-bind:key="pertanyaan.id_pertanyaan">
                      <td>{{pertanyaan.id_pertanyaan}}</td>
                      <td>{{pertanyaan.urutan}}</td>
                      <td>{{pertanyaan.indikator}}</td>
                      <td style="width: 300px;">{{pertanyaan.pertanyaan}}</td>
                      <td>
                        {{pertanyaan.uraian}}
                         </td>
                         <td>
                           <button @click="editPilihan(pilihan)" class="btn alert-warning">
                           <i class="fas fa-edit">
                          </i>
                          </button> 
                      </td>
                      
                      <!-- <td>{{lembaga.phone}}</td> -->
                      <!-- <td>{{lembaga.provinsi}}</td> -->
                      <!-- <td>{{lembaga.kota}}</td> -->
                      <!-- <td>{{lembaga.kode_pos}}</td> -->
           
                       <td style="width:75px;">
                            <button @click="editModal(pertanyaan)" class="btn alert-primary">
                                <i class="fas fa-edit">

                                </i>
                            </button>
                           <button class="btn alert-success ml-1">
                               <i class="fas fa-eye">

                               </i>
                          </button>
                          <button title="Hapus User" @click="deleteUser(pertanyaan.id_pertanyaan)"
                               class="btn alert-danger ml-1">
                               <i class="fas fa-trash">

                               </i>
                          </button>
                       </td>
                    </tr>
                  </tbody>
                </table>
            </div>
               
                <div class="col-md-3 ml-3 mt-3">
                  <div class="row">
                <pagination :data="pertanyaan" :limit="10" @pagination-change-page="getResults">
                  <br>
                </pagination>
                </div>
              </div>
              <!-- Modal -->
              <div class="modal fade" id="pilihan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Perbarui Pilihan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form @submit.prevent="updatePilihan()">
                    <div class="modal-body">
                      <table class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                            <!-- <th>id Pertanyaan</th>                            -->
                            <th>Pilihan</th>                           
                            <th>Level</th>                           
                            <th>Label</th>                           
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="pilihan in pilihan" v-bind:key="pilihan.id_pertanyaan">
                            <td>{{pilihan.id_pertanyaan}}</td>
                            <td>{{pilihan.pilihan}}</td>
                            <td></td>
                            <td><input style="size:20px;" type="checkbox" class="form-control"></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
                <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                               <h5 v-show="!editmode" class="modal-title" id="addNewLabell" >Tambah Pertanyaan</h5>
                                <h5 v-show="editmode" class="modal-title" id="addNewLabel" >Perbarui Pertanyaan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                         <form @submit.prevent="editmode ? updateUser() : buatPengguna() ">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input v-model="form.urutan" type="number" name="urutan"
                                    placeholder="Masukan Urutan Soal"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('urutan') }">
                                    <has-error :form="form" field="urutan"></has-error>
                               </div>
                                <div class="form-group">
                                    <textarea v-model="form.pertanyaan" type="text" name="pertanyaan"
                                    placeholder="Masukan Pertanyaan"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('nama') }"></textarea>
                                    <has-error :form="form" field="nama"></has-error>
                                </div>
                                
                               <div class="form-group">
                                    <textarea v-model="form.petunjuk" type="text" name="petunjuk"
                                    placeholder="Masukan Petunjuk"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('petunjuk') }">
                                    </textarea>
                                    <has-error :form="form" field="petunjuk"></has-error>
                               </div>
                               <div class="form-group">
                                    <select v-model="form.jenis" name="jenis"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('jenis') }">
                                    <option value="">Pilih Jenis</option>
                                    <option value="1">Pilihan Ya dan Tidak</option>
                                    <option value="2">Plihan Ganda</option>
                                    <option value="3">Pilihan Ganda dengan Alternatif</option>
                                    <option value="4">Pertanyaan Terbuka</option>
                                    <option value="5">Banyak Pertanyaan Terbuka</option>
                                    </select>
                                    <has-error :form="form" field="jenis"></has-error>
                               </div>
                               <div class="form-group">
                                   
                                       
                                 
                                    <select   
                                    v-model="form.id_indikator" name="id_indikator"
                                    class="itemName form-control" :class="{ 'is-invalid': form.errors.has('id_indikator') }" 
                                    >
                                    <option value="">Pilih Indikator</option>
                                    <option v-for="indikator in indikator" v-bind:key="indikator.id_indikator" :value="indikator.id_indikator">
                                      {{indikator.indikator}}
                                    </option>
                                    </select>
                                    
                                    <has-error :form="form" field="jenis"></has-error>
                               </div>
                               
                               
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
               $('#addNew').modal('show');
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
