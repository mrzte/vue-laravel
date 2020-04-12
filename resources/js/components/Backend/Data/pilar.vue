<template>
             <div class="card mt-3">
              <div class="card-header">
                <h3 class="card-title">Manajemen Pilar</h3>
                <div class="card-tools">
                    <button class="btn alert-primary" @click="newModal">
                        Tambah Pilar
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
                      <th>Pilar</th>
                      <th>Deskripsi</th>
                      <th>Aksi</th>
                    </tr>
                  
                  
                      <tr v-for="pilar in pilar" :key="pilar.id_pilar">
                      <td>{{pilar.id_pilar}}</td>
                      <td>{{pilar.pilar}}</td>
                      <td width="300px">{{pilar.deskripsi}}</td>
                       <td style="width:75px;">
                            <button @click="editModal(pilar)" class="btn alert-primary">
                                <i class="fas fa-edit">

                                </i>
                            </button>
                           <button class="btn alert-success ml-1">
                               <i class="fas fa-eye">

                               </i>
                          </button>
                          <button title="Hapus Pilar" @click="deleteUser(pilar.id_pilar)"
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
                <pagination :data="pilar" :limit="10" @pagination-change-page="getResults">
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
                               <h5 v-show="!editmode" class="modal-title" id="addNewLabell" >Tambah Pilar</h5>
                                <h5 v-show="editmode" class="modal-title" id="addNewLabel" >Perbarui Pilar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                         <form @submit.prevent="editmode ? updateUser() : buatPengguna() ">
                            <div class="modal-body">
                                <div class="form-group">
                                  <select v-model="form.id_pilar" name="pilar" id="pilar"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('pilar') }">
                                    <option value="">Pilih Pilar</option>
                                    <option v-for="pilar in pilar" v-bind:key="pilar.id_pilar" :value="pilar.id_pilar">
                                      {{pilar.pilar}}
                                    </option>
                                  </select>
                                  <has-error :form="form" field="pilar"></has-error> 
                                </div>
                                <div class="form-group">
                                    <textarea v-model="form.deskripsi" type="text" name="deskripsi"
                                    placeholder="Masukan Deskripsi Pilar"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('deskripsi') }">
                                    </textarea>
                                    <has-error :form="form" field="deskripsi"></has-error>
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
               editmode: false,
               pilar:{},
               form: new Form({
                    id_pilar:'',
                    pilar: '',
                    deskripsi: '',
               })
            }
        },
        methods: {
            getResults(page = 1) {
            axios.get('api/pilar?page=' + page)
            .then(response => {
              this.pilar = response.data;
            });
          },
          updateUser(){
               this.$Progress.start();
               this.form.put('api/pilar/'+this.form.id_pilar)
               .then(()=>{
                //succes
                $('#addNew').modal('hide');
                swalWithBootstrapButtons.fire(
                  'Berhasil!',
                  'Pilar Sudah Berhasil Diperbarui!.',
                  'success'
                    )
                this.$Progress.finish();
                Fire.$emit('SudahDibuat');
               })
               .catch(()=>{
                //gagal
                swalWithBootstrapButtons.fire(
                  'Pilar Gagal Diperbarui',
                  'Silahkan Periksa Kembali.',
                  'error'
                    )
                this.$Progress.fail();
               });
            },
            editModal(pilar){
                this.editmode = true;
                this.form.clear();
                this.form.reset();
               $('#addNew').modal('show');
               this.form.fill(pilar);
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
                    this.form.delete('/api/pilar/'+id_pilar).then(()=>{
                      
                        swalWithBootstrapButtons.fire(
                      'Terhapus!',
                      'Pilar Telah Terhapus!.',
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
                      'Pilar Tidak Jadi Di Hapus!',
                      'error'
                    )
                  }
                })
            },
            loadPengguna(){
              this.$Progress.start();
                axios.get("api/pilar").then(({data}) => (this.pilar = data));
                // axios.get("api/indikator").then(({data}) => (this.indikator = data));
                this.$Progress.finish();
            },
            buatPengguna(){
                this.$Progress.start();
                this.form.post('api/pilar')
                .then(() => {
                Fire.$emit('SudahDibuat')
                $('#addNew').modal('hide')
      
                swalWithBootstrapButtons.fire(
                  'Berhasil!',
                  'Pilar Berhasil dibuat',
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
    }
</script>
