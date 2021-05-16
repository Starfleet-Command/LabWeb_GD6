<!DOCTYPE html>

<html>

<head>

    <title>URL Shortener</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />

</head>
<body>


<div class="container">


    <div class="card">
      <div class="card-header">
        <form method="POST" action="{{ route('generate.link.post') }}">

            @csrf

            <div class="input-group mb-3">

              <input type="text" name="link" class="form-control" placeholder="Enter URL" aria-label="Recipient's username" aria-describedby="basic-addon2">

              <div class="input-group-append">

                <button class="btn btn-success" type="submit">Generate Link</button>
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

   

            <table class="table table-bordered table-sm">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Short Link</th>

                        <th>Link</th>

                        <th>Times Visited (Total)</th>

                        <th>Times Visited (24 h)</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($shortLinks as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td><a href="{{ route('shorten.link', $row->code) }}" target="_blank">{{ route('shorten.link', $row->code) }}</a></td>
                            <td>{{ $row->link }}</td>
                            <td>{{visits($row)->count()}} </td>
                            <td>{{visits($row)->period('day')->count()}} </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>
      </div>
    </div>
</div>

</body>

</html>