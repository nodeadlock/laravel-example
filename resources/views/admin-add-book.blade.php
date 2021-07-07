<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Admin - Add Book</title>


<style>
table, td, th {
  border: 1px solid black;
}

table {
  width: 40%;
  border-collapse: collapse;
}
</style>

</head>
<body>
<div align="center">
	<table>
		<tr>
			<td colspan="2" align="center">ADMINISTRATOR - SISTEM PEMINJAMAN BUKU</td>
		</tr>
		<tr>
			<td colspan="2" align="center">ADD NEW BOOK</td>
		</tr>
		
		<tr>
			<td colspan="2" align="right">
				<a href="{{url('admin/admin_list_book')}}"> 
					<b>List of Book</b>
				</a>
				|
				<a href=""> 
					<b>Manage Status</b>
				</a>
			</td>
		</tr>
		<!-- submit form here -->
		<form method="post" action="{{url(route('admin_save_book'))}}">
			{{ csrf_field() }}
			<!-- csrf tokenizer form-security -->
		
		
		<tr>
			<td>Title</td>
			<td><input type="text" name="bookTitle"></td>
		</tr>

		<tr>
			<td>Description</td>
			<td><textarea name="bookDescription"></textarea></td>
		</tr>
		
		<tr>
			<td>Stock</td>
			<td><input type="text" name="bookStock"></td>
		</tr>
		
		<tr>
			<td>Category</td>
			<td><input type="text" name="bookCategory"></td>
		</tr>
		
		<tr>
			<td>Author</td>
			<td><input type="text" name="bookAuthor"></td>
		</tr>
		
		<tr>
			<td>Status</td>
			<td><input type="text" name="bookStatus"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" value="SAVE" style="width: 40%"></td>
		</tr>

		</form>
		
		
		@if(Session::has('message')) <!-- show message response -->
		<tr>
			<td colspan="2" align="center">
				<p class="alert {{ Session::get('alert-class', 'alert-info') }}">
					{{Session::get('message') }}
				</p>
			</td>
		</tr>
		@endif
		
		@if ($errors->any()) <!-- show any error validation -->
		<tr>
			<td style="color: red;" colspan="2">
		        <b>Required Fields</b>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
			</td>
		</tr>
		@endif

		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
			Build using Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP
				v{{ PHP_VERSION }})
			</td>
		</tr>
	</table>
</div>

</body>
</html>
