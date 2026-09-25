<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add New Task</title>

    <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: Arial, sans-serif;
        background: #f2f2f2;
        min-height: 100vh;
        color: #111;
    }

    .top-bar {
        background: #111;
        color: white;
        padding: 20px 45px;
        border-bottom: 5px solid #16a34a;
    }

    .top-bar h1 {
        font-size: 26px;
    }

    .page {
        max-width: 900px;
        margin: 45px auto;
        padding: 0 20px;
    }

    .back-link {
        display: inline-block;
        color: #111;
        text-decoration: none;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .back-link:hover {
        color: #16a34a;
    }

    .form-card {
        background: white;
        border-radius: 12px;
        padding: 35px;
        border: 1px solid #ccc;
        border-top: 5px solid #16a34a;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.08);
    }

    .form-header {
        margin-bottom: 30px;
    }

    .form-header h2 {
        font-size: 28px;
        margin-bottom: 8px;
        color: #111;
    }

    .form-header p {
        color: #666;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-group {
        margin-bottom: 22px;
    }

    .full-width {
        grid-column: 1 / -1;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #111;
    }

    input,
    textarea,
    select {
        width: 100%;
        padding: 13px 15px;
        border: 1px solid #bbb;
        border-radius: 7px;
        font-size: 15px;
        outline: none;
        font-family: Arial, sans-serif;
    }

    input:focus,
    textarea:focus,
    select:focus {
        border-color: #16a34a;
        box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.12);
    }

    textarea {
        min-height: 130px;
        resize: vertical;
    }

    .error {
        color: #dc2626;
        font-size: 13px;
        margin-top: 6px;
    }

    .buttons {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 10px;
        padding-top: 25px;
        border-top: 1px solid #ddd;
    }

    .cancel-button {
        padding: 12px 22px;
        border-radius: 7px;
        border: 1px solid #111;
        background: #111;
        color: white;
        text-decoration: none;
        font-weight: bold;
    }

    .cancel-button:hover {
        background: #333;
    }

    .submit-button {
        padding: 12px 25px;
        border: none;
        border-radius: 7px;
        background: #16a34a;
        color: white;
        font-weight: bold;
        font-size: 15px;
        cursor: pointer;
    }

    .submit-button:hover {
        background: #15803d;
    }

    @media (max-width: 700px) {
        .form-row {
            grid-template-columns: 1fr;
        }

        .full-width {
            grid-column: auto;
        }

        .form-card {
            padding: 25px;
        }

        .buttons {
            flex-direction: column;
        }

        .cancel-button,
        .submit-button {
            text-align: center;
            width: 100%;
        }
    }
</style>
</head>

<body>

    <header class="top-bar">
        <h1>Task Manager</h1>
    </header>

    <main class="page">

        <a href="{{ route('tasks.index') }}" class="back-link">
            ← Back to Tasks
        </a>

        <div class="form-card">

            <div class="form-header">
                <h2>Create a New Task</h2>
                <p>Add the details below to organize your work.</p>
            </div>

            <form action="{{ route('tasks.store') }}" method="POST">

                @csrf

                <div class="form-row">

                    <div class="form-group full-width">
                        <label for="task_name">
                            Task Name
                        </label>

                        <input
                            type="text"
                            id="task_name"
                            name="task_name"
                            value="{{ old('task_name') }}"
                            placeholder="Enter task name"
                            required
                        >

                        @error('task_name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group full-width">
                        <label for="description">
                            Description
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            placeholder="Describe what needs to be done..."
                        >{{ old('description') }}</textarea>

                        @error('description')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">
                            Status
                        </label>

                        <select id="status" name="status" required>

                            <option value="Pending"
                                {{ old('status', 'Pending') == 'Pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="Completed"
                                {{ old('status') == 'Completed' ? 'selected' : '' }}>
                                Completed
                            </option>

                        </select>

                        @error('status')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="due_date">
                            Due Date
                        </label>

                        <input
                            type="date"
                            id="due_date"
                            name="due_date"
                            value="{{ old('due_date') }}"
                        >

                        @error('due_date')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="buttons">

                    <a href="{{ route('tasks.index') }}"
                       class="cancel-button">
                        Cancel
                    </a>

                    <button type="submit"
                            class="submit-button">
                        Create Task
                    </button>

                </div>

            </form>

        </div>

    </main>

</body>
</html>