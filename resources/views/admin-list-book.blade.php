<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Admin</title>

<style>
table, td, th {
  border: 1px solid black;
}

table {
  width: 100%;
  border-collapse: collapse;
}
</style>
</head>
<body>
<div align="center">
	<table>
		<tr>
			<td colspan="8" align="center">ADMINISTRATOR - SISTEM PEMINJAMAN BUKU</td>
		</tr>
		<tr>
			<td colspan="8" align="center">LIST OF BOOK</td>
		</tr>
		@if(Session::has('message'))
		<tr>
			<td colspan="8" align="center">
				<p class="alert {{ Session::get('alert-class', 'alert-info') }}">
					{{Session::get('message')}}
				</p>
			</td>
		</tr>
		@endif
		<tr>
			<td colspan="8" align="right">
				<a href="{{route('admin_add_book')}}">
					<b>Add New Book</b>
				</a>
				|
				<a href="">
					<b>Manage Status</b>
				</a>
			</td>
		</tr>
		<tr style=" font-weight: bold;background-color:aqua;">
			<td>Judul</td>
			<td>Deskripsi</td>
			<td>Stock</td>
			<td>Category</td>
			<td>Pengarang</td>
			<td>Status</td>
			<td>Date Updated</td>
			<td>Action</td>
		</tr>
		<!-- 
		<tr>
			<td>my title book</td>
			<td>my description</td>
			<td align="center">5</td>
			<td>learning</td>
			<td>my author</td>
			<td>available</td>
		</tr>
		 -->
		 @foreach ($getBookData as $book)
		 <tr>
			<td>{{$book->title}}</td>
			<td>{{$book->description}}</td>
			<td align="center">{{$book->stock}}</td>
			<td>{{$book->category}}</td>
			<td>{{$book->author}}</td>
			<td>{{$book->status}}</td>
			<td>{{$book->updated_at}}</td>
			<td>
				<a href="{{url(route('admin_update_book',$book->id))}}">
					Update
				</a>
				|
				<a href="{{url(route('admin_save_delete_book',$book->id))}}">
					Delete
				</a>
			</td>
		</tr>
		@endforeach
		<tr>
			<td colspan="8">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="8" align="center">
				Build using Laravel v{{ Illuminate\Foundation\Application::VERSION }}(PHP v{{ PHP_VERSION }})
			</td>
		</tr>
		
	</table>
	</div>
</body>
</html>