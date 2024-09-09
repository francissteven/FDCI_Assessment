@foreach ($contacts as $contact)
    <tr>
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->company }}</td>
        <td>{{ $contact->phone }}</td>
        <td>{{ $contact->email }}</td>
        <td>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editContact-{{ $contact->id }}">Edit</button>
            <button 
                type="button" 
                class="btn btn-danger btn-sm" 
                data-bs-toggle="modal" 
                data-bs-target="#deleteModal"
                data-form-action="{{ route('contacts.destroy', $contact->id) }}"
            >
            Delete
            </button>
        </td>
    </tr>
    @include('layouts.addcontact')
    @include('layouts.editcontact')
    @include('layouts.confirmdelete')
@endforeach
