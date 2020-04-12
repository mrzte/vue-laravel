@extends('layouts.base')
@section('konten')
           <div class="card">
            <div class="card-body card-primary card-outline">
             <table class="table table-striped table-bordered table-hover" id="table2">
              <thead class="alert-primary">
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Kode Lembaga</th>
                <th>Nama Lembaga</th>
              </tr>
              </thead>
             </table>
            </div>
         </div>
@stop
@push('scripts')
<script>
$(function() {
    $('#table2').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'api/users',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'phone', name: 'phone' },
            { data: 'kode', name: 'kode' },
            { data: 'nama', name: 'nama' },
        
        ]
    });
});
</script>
@endpush
