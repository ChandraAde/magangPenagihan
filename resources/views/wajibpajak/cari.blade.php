@foreach($data as $a)
@if( $kos === "Data Tidak Ada")
<h3>Tidak Ditemukan}</h3>

@elseif($kos === "Data Ada")


<h3 style="text-align: center;">
	Arsip dari <b>{{$a->Nama}}</b> dengan NPWP <b>{{$a->NPWP}}</b> berada di Lemari
	<b>{{$a->Lemari}}</b> Pada Rak <b>{{$a->No_urut}}</b>
</h3>
<br>
@if($a->Lemari ==="A")
<img class="mx-auto d-block border rounded-sm" src="{{asset('images/denah/A.png')}}" width="350" height="250">
@elseif($a->Lemari ==="B1")
<img class="mx-auto d-block border rounded-sm" src="{{asset('images/denah/B1.png')}}" width="350" height="250">
@elseif($a->Lemari ==="B2")
<img class="mx-auto d-block border rounded-sm" src="{{asset('images/denah/B2.png')}}" width="350" height="250">
@elseif($a->Lemari ==="C1")
<img class="mx-auto d-block border rounded-sm" src="{{asset('images/denah/C1.png')}}" width="350" height="250">
@elseif($a->Lemari ==="C2")
<img class="mx-auto d-block border rounded-sm" src="{{asset('images/denah/C2.png')}}" width="350" height="250">
@elseif($a->Lemari ==="D")
<img class="mx-auto d-block border rounded-sm" src="{{asset('images/denah/D.png')}}" width="350" height="250">
@elseif($a->Lemari ==="E")
<img class="mx-auto d-block border rounded-sm" src="{{asset('images/denah/E.png')}}" width="350" height="250">

@endif
@endif
@endforeach
