<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
</head>
<body>
    <h1>To-Do List</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form method="post" action="{{ route('tasks.store') }}">
        @csrf
        <input type="text" name="title" placeholder="Enter task title">
        <button type="submit">Add Task</button>
    </form>

    <ul>
        @foreach($tasks as $task)
            <li>
                <a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a>
                <form method="post" action="{{ route('tasks.destroy', $task->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
