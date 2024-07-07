<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page</title>
</head>
<body>
    <h1>Welcome to My Application</h1>

    <h2>Contacts</h2>
    @if($contacts->isEmpty())
        <p>No contacts available.</p>
    @else
        <ul>
            @foreach($contacts as $contact)
                <li>{{ $contact->name }} - {{ $contact->email }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>
