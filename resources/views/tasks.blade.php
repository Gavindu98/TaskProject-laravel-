<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1>Daily Tasks</h1>
            <div class="row">
                <div class="col-md-12">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                    <form method="post" action="/saveTask">
                    {{csrf_field()}}
                    <input 
                        type="text" 
                        class="form-control" 
                        name="task"
                        placeholder="enter your task"></br></br>
                        <input 
                            type="submit"
                            class="btn btn-primary"
                            value="SAVE">
                        <input 
                            type="button"
                            class="btn btn-warning"
                            value="CLEAR">
                    </form>
                        <table class="table table-dark">
                            <th>Id</th>
                            <th>Task</th>
                            <th>Completed</th>
                            <th>Action</th>
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->id}}</td>
                                <td>{{$task->task}}</td>
                                <td>
                                @if($task->iscompleted)
                                <button class="btn btn-success">Completed</button>
                                @else
                                <button class="btn btn-warning">Not Completed</button>
                                @endif
                                </td>
                                <td>
                                @if(!$task->iscompleted)
                                
                                    <a href="/markascompleted/{{$task->id}}" class="btn btn-primary">Mark as completed</a>
                                @else
                                    <a href="/markasnotcompleted/{{$task->id}}" class="btn btn-danger">Mark as not completed</a>
                                @endif
                                    <a href="/delettask/{{$task->id}}" class="btn btn-secondary">Delete</a>
                                    <a href="/updatetask/{{$task->id}}" class="btn btn-secondary">Update</a>
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>