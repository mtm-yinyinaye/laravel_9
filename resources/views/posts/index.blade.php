<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container ">
        <h1>Post List</h1>
        <select name="select">
            @foreach($selectes as $selecte)
            <option 
                value="{{ $selecte['id'] }}" 
                @selected(([ true, old('select')]) == $selecte['selected'])
            >
                {{ $selecte['name'] }}
            </option>
            @endforeach
        </select>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>
                        <!-- <input 
                        type="checkbox" 
                        name="active"
                        value="{{ $post->active }}"
                        {{ ($post->active == 1 ? ' checked' : '') }}> -->
                        <input 
                            type="checkbox" 
                            name="active" 
                            value="{{ $post->active }}" 
                            @checked(old('active', $post->active))
                        >
                    </td>
                    <td>{{ $post->id}}</td>
                    <td>{{ $post->name}}</td>
                    <td>{{ $post->amount}}</td>
                    <td>{{ $post->description}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $posts->links() !!}
        </div>
    </div>
</body>

</html>