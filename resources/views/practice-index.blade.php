Submit data

@if ($errors->any()) <!-- show any error validation -->
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('message')) <!-- show message response -->
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">
	{{Session::get('message') }}
</p>
@endif

<form method="post" action="{{url(route('store_data_practice'))}}">
	{{ csrf_field() }} <!-- csrf tokenizer form-security -->
	<input type="text" name="testName">
	<input type="text" name="testDescription">
	<input type="submit">
	
</form>