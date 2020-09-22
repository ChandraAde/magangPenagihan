@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 25
    });

  } );
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">

  <div class="col">
    <form action="/cari" method="GET" id="myform" data-target="#myModal">
      {{ csrf_field() }}
      <div class="col-md-8">
        <div class="input-group">
          <input name="txt_npwp" id="txt_npwp" type="text" class="form-control" minlength="9" maxlength="9" required>
          <span class="input-group-btn">
            <button type="submit" class="btn btn-info btn-secondary" value="{{ old('NPWP') }}" ><b>Cari Berkas</b> <span class="fa fa-search"></span></button>
            @if ($errors->has('txt_npwp'))
            <span class="help-block">
              <strong>{{ $errors->first('txt_npwp') }}</strong>
            </span>
            @endif
          </span>
          <span class="input-group-btn">
            <a href="{{ route('wajibpajak.create')}}"><button type="button" class="btn btn-info btn-danger"><b>Tambah Wajib Pajak</b> <span class="fa fa-plus"></span></button></a>
          </span>
        </div>
        @if ($errors->has('buku_id'))
        <span class="help-block">
          <strong>{{ $errors->first('buku_id') }}</strong>
        </span>
        @endif

      </div>


    </form>

  </div>
  <div class="col-lg-12">
    @if (Session::has('message'))
    <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
    @endif
  </div>
</div>
<div class="row" style="margin-top: 20px;">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">

      <div class="card-body">
        <h4 class="card-title">Data Wajib Pajak</h4>

        <div class="table-responsive">
          <table class="table table-striped" id="table">
           <thead>
            <tr>
              <th>
                NPWP
              </th> 
              <th>
                Nama
              </th>
              <th>
                Lemari
              </th>
              <th>
                Nomor Urut
              </th>


              <th>
                Action
              </th>
            </tr>
          </thead>
          <tbody>

            <tr> @foreach($data as $v)
              <td class="py-1">
                <a href=""> 
                  {{$v->NPWP}}
                </a>
              </td>
              <td>
                {{$v->Nama}}
              </td>

              <td>
                @if($v-> Lemari === "B1")
                <label class="badge badge-success"> {{$v->Lemari}}</label>
                @elseif($v-> Lemari === "B2")
                <label class="badge badge-warning"> {{$v->Lemari}}</label>
                @elseif($v-> Lemari === "C1")
                <label class="badge badge-danger"> {{$v->Lemari}}</label>
                @elseif($v-> Lemari === "C2")
                <label class="badge badge-info"> {{$v->Lemari}}</label>
                @elseif($v-> Lemari === "E")
                <label class="badge badge-dark"> {{$v->Lemari}}</label>
                @elseif($v-> Lemari === "D")
                <label class="badge badge-secondary"> {{$v->Lemari}}</label>
                @elseif($v-> Lemari === "A")
                <label class="badge badge-primary"> {{$v->Lemari}}</label>
                @endif
              </td>
              <td>
                <label class="badge badge-primary"> {{$v->No_urut}}</label>
              </td>

              <td>
               <div class="btn-group dropdown">
                <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action
                </button>
                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                  <a class="dropdown-item" href="{{route('wajibpajak.edit',$v->id)}}"> Edit </a>
                  <form action="{{ route('wajibpajak.destroy', $v->id) }}" class="pull-left"  method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                    </button>
                  </form>

                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
</div>
</div>
<!-- The Modal -->
@include('layouts.modal')

@endsection