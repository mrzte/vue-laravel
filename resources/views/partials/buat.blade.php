
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="bookForm" name="bookForm" class="form-horizontal">
                    <input type="hidden" name="id_indikator" id="id_indikator">
                    <div class="form-group">
                        <label for="pilar" class="col-sm-2 control-label">Pilar</label>
                        <div class="col-sm-12">
                            <select  class="form-control @error('id_pilar') is-invalid @enderror" id="id_pilar" name="id_pilar"
                                 required="" autocomplete="off">
                                 
                                 <option value="">Pilih Pilar</option>
                                 @foreach($pilar as $p)
                                 <option value="{{$p->id_pilar}}">{{$p->pilar}}</option>
                                 @endforeach
                                 </select>
                                
                        </div>
                    </div>
                               @error('id_pilar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Indikator</label>
                        <div class="col-sm-12">
                            <input type="indikator" class="form-control  @error('indikator') is-invalid @enderror" id="indikator" name="indikator"
                                   placeholder="Masukan Indikator"
                                   value="" maxlength="50" required="" autocomplete="off">
                        </div>
                    </div>
                               @error('indikator')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Definisi</label>
                        <div class="col-sm-12">
                            <textarea type="definisi" class="form-control" id="definisi" name="definisi"
                                   placeholder="Masukan definisi"
                                   value="" required="" autocomplete="off"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>