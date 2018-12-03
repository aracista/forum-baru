@extends('layouts.main')

@section('content')
<div class="row">
	<div class="col-md-8">
		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">No</th>
		      <th scope="col">Nama</th>
		      <th scope="col">Dibuat pada tanggal</th>
		      <th scope="col">Diubah pada tanggal</th>
		      <th scope="col"></th>
		      <th scope="col"></th>

		    </tr>
		  </thead>
		  <tbody>
		  	@php $no = 0; @endphp
			@foreach($tags as $tag)
			@php $no++; @endphp	
		    <tr>
		      <th scope="row">{{$no}}</th>
		      <td>{{$tag->nama}}</td>
		      <td>{{date('j F Y',strtotime($tag->created_at))}}</td>
		      <td>{{date('j F Y',strtotime($tag->updated_at))}}</td>
		      <td><a href="{{route('tag.edit',$tag->id)}}" class="btn btn-success btn-sm">Edit</a></td>
		      <td>
		      <form action="{{route('tag.destroy',$tag->id)}}" method="post">
		      	@method('DELETE')
		      	@csrf
		      	<input type="submit" value="Hapus" class="btn btn-danger btn-sm">
		      </form>
			  </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
	</div>
	<div class="col-md-4"> 
		<form action="{{route('tag.store')}}" method="post">
				@csrf
			<div class="form-group">
				<label for="nama">Buat Tag Baru :</label>
				<input  type="text" name="nama" value="" id="nama" class="form-control">
			</div>
			<div class="form-group">
				<input  class="btn btn-primary" type="submit" name="submit" value="tambah">
			</div>
		</form>
	</div>
</div>

	

@stop