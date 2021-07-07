<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Admin - Update Book</title>


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
			<td colspan="2" align="center">UPDATE BOOK</td>
		</tr>
		
		<tr>
			<td colspan="2" align="right">
				<a href="{{url('admin/admin_list_book')}}"> 
					List of Book
				</a>
				|
				<a href=""> 
					Manage Status
				</a>
			</td>
		</tr>
		<!-- submit form here -->
		<form method="post" action="{{url(route('admin_save_update_book'))}}">
			{{ csrf_field() }} <!-- csrf tokenizer form-security -->
			
		<tr>
			<td>Title</td>
			<td><input type="text" name="bookTitle" value="{{$getBookDataById->title}}"></td>
		</tr>

		<tr>
			<td>Description</td>
			<td><textarea name="bookDescription">{{$getBookDataById->description}}</textarea></td>
		</tr>
		
		<tr>
			<td>Stock</td>
			<td><input type="text" name="bookStock" value="{{$getBookDataById->stock}}"></td>
		</tr>
		
		<tr>
			<td>Category</td>
			<td><input type="text" name="bookCategory" value="{{$getBookDataById->category}}"></td>
		</tr>
		
		<tr>
			<td>Author</td>
			<td><input type="text" name="bookAuthor" value="{{$getBookDataById->author}}"></td>
		</tr>
		
		<tr>
			<td>Status</td>
			<td><input type="text" name="bookStatus" value="{{$getBookDataById->status}}"></td>
		</tr>
		
		<tr>
			<td>Last Updated</td>
			<td>{{$getBookDataById->updated_at}}</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
			<input type="hidden" name="bookId" value="{{$getBookDataById->id}}">
			<input type="submit" value="SAVE" style="width: 40%">
			</td>
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
