@extends('layout')
    @section('content')
        <style>
            body {
                color:black;
                background-color:#DFE0E2;
               
            }
            .container{
                height:100%;
                display:flex;
                flex-direction:row; 
                align-items: center;
                justify-content: center;
            }
            label {
                margin-top :10px;
                margin-bottom :0
            }
            input[type=submit]{
                margin-top:15px;
                height:50px;
                width:70px;
            }
            .swapper{
                background-color:white;
                width:400px;
                box-shadow: 0px 0px 32px 0px rgba(0,0,0,0.75);
            }
            form{
                padding:20px 0;
                margin-left:50px;
                
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
                        <label>Chọn Loại Sản Phẩm</label><br>
                        <select name="types" id="types">
                            @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select><br>
                        <label>Nhập Tên Sản Phẩm</label><br>
                        <input type ='text' name="nameProduct" value="{{$product->name}}" ><br>
                        <label>Nhập Giá Sản Phẩm:</label><br>
                        <input type ='number' name="priceProduct" value="{{$product->price}}"><br>
                        <input class='btn btn-success' type="submit" value="{{ $action ?? 'create' }}">
                    </form>
                @else
                    <form action="{{ url('productsAdmin/store')}}" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                        <div class="preview">
                        <img id = 'file-preview' width='200px' height='200px'>
                        </div>
                        <input type="file" name="img"  onchange="showPreview(event)"><br/>
                        <label>Chọn Loại Sản Phẩm</label><br>
                        <select name="types" id="types">
                            @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select><br>
                        <label>Nhập Tên Sản Phẩm</label><br>
                        <input type ='text' name="nameProduct" ><br>
                        <label>Nhập Giá Sản Phẩm</label><br>
                        <input type ='number' name="priceProduct" "><br>
                        <input class='btn btn-success' type="submit" value="create">
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