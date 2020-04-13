<template>
            <div class="container-fluid">
             <div class="card mt-3" v-if="$gate.admin()">
              <div class="card-header">
                <h3 class="card-title">Manajemen Pengguna</h3>
                <div class="card-tools">
                    <button class="btn alert-primary" @click="newModal">
                        Tambah Pengguna
                        <i class="fas fa-user-plus">
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
                      <th>Nama</th>
                      <th>Nama Pengguna</th>
                      <th>Surel</th>
                      <th>Nomor Telepon</th>
                      <th>Tipe</th>
                      <th>Lembaga</th>
             
                      <th>Aksi</th>
                    </tr>
                  
                  
                    <tr v-for="user in users" :key="user.id">
                      <td>{{user.id}}</td>
                      <td>{{user.name}}</td>
                      <td>{{user.username}}</td>
                      <td>{{user.email}}</td>
                      <td>{{user.phone}}</td>
                      <td>{{user.level}}</td>
                      <td>{{user.nama}}</td>
           
                       <td style="width:75px;">
                            <button @click="editModal(user)" class="btn alert-primary">
                                <i class="fas fa-edit">

                                </i>
                            </button>
                           <button class="btn alert-success ml-1">
                               <i class="fas fa-eye">

                               </i>
                          </button>
                          <button title="Hapus User" @click="deleteUser(user.id)"
                               class="btn alert-danger ml-1">
                               <i class="fas fa-trash">

                               </i>
                          </button>
                       </td>
                    </tr>
                  </tbody>
                </table>
                <div class="card-footer">
                  <pagination :data="users" @pagination-change-page="getResults"></pagination>
                </div>
              </div>
              <!-- Modal -->
                <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                               <h5 v-show="!editmode" class="modal-title" id="addNewLabell" >Tambah Pengguna</h5>
                                <h5 v-show="editmode" class="modal-title" id="addNewLabel" >Perbarui Pengguna</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                         <form @submit.prevent="editmode ? updateUser() : buatPengguna() ">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input v-model="form.name" type="text" name="name"
                                    placeholder="Masukan Nama Lengkap"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
                                </div>
                                <div class="form-group">
                                    <input v-model="form.username" type="text" name="username"
                                    placeholder="Masukan Nama Pengguna"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('username') }">
                                    <has-error :form="form" field="username"></has-error>
                               </div>
                               <div class="form-group">
                                    <input v-model="form.email" type="text" name="email"
                                    placeholder="Masukan Alamat Surel"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                    <has-error :form="form" field="email"></has-error>
                               </div>
                                <div class="form-group">
                                    <input v-model="form.phone" type="text" name="phone"
                                    placeholder="Masukan Nomor Telepon"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }">
                                    <has-error :form="form" field="phone"></has-error>
                               </div>
                               <div v-show="editmode" class="form-group">
                                    <input disabled v-model="form.kode" type="number" name="kode"
                                    placeholder="Masukan Kode Lembaga"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('kode') }">
                                    <!-- <br><span><button @click="cekKode" type="button" class="btn alert-success">Cek Kode</button></span> -->
                                    <has-error :form="form" field="kode"></has-error>
                               </div>
                               <div v-show="!editmode" class="form-group">
                                    <input v-model="form.kode" type="number" name="kode"
                                    placeholder="Masukan Kode Lembaga"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('kode') }">
                                    <!-- <br><span><button @click="cekKode" type="button" class="btn alert-success">Cek Kode</button></span> -->
                                    <has-error :form="form" field="kode"></has-error>
                               </div>
                               <div class="form-group">
                                    <select v-model="form.level" name="level"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('level') }">
                                    <option value="">Pilih Level</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Verifikator">Verifikator</option>
                                    <option value="User">User</option>
                                    </select>
                                    <has-error :form="form" field="kode"></has-error>
                               </div>
                               <div v-show="!editmode" class="form-group">
                                    <input v-model="form.password" 
                                    id="password" placeholder="Masukan Kata Sandi" 
                                    type="password" class="form-control" 
                                    name="password"
                                    :class="{ 'is-invalid': form.errors.has('password') }">
                                    <has-error :form="form" field="password"></has-error>
                               </div>
                               <div v-show="!editmode" class="form-group">
                                   <input  placeholder="Konfirmasi Kata Sandi" 
                                    type="password"
                                    data-vv-as="password" 
                                    id="confirm_password"
                                    required
                                    name="password_confirmation"
                                   class="form-control">
                               </div>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button v-show="editmode" type="submit" class="btn btn-success">Perbarui</button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                        </form>
                    </div>
                </div>
           </div>
      </div>
           <div v-if="!$gate.admin()">
             <tidak-ada></tidak-ada>
           </div>
  </div>
</template>

<script>
    export default {
        data() {
            return {
               editmode: false,
               users:{},
               form: new Form({
                   id:'',
                   name:'',
                   email:'',
                   phone:'',
                   username:'',
                   foto:'',
                   level:'',
                   kode:'',
                   password:'',

               })
            }
        },
        methods: {
            getResults(page = 1) {
            axios.get('api/users?page=' + page)
            .then(response => {
              this.users = response.data;
            });
          },
          updateUser(){
               this.$Progress.start();
               this.form.put('api/users/'+this.form.id)
               .then(()=>{
                //succes
                $('#addNew').modal('hide');
                swalWithBootstrapButtons.fire(
                  'Berhasil!',
                  'User Sudah Berhasil Diperbarui!.',
                  'success'
                    )
                this.$Progress.finish();
                Fire.$emit('SudahDibuat');
               })
               .catch(()=>{
                //gagal
                swalWithBootstrapButtons.fire(
                  'User Gagal Diperbarui',
                  'Silahkan Periksa Kembali.',
                  'error'
                    )
                this.$Progress.fail();
               });
            },
            editModal(user){
                this.editmode = true;
                this.form.clear();
                this.form.reset();
               $('#addNew').modal('show');
                this.form.fill(user);
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
                    this.form.delete('/api/users/'+id).then(()=>{
                      
                        swalWithBootstrapButtons.fire(
                      'Terhapus!',
                      'Pengguna Telah Terhapus!.',
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
                      'Pengguna Tidak Jadi Di Hapus!',
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
              if(this.$gate.admin()){

                this.$Progress.start();
                axios.get("api/users").then(({data}) => (this.users = data.data));
                
                this.$Progress.finish();
              }
            },
            buatPengguna(){
                this.$Progress.start();
                this.form.post('api/users')
                .then(() => {
                Fire.$emit('SudahDibuat')
                $('#addNew').modal('hide')
      
                swalWithBootstrapButtons.fire(
                  'Berhasil!',
                  'Pengguna Berhasil dibuat',
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
