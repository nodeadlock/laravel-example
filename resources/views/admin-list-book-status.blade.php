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
			<td colspan="8" align="center">LIST OF STATUS</td>
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
				<a href="{{route('admin_add_book_status')}}">
					<b>Add New Status</b>
				</a>
				|
				<a href="{{route('admin_list_book')}}">
					<b>Manage Book</b>
				</a>
			</td>
		</tr>
		<tr style=" font-weight: bold;background-color:aqua;">
			<td>Status</td>
			<td>Date Updated</td>
			<td>Action</td>
		</tr>
		 @foreach ($getStatusData as $status)
		 <tr>
			<td>{{$status->status}}</td>
			<td>{{$status->updated_at}}</td>
			<td>
				<a href="{{url(route('admin_update_book_status',$status->id))}}">
					Update
				</a>
				|
				<a href="{{url(route('admin_save_delete_book_status',$status->id))}}">
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
