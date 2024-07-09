<!DOCTYPE html>
<html>
<head>
<style>
    body {
        background-color:  rgb(79, 79, 79);
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
        background-color: #007bff;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .button-container button:hover {
        background-color: #0056b3;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const nameInput = document.getElementById("name");

        nameInput.addEventListener("input", function() {
            const namePattern = /^[A-Za-z\s]+$/;
            if (!namePattern.test(nameInput.value)) {
                nameInput.setCustomValidity("Please enter letters only.");
            } else {
                nameInput.setCustomValidity("");
            }
        });
    });
</script>
</head>
<body>
    <div class="card">
        <h1>Create Contact</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="/submit" method="post">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    Please fix the following errors
                </div>
            @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name') }}" pattern="[A-Za-z\s]+" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="button-container">
                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
            </div>
        </form>
    </div>
</body>
</html>
