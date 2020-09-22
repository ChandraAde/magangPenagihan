@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

  } );
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">

  <div class="col">
   <a href="{{ route('user.create')}}"><button type="button" class="btn btn-info btn-danger"><b>Tambah User Admin</b> <span class="fa fa-plus"></span></button></a>
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
        <h4 class="card-title">Data User</h4>

        <div class="table-responsive">
          <table class="table table-striped" id="table">
           <thead>
            <tr>
              <th>
                User ID
              </th>
               <th>
                Nama
              </th> 
              <th>
                Username
              </th>
              <th>
              Email
              </th>
              <th>
                Action
              </th>
            </tr>
          </thead>
          <tbody>

            <tr> @foreach($data as $v)
              <td>
                <a> 
                  {{$v->user_id}}
                </a>
              </td>
              <td class="py-1">
                
                <a href=""> 
                  {{$v->name}}
                </a>
              </td>
              <td>
                {{$v->username}}
              </td>

              <td>
                {{$v->email}}
              </td>
              <td>
               <div class="btn-group dropdown">
                <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action
                </button>
                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                  <!-- <a class="dropdown-item" href="{{route('user.edit',$v->id)}}"> Edit </a> -->
                  <form action="{{ route('user.destroy', $v->id) }}" class="pull-left"  method="post">
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
@endsection