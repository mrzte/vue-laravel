@extends('layouts.base')
@section('konten')
<div class="container-fluid">
  <div class="row">
      <profil></profil>
      <div class="col-md-3">
      <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Lembaga</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-graduation-cap mr-1"></i>Nama Lembaga</strong>

                <p class="text-muted">
                  {{$lembaga->nama}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">{{$lembaga->kota}} <br> {{$lembaga->provinsi}} </p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">Php</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
      <div class="col-lg-9">
         <div class="card card-primary card-outline"> 
         <div class="card-header p-2">
                  <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#kusioner" data-toggle="tab">Kusioner</a></li>
                  <li class="nav-item"><a class="nav-link" href="#data-univ" data-toggle="tab">Edit Data Perguruan Tinggi</a></li>
                </ul>
                </div>
              <div class="card-body">
                <div class="tab-content">
                <div class="tab-pane active" id="kusioner">
                <h2>Hai</h2>
                </div>
                  <div class="tab-pane" id="data-univ">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="name" class="form-control" id="inputName" placeholder="Nama">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Alamat"></textarea>
                        </div>
                      </div>
                       <label>
                              Logo                              
                            </label>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                           
                            <input type="file" class="form-control-file">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
              </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
              </div><!-- /.card-body -->
              
              </div><!-- /.card-body -->
              </div><!-- /.card-body -->
              @endsection