<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>新しい本</title>
	<link href="{{ asset('/css/createnewbook.css') }}" rel="stylesheet">
</head>
<body>
<form action = "/MyBook/insert" method = "post" enctype="multipart/form-data">
	  <table>
		@csrf
			<tr><th>タイトル</th><td><input type = "text" name = "name" value ="{{old('name')}}"></td></tr>
			@error('name')
			<p class = "err">{{$message}}</p>
			@enderror
			<tr><th>著者</th><td><input type ="textarea" name = "author" value ="{{old('author')}}"></td></tr>
			@error('author')
			<p class = "err">{{$message}}</p>
			@enderror
			<tr><th>あらすじ</th><td><input type ="textarea" name = "synopsis" value ="{{old('synopsis')}}"></td></tr>
			
			@error('synopsis')
			<p class = "err">{{$message}}</p>
			@enderror
			<tr><th>感想</th><td><input type ="textarea" name = "impressions" value ="{{old('impressions')}}"></td></tr>
			
			@error('impressions')
			<p class = "err">{{$message}}</p>
			@enderror
			<tr><th>表紙</th><input  type="file" name="image"><tr>
			
			@error('image')
			<p class = "err">{{$message}}</p>
			@enderror
			<tr><th></th><td><input type = "submit" value="CREATE"> </td></tr>
	</table>
</form>
</body>
</html>
