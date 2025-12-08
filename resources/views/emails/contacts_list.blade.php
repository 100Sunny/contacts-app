<h2>Contacts List</h2>

<ul>
@foreach($contacts as $contact)
    <li>
        <strong>{{ $contact->name }}</strong> - {{ $contact->phone }}</strong>
    </li>
@endforeach
</ul>

<p>Sent from Laravel Contacts App</p>
