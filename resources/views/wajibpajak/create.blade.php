@section('js')

<script type="text/javascript">

    $(document).ready(function() {
        $(".users").select2();
    });

</script>
@stop

@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('wajibpajak.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
          <div class="row flex-grow">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Wajib Pajak</h4>

                  <div class="form-group">
                    <label for="nama" class="col-md-4 control-label">NPWP</label>
                    <div class="col-md-6">
                        <input id="NPWP" type="text" maxlength="9" class="form-control" name="NPWP" required maxlenght="9"  value="{{ old('NPWP') }}"  >
                        @if ($errors->has('NPWP'))
                        <span class="help-block">
                            <strong>{{ $errors->first('NPWP') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="Nama" class="col-md-4 control-label">Nama</label>
                    <div class="col-md-6">
                        <input id="npm" type="text" class="form-control" name="Nama"   required>
                        @if ($errors->has('Nama'))
                        <span class="help-block">
                            <strong>{{ $errors->first('Nama') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="Lemari" class="col-md-4 control-label">Lemari</label>
                    <div class="col-md-6">

                      <select class="form-control" name="Lemari" required="">
                        <option value="">Pilih Lemari</option>
                        <option value="A">A</option>
                        <option value="B1">B1</option>
                        <option value="B2">B2</option>
                        <option value="C1">C1</option>
                        <option value="C2">C2</option>
                        <option value="D">D</option>
                        <option value="E">E</option>                   
                    </select>
                    @if ($errors->has('Lemari'))
                    <span class="help-block">
                        <strong>{{ $errors->first('Lemari') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="prodi" class="col-md-4 control-label">Nomor Urut</label>
                <div class="col-md-6">
                    <select class="form-control" name="No_urut" required="">
                        <option value="">Pilih Rak</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>


            <button type="submit" class="btn btn-primary" id="submit">
                Submit
            </button>
            <button type="reset" class="btn btn-danger">
                Reset
            </button>
            <a href="{{route('wajibpajak.index')}}" class="btn btn-primary pull-right">Back</a>
        </div>
    </div>
</div>
</div>
</div>

</div>
</form>
@endsection