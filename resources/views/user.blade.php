
@extends('layouts.app')

@section('content')

</style>

<div class="container-flude">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header"> 
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>

                      <th scope="col">Stard Date</th>
                      <th scope="col">Value</th>
                      <th scope="col">Currency</th>
                      <th scope="col">Value In USD</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($blogs as $key=>$blog)
                    <tr>
                      <th scope="row">{{$key+1}}</th>
                      <td>{{$blog['name']}}</td>
                      <td>{{$blog['p_date']}}</td>
                      <td>{{$blog['p_amount']}}</td>
                      <td>{{$blog['currency']}}</td>
                      <td>{{$blog['in_amount']}}</td>
                   
                    </tr>
               @endforeach
                  </tbody>
                </table>


                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 

@endsection
