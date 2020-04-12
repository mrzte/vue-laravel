<template>
             <div class="card mt-3">
              <div class="card-header">
                <h3 class="card-title">Manajemen Provinsi</h3>
                <div class="card-tools">
                    <button class="btn alert-primary" @click="newModal">
                        Tambah Provinsi
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
                      <th>Provinsi</th>
                      <th>Aksi</th>
                    </tr>
                  
                  
                    <tr v-for="provinsi in provinsi.data" v-bind:key="provinsi.id">
                      <td>{{provinsi.id}}</td>
                      <td>{{provinsi.provinsi}}</td>
                       <td style="width:75px;">
                            <button @click="editModal(provinsi)" class="btn alert-primary">
                                <i class="fas fa-edit">

                                </i>
                            </button>
                           <button class="btn alert-success ml-1">
                               <i class="fas fa-eye">

                               </i>
                          </button>
                          <button title="Hapus Provinsi" @click="deleteUser(provinsi.id)"
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
                <pagination :data="provinsi" :limit="10" @pagination-change-page="getResults">
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
                               <h5 v-show="!editmode" class="modal-title" id="addNewLabell" >Tambah Provinsi</h5>
                                <h5 v-show="editmode" class="modal-title" id="addNewLabel" >Perbarui Provinsi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                         <form @submit.prevent="editmode ? updateUser() : buatPengguna() ">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input v-model="form.provinsi" type="text" name="provinsi"
                                    placeholder="Masukan Nama Provinsi"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }">
                                    <has-error :form="form" field="phone"></has-error>
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
               provinsi:{},
               form: new Form({
                    id:'',
                    provinsi: '',
               })
            }
        },
        methods: {
            getResults(page = 1) {
            axios.get('api/provinsi?page=' + page)
            .then(response => {
              this.provinsi = response.data;
            });
          },
          updateUser(){
               this.$Progress.start();
               this.form.put('api/provinsi/'+this.form.id)
               .then(()=>{
                //succes
                $('#addNew').modal('hide');
                swalWithBootstrapButtons.fire(
                  'Berhasil!',
                  'Provinsi Sudah Berhasil Diperbarui!.',
                  'success'
                    )
                this.$Progress.finish();
                Fire.$emit('SudahDibuat');
               })
               .catch(()=>{
                //gagal
                swalWithBootstrapButtons.fire(
                  'Provinsi Gagal Diperbarui',
                  'Silahkan Periksa Kembali.',
                  'error'
                    )
                this.$Progress.fail();
               });
            },
            editModal(provinsi){
                this.editmode = true;
                this.form.clear();
                this.form.reset();
               $('#addNew').modal('show');
               this.form.fill(provinsi);
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
                    this.form.delete('/api/provinsi/'+id).then(()=>{
                      
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
                      'Provinsi Tidak Jadi Di Hapus!',
                      'error'
                    )
                  }
                })
            },
            loadPengguna(){
              this.$Progress.start();
                axios.get("api/provinsi").then(({data}) => (this.provinsi = data));
                this.$Progress.finish();
            },
            buatPengguna(){
                this.$Progress.start();
                this.form.post('api/provinsi')
                .then(() => {
                Fire.$emit('SudahDibuat')
                $('#addNew').modal('hide')
      
                swalWithBootstrapButtons.fire(
                  'Berhasil!',
                  'Provinsi Berhasil dibuat',
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
