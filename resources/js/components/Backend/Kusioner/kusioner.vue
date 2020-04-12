<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Lembaga</th>
                                    <th>Alamat</th>
                                    <th>Pengguna</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Universitas Padjadjaran</td>
                                    <td>Jln.Jatinangor</td>
                                    <td>Maulana Sodiqin</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <div id="kusioner">
                   
                <div class="card" >
                    <div class="card-body">
                        <button  class="btn btn-success ml-2 mr-1 mt-2" v-for="pertanyaan in pertanyaan" v-bind:key="pertanyaan.urutan" >{{pertanyaan.urutan}}</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h2 v-bind:class="{'d-none': !Tampilkan}">Hai Kepin</h2>
                    <button @click="editModal(pertanyaan)" class="btn btn-warning">Cek</button>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</template>

<script>
    export default {
        data: {
          Tampilkan: false
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
