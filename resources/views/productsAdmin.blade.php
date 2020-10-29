@extends('layout')
  @section('content')   
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr> 
                <th>Image</th>
                <th>Name</th>
                <th>Type</th>
                <th>Price</th>
                <th>Button</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
                <tr>
                  <td data-id={{ $product->id }}>
                      <img src="{{asset('image/'.$product->image)}}" alt="hinh1" width="100" height="100">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->types->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                      <a href="{{url('productsAdmin/edit/'.$product->id)}}" class= 'btn btn-success'>Edit</a>
                      <a href="{{url('productsAdmin/destroy/'.$product->id)}}" class= 'btn btn-danger'>Delete</a>
                      <a href="{{url('productsAdmin/'.$product->id)}}" class= 'btn btn'>View</a>
                  </td>
                </tr>
               @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  @stop