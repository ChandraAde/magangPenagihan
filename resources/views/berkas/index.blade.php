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

    <!-- <a href="{{ route('berkas.create')}}"><button type="button" class="btn btn-info btn-danger"><b>Tambah Berkas Wajib Pajak</b> <span class="fa fa-plus"></span></button></a> -->


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
        <h4 class="card-title">Berkas Wajib Pajak</h4>

        <div class="table-responsive">

         <table class="table table-striped" id="table">
           <thead>
            <tr>
              <th>
                NPWP
              </th> 
              <th>
                Jenis Dokumen
              </th>
              <th>
                Nomor Ketetapan
              </th>
              <th>
                Nomor Dokumen
              </th>
              <th>
                Nama File
              </th>
              <th>
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $v)
            <td>
              {{$v->wp->NPWP}}
            </td>
            <td>
              {{$v->jenis_dok}}
            </td>
            <td>
              {{$v->nomor_ketetapan}}
            </td>
            <td>
              {{$v->no_dok}}
            </td>
            <td>
              {{$v->tittle}}
            </td>
            <td>
              <div class="btn-group dropdown">
                <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action
                </button>
                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                  <a class="dropdown-item" href="{{ route('downloadfile',$v->id )}}">Download </a>
                  <form action="{{ route('berkas.destroy', $v->id) }}" class="pull-left"  method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                    </button>
                  </form>

                </div>
              </div>
            </td>
          </tbody>
          @endforeach
        </table>

      </div>

    </div>
  </div>
</div>
</div>
@endsection