<template>  
            <div class="container-fluid">
                
            <!-- <datalist id="dataprov">
            <option value="">Pilih Provinsi</option>
            <option v-for="provinsi in provinsi" v-bind:key="provinsi.id" 
            :value="provinsi.id">{{provinsi.provinsi}}</option>
            </datalist> -->
            <div class="form-group">
                <select name="provinsi" id="provinsi" class="form-control">
                    <option v-for="provinsi in provinsi" v-bind:key="provinsi.id" :value="provinsi.id">{{provinsi.provinsi}}</option>
                </select>
            </div>
            <div class="form-group">
                <select name="kota" id="kota" class="form-control">
                    <option v-for="kota in kota" v-bind:key="kota.id" :value="kota.id">{{kota.kota}}</option>
                </select>
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
               kota:{},
               form: new Form({
                    id:'',
                    kota: '',
               })
            }
        },
        methods: {
        loadProvinsi(){
                this.$Progress.start();
                axios.get("api/provinsi").then(({data}) => (this.provinsi = data));  
                axios.get("api/kota").then(({data}) => (this.kota = data));  
                this.$Progress.finish();
            },
        },
        created() {
            this.loadProvinsi();
            Fire.$on('SudahDibuat',()=>{
                this.loadProvinsi();
            });
        }
    }
</script>