<!DOCTYPE html>  
<html>  
<head>  
    <title> URL shortener </title>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />  
</head>  
<body>  
     
<div class="container">  
    <h1>Build Shortner link </h1>  
     
    <div class="card" style="width: 50rem;">  
      <div class="card-header">  
        <form method="POST" action="{{ route('generate.link') }}">  
            @csrf  
            <div class="input-group mb-3">  
              <input type="text" name="link" class="form-control" placeholder="Please enter URL" aria-label="Recipient's username" aria-describedby="basic-addon2">  
              <div class="input-group-append">  
                <button class="btn btn-primary" type="submit">Click me</button>  
              </div>  
            </div>  
        </form>  
      </div>  
      <div class="card-body">  
     
            @if (Session::has('success'))  
                <div class="alert alert-success">  
                    <p>{{ Session::get('success') }}</p>  
                </div>  
            @endif  
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
     
            <table class="table table-bordered table-sm">  
                <thead>  
                    <tr>  
                        <th>Given Link</th>  
                        <th>Short Link</th>  
                    </tr>  
                </thead>  
                <tbody>  
                    @foreach($shortLinks as $row)  
                        <tr>  
                            <td>{{ $row->link }}</td>   
                            <td><a href="{{ route('shorten.link', $row->code) }}" target="_blank">{{ route('shorten.link', $row->code) }}</a></td>  
                        </tr>  
                    @endforeach  
                </tbody>  
            </table>  
      </div>  
    </div>  
     
</div>  
      
</body>  
</html>  