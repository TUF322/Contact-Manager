<!DOCTYPE html>
<html>
<head>
<style>
    body {
        background-color: rgb(79, 79, 79);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        border-radius: 15px;
        width: 50vw;
        background-color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
    .form-group {
        width: 100%;
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    .form-group input {
        width: calc(100% - 20px);
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .form-group .invalid-feedback {
        color: red;
        margin-top: 5px;
    }
    .button-container {
        display: flex;
        justify-content: space-around;
        width: 100%;
        margin-top: 20px;
    }
    .button-container button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #ff0000;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .button-container button:hover {
        background-color: #cc0000;
    }
</style>
</head>
<body>
    <div class="card">
        <h1>Delete Contact</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="form-group">
            <label for="contactSelect">Select Contact</label>
            <select id="contactSelect" class="form-control">
                <option value="">Select a contact</option>
                @foreach($contacts as $contact)
                    <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                @endforeach
            </select>
        </div>

        <form id="deleteForm" method="POST" action="{{ url('/delete') }}">
            @csrf
            @method('DELETE')
            <input type="hidden" id="contactId" name="contactId">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" readonly>
            </div>
            <button type="submit" class="btn btn-danger">Delete Selected Contact</button>
        </form>

        <div class="button-container">
            <form id="deleteAllForm" method="POST" action="{{ url('/delete-all') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Delete All Contacts</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('contactSelect').addEventListener('change', function() {
            const contactId = this.value;
            if (contactId) {
                fetch(`/contacts/${contactId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('contactId').value = data.id;
                        document.getElementById('name').value = data.name;
                        document.getElementById('deleteForm').setAttribute('action', `/delete/${data.id}`);
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                document.getElementById('deleteForm').reset();
            }
        });

        document.getElementById('deleteAllForm').addEventListener('submit', function(event) {
            event.preventDefault();
            if (confirm('Are you sure you want to delete all contacts?')) {
                fetch('/delete-all', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message); // Show success message or handle as needed
                    location.reload(); // Refresh the page to reflect changes
                })
                .catch(error => console.error('Error:', error));
            }
        });
    </script>

</body>
</html>
