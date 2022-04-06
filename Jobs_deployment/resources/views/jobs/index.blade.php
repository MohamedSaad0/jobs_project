<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script  script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <a class="btn btn-primary mt-2" href="/jobs/create"> Add New Job</a>
        </div>
        <table class="table container table-dark table-striped  mt-2">
            <thead>
                <tr>
                    <th scope="col">Job ID</th>
                    <th scope="col">Job Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $data)
                <tr>
                    <th scope="row">{{$data->id}}</th>
                    <td> {{$data->JobName}}</td>
                    <td>{{$data->Description}}</td>
                    <form action="/jobs/{{$data->id}}" method="post">
                        <td>
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" name="delete" value="Delete">
                        </td>
                    </form>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </body>
</html>
