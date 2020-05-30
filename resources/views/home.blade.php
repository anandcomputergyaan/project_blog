@extends('layouts.app')

@section('content')

<style type="text/css">
  .col-12{
    margin-top:2% !important;
  }



</style>
        <div style="width: 50%; margin: auto;">
              {!! Form::open(['url' =>'postsave', 'method' => 'get','id'=>'idnewpost']);!!}
            <div class="row form-group">

               <div class="col-12">
                 
                 {!! Form::text('name','', array('class'=>'form-control inputfiled','required'=>'true','placeholder'=>'Project Name',)) !!}
           </div>
               <div class=" col-12">
                 
                 {!! Form::date('p_date','', array('class'=>'form-control inputfiled','required'=>'true','placeholder'=>'Future Date ',)) !!}
           </div>
               <div class=" col-12">
                 
                 {!! Form::number('p_amount','', array('class'=>'form-control inputfiled','required'=>'true','placeholder'=>'Ammount of Project','id'=>'p_amount')) !!}
           </div>
                 <div class=" col-12">    
                          {!! Form::select('currency',['USD'=>'USD','EUR'=>'EUR','YEN'=>'YEN','GBP'=>'GBP'],'null', array('class'=>'form-control inputfiled','autocomplete'=>'off','placeholder'=>'Select Currency ', 'id'=>'currency','required'=>'true'))!!}
               </div>

               <div class=" col-12">
                 
                 {!! Form::text('in_amount','', array('class'=>'form-control inputfiled','required'=>'true','placeholder'=>'in_amount','id'=>'in_amount')) !!}
           </div>
    
                 <div class=" col-12">
                   <input type="button" onclick="resetFunction()" value="Reset form" class="btn btn-primary"> 
                    
                      <input type="submit" name="submit"  class="btn btn-primary" style="float: right;" >
                 </div>

              </div>
             
        
                  {!! Form::close(); !!}
        </div>
           


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

    <script type="text/javascript">

  $(document).ready(function(){


 $('#currency').change(function(){
  var currency_type=$(this).val();
  var amount=$('#p_amount').val();
 alert(currency_type+amount);

/*
    $.get("http://data.fixer.io/api/convert",{access_key:'b8471cfff53514e9967d46e2f8a87a80',from:currency_type,to:'USD',amount:amount}, function(data, status){
     alert(data);   
    });*/

/*"success":false,"error":{"code":105,"type":"function_access_restricted","info":"Access Restricted - Your current Subscription Plan does not support this API Function.*/

    
    $('#in_amount').val(amount);
 });


   var frm = $('#idnewpost');

   frm.submit(function (e) {

       e.preventDefault();

       $.ajax({
           type: frm.attr('method'),
           url: frm.attr('action'),
           data: frm.serialize(),
           complete: function(){
           },
           success: function (data) {

               $('table tbody').html();
               var ttd='';
               var sr=1;

                $.each(data, function(index, value) {
                        sr=sr+index;
                      ttd+='<tr><td>'+sr+'</td><td>'+value.name+'</td><td>'+value.p_date+'</td><td>'+value.p_amount+' </td><td>'+value.currency+' </td><td>'+value.in_amount+' </td></tr>';
                 });
                  $('table tbody').html(ttd);

           },
           error: function (data) {
               console.log('An error occurred.');
               console.log(data);
           },
       });
   });


 });

  function resetFunction(){
    document.getElementById("idnewpost").reset();
  }

</script>

@endsection
