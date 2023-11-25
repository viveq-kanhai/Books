<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div x-data="{a:'alpine text'}">
        <h1>normal text</h1>
        <h1 x-text='a'></h1>
    </div>
    @foreach (['a', 'b'] as $item)
        <h1>{{$item}}</h1>
    @endforeach

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>
</html>
