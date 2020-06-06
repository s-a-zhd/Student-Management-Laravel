@extends('Admin.sidebar')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">User List</h4>
            </div>
          
        </div>
        <form action="" method="">
        <div class="row filter-row">
           
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <label class="focus-label">User Name / Id </label>
                    <input type="text" class="form-control floating" name="search" id="search">
                </div>
            </div>
           
            <div class="col-sm-6 col-md-3">
               <button formaction="" class="btn btn-success btn-block">Search</button>
            </div>
        </div>
        </form>
    
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table">
                        <thead>
                            <tr>
                                <th style="min-width:100px;">ID</th>
                                
                                <th>ID</th>
                                <th>Name</th>
                                <th>Title</th>
                                
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach($list  as $user) 
                                
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->title }}</td>
                                <td>
                                <a href="{{$user->name}}" download="{{$user->name}}">
                                    <button type="button" class="btn btn-primary">
                                    <i class="glyphicon glyphicon-download">
                                        Download
                                    </i>
                                    </button>
                                </a>
                            </td>
                                  
                               
                            
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript">
    $('#search').on('keyup',function(){
    $value=$(this).val();
    console.log($value);
    $.ajax({
    type : 'get',
    url : '{{route('search')}}',
    data:{'search':$value},
    success:function(data){
      console.log(data);
    $('tbody').html(data);
    }
    });
    })
    </script>
    <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
    
    
@endsection