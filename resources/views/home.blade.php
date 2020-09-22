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
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-book text-success icon-lg"></i>
              </div>
              <div class="float-right">
                  <p class="mb-0 text-right">Berkas</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right">{{$file->count()}}</h3>
                </div>
            </div>
        </div>
        <p class="text-muted mt-3 mb-0">
            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total seluruh Berkas
        </p>
    </div>
</div>
</div>
<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
  <div class="card card-statistics">
    <div class="card-body">
      <div class="clearfix">
        <div class="float-left">
          <i class="mdi mdi-account text-primary icon-lg"></i>
      </div>
      <div class="float-right">
          <p class="mb-0 text-right">Wajib Pajak</p>
          <div class="fluid-container">
            <h3 class="font-weight-medium text-right mb-0">{{$data->count()}}</h3>
        </div>
    </div>
</div>
<p class="text-muted mt-3 mb-0">
    <i class="mdi mdi-account mr-1" aria-hidden="true"></i> Jumlah Wajib Pajak
</div>
</div>
</div>

<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
  <div class="card card-statistics">
    <div class="card-body">
      <div class="clearfix">
        <div class="float-left">
          <i class="mdi mdi-account-location text-info icon-lg"></i>
      </div>
      <div class="float-right">
          <p class="mb-0 text-right">User</p>
          <div class="fluid-container">
            <h3 class="font-weight-medium text-right mb-0">{{$user->count()}}</h3>
        </div>
    </div>
</div>
<p class="text-muted mt-3 mb-0">
    <i class="mdi mdi-account mr-1" aria-hidden="true"></i> Total Admin
</p>
</div>
</div>
</div>
</div>
<div class="row" >
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
                
            </tr>
        </thead>
        <tbody>

            <tr>
             
                  <a href=""> 
                   @foreach($data as $v)
               </a>
                     <td>

            {{$v->NPWP}}

           </td><td>

            {{$v->Nama}}

           </td>

           <td>
            <!--  -->
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
