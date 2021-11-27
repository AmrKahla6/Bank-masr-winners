<!DOCTYPE html>
<html>
<head>
    <title>Choose Winner</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
     {{--noty--}}
     <link rel="stylesheet" href="{{ asset('noty/noty.css') }}">
     <script src="{{ asset('noty/noty.min.js') }}"></script>
     <script src="{{ asset('jquary.js') }}"></script>

</head>
<body>


<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Choose Winner
        </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
                {{-- <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a> --}}
            </form>
        </div>
    </div>
    <div class="mt-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <center>
            <h3>Winner</h3>
        </center>
        <form action="{{route('winners')}}" method="POST">
            @csrf
            <input type="hidden" name="user_id">
            <button class="btn btn-info">Winner</button>
            <a class="btn btn-warning" href="{{ route('exportWinner') }}">Export Winners</a>
        </form>
            @include('_session')

            @if ($lastwinner)
                <div class="alert alert-primary mt-3 text-center" role="alert">
                    <span>Winner is "{{$lastwinner->user->name}}"</span>
                </div>
            @endif

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Winner Name</th>
                    </tr>
                </thead>
                @foreach ($winners as $index=>$winner)
                    <tbody>
                        <tr>
                            <th scope="row">{{$index +1}}</th>
                            <td>{{$winner->winner_name}}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>

    </div>
</div>

</body>
</html>
