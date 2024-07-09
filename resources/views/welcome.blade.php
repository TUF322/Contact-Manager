<!DOCTYPE html>
<html>
<head>
<style>
    body {
        background-color: rgb(150, 150, 150);
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
    .img {
        width: 150px;
        height: 150px;
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
    function goToCreatePage() {
        window.location.href = '/create';
    }
    function goToUpdatePage(){
        window.location.href = '/update';
    }
    function goToAllPage(){
        window.location.href = '/All';
    }
    function goToDeletePage(){
        window.location.href = '/delete';
    }
</script>
</head>
<body>
    <div class="card">
        <h2>Contact Manager</h2>
    @if($contacts->isEmpty())
        <p>No contacts available.</p>
    @else
        <ul>
            @foreach($contacts as $contact)
                <li>{{ $contact->name }} - {{ $contact->email }} - {{ $contact->phone }}</li>
            @endforeach
        </ul>
    @endif

        <div class="button-container">
            <button onclick="goToCreatePage()">Create Contact</button>
            <button onclick="goToUpdatePage()">Update Contact</button>
            <button onclick="goToDeletePage()">Delete Contact</button>
        </div>
    </div>
</body>
</html>


