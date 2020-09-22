@section('js')

<script type="text/javascript">

    $(document).ready(function() {
        $(".users").select2();
    });

</script>
@stop

@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('berkas.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
          <div class="row flex-grow">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah berkas wajib pajak</h4>

                  <div class="form-group">
                    <label for="nama" class="col-md-4 control-label">NPWP</label>
                    <div class="col-md-6">
                       <select class="form-control users" id="id_wp" name="id_wp" required="">
                        <option value="">Pilih NPWP</option>
                        @foreach($data2 as $v)
                        <option value="{{$v->id}}">{{$v->NPWP}} | {{$v->Nama}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('NPWP'))
                    <span class="help-block">
                        <strong>{{ $errors->first('NPWP') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_dok" class="col-md-4 control-label">Jenis Dokumen</label>
                <div class="col-md-6">
                    <select class="form-control users" id="jenis_dok" name="jenis_dok" required="">
                        <option value="">Pilih Dokumen</option>
                        <option value="STP">Surat tagihan pajak</option>
                        <option value="Surat Teguran">Surat Teguran</option>
                        <option value="Surat Paksa">Surat Paksa</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    @if ($errors->has('jenis_dok'))
                    <span class="help-block">
                        <strong>{{ $errors->first('jenis_dok') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="Lemari" class="col-md-4 control-label">Nomor Ketetapan</label>
                <div class="col-md-6">

                  <input type="text" class="form-control" name="nomor_ketetapan">
                  @if ($errors->has('Nomor_ketetapan'))
                  <span class="help-block">
                    <strong>{{ $errors->first('Nomor_ketetapan') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="no_dok" class="col-md-4 control-label">Nomor Dokumen</label>
            <div class="col-md-6">

              <input type="text" class="form-control" name="no_dok">
              @if ($errors->has('no_dok'))
              <span class="help-block">
                <strong>{{ $errors->first('no_dok') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group {{ !$errors->has('file') ?: 'has-error' }}">
        <label class = "col-md-4 control-label" >File</label>
        <div class="col-md-6">
              <input type="hidden" name="title" class="form-control">
            <input type="file" name="file" class="form-control">
            <span class="help-block text-danger">{{ $errors->first('file') }}</span>
        </div>
    </div>

    <button type="submit" class="btn btn-primary" id="submit">
        Submit
    </button>
    <button type="reset" class="btn btn-danger">
        Reset
    </button>
    <a href="{{route('berkas.index')}}" class="btn btn-primary pull-right">Back</a>
</div>
</div>
</div>
</div>
</div>

</div>
</form>
@endsection