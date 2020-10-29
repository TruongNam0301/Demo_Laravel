@extends('layout')
    @section('content')
        <style>
            body {
                color:black
            }
        </style>
        <body>
        <div class='container'>
        <h1></h1>
            <div class='swapper'>
                @if($action=='update')
                    <form action="{{ url('productsAdmin/update/')}}/{{$product->id}}" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                        <div class="preview">
                            <img src="{{asset('image/'.$product->image)}}" id = 'file-preview' width='200px' height='200px'>
                        </div>
                        <input type="file" name="img"  onchange="showPreview(event)"><br/>
                        <select name="types" id="types">
                            <option value="1">Tra sua</option>
                            <option value="2">Nuoc trai cay</option>
                        </select><br>
                        <label>Name Product:</label><br>
                        <input type ='text' name="nameProduct" value="{{$product->name}}" ><br>
                        <label>Price Product:</label><br>
                        <input type ='number' name="priceProduct" value="{{$product->price}}"><br>
                        <input type="submit" value="{{ $action ?? 'create' }}">
                    </form>
                @else
                    <form action="{{ url('productsAdmin/store')}}" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                        <div class="preview">
                        <img id = 'file-preview' width='200px' height='200px'>
                        </div>
                        <input type="file" name="img"  onchange="showPreview(event)"><br/>
                        <select name="types" id="types">
                            <option value="1">Tra sua</option>
                            <option value="2">Nuoc trai cay</option>
                        </select><br>
                        <label>Name Product:</label><br>
                        <input type ='text' name="nameProduct" ><br>
                        <label>Price Product:</label><br>
                        <input type ='number' name="priceProduct" "><br>
                        <input type="submit" value="create">
                    </form>
                @endif
            <div>
            
            <script>
                function showPreview(event){
                    if(event.target.files.length > 0){
                        var src = URL.createObjectURL(event.target.files[0]);
                        var preview = document.getElementById("file-preview");
                        preview.src = src;
                        preview.style.display = "block";
                    }
                }
            </script>
        </body>
@stop