<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Task Manager</title>

    <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: Arial, sans-serif;
        background: #f2f2f2;
        color: #111;
    }

    .header {
        background: #111;
        color: white;
        padding: 25px 50px;
        border-bottom: 5px solid #16a34a;
    }

    .header h1 {
        font-size: 28px;
    }

    .header p {
        margin-top: 5px;
        color: #ccc;
    }

    .container {
        max-width: 1100px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .top-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .top-section h2 {
        font-size: 24px;
        color: #111;
    }

    /* GREEN - Add Task */
    .add-button {
        background: #16a34a;
        color: white;
        text-decoration: none;
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: bold;
    }

    .add-button:hover {
        background: #15803d;
    }

    /* GREEN - Success Message */
    .success {
        background: #dcfce7;
        color: #166534;
        border-left: 5px solid #16a34a;
        padding: 13px 16px;
        border-radius: 6px;
        margin-bottom: 20px;
    }

    .task-list {
        display: grid;
        gap: 18px;
    }

    .task-card {
        background: white;
        border-radius: 10px;
        padding: 22px;
        border: 1px solid #ccc;
        border-left: 5px solid #111;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .task-name {
        font-size: 20px;
        font-weight: bold;
        color: #111;
    }

    .description {
        color: #555;
        margin-top: 10px;
        line-height: 1.5;
    }

    .task-info {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 18px;
    }

    /* GREEN - Completed */
    .completed {
        background: #dcfce7;
        color: #166534;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: bold;
    }

    /* BLACK - Pending */
    .pending {
        background: #111;
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: bold;
    }

    .due-date {
        background: #eee;
        color: #333;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 13px;
    }

    .actions {
        display: flex;
        gap: 8px;
        margin-top: 20px;
    }

    /* BLACK - Edit */
    .edit-button {
        background: #111;
        color: white;
        text-decoration: none;
        padding: 9px 16px;
        border-radius: 7px;
        font-size: 14px;
        font-weight: bold;
    }

    .edit-button:hover {
        background: #333;
    }

    /* RED - Delete */
    .delete-button {
        background: #dc2626;
        color: white;
        border: none;
        padding: 9px 16px;
        border-radius: 7px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
    }

    .delete-button:hover {
        background: #b91c1c;
    }

    .empty {
        background: white;
        padding: 50px;
        text-align: center;
        border-radius: 10px;
        border: 1px solid #ccc;
        color: #666;
    }
</style>
</head>

<body>

    <header class="header">
        <h1>Task Manager</h1>
        <p>Keep track of your daily tasks</p>
    </header>

    <main class="container">

        <div class="top-section">
            <h2>My Tasks</h2>

            <a href="{{ route('tasks.create') }}" class="add-button">
                + Add Task
            </a>
        </div>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if($tasks->count() > 0)

            <div class="task-list">

                @foreach($tasks as $task)

                    <div class="task-card">

                        <div class="task-header">

                            <div>
                                <div class="task-name">
                                    {{ $task->task_name }}
                                </div>

                                @if($task->description)
                                    <div class="description">
                                        {{ $task->description }}
                                    </div>
                                @endif
                            </div>

                        </div>

                        <div class="task-info">

                            <span class="status
                                {{ $task->status == 'Completed' ? 'completed' : 'pending' }}">

                                {{ $task->status }}

                            </span>

                            @if($task->due_date)

                                <span class="due-date">
                                    Due:
                                    {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}
                                </span>

                            @endif

                        </div>

                        <div class="actions">

                            <a
                                href="{{ route('tasks.edit', $task->id) }}"
                                class="edit-button"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('tasks.destroy', $task->id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this task?');"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="delete-button"
                                >
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty">
                <h3>No tasks yet</h3>
                <p>Click "Add Task" to create your first task.</p>
            </div>

        @endif

    </main>

</body>
</html>