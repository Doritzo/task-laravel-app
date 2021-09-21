<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
<div class="navbar navbar-dark bg-dark">
        <div class="navbar-brand">Task-App</div>
</div><br>
    <div class="row container">

        <div class="col-md-6">
        <form action="{{ url('/task') }}" method="post">
        @csrf
        <label for="" class="form-label">title</label>
        <input name="title" type="text" class="form-control" placeholder="title-task" required autocomplete="off"><br>
        <label for="" class="form-label">description</label>
        <textarea name="description" class="form-control" id="" cols="30" rows="10" placeholder="description" required autocomplete="off"></textarea>
        <br><input type="submit" value="send" class="btn btn-primary">
        </form>
        </div>

        <div class="col-md-4">
        @foreach($tasks as $task)
        <ul class="list-group">
        <li class="list-group-item active" aria-current="true">Tasks</li>
        <li class="list-group-item">{{ $task->title }}</li>
        <li class="list-group-item">{{ $task->description}}</li>
        <li class="list-group-item">
        <form action="{{ route('task.destroy', $task->id )}}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" onclick="return confirm('are you sure delete this task?')">Delete</button>
       
       </form>
        </li>

       </ul>
        @endforeach

    </div>
</div>


</body>
</html>