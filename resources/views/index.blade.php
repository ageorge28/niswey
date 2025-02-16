@extends('app');

@section('content')


    @if ($message = session()->get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Contacts Data</b></div>
                <div class="col col-md-6">
                    <a href="{{ route('contacts.create') }}" class="btn btn-success btn-sm float-end">Add Contact</a>

                    <a href="{{ route('contacts.read') }}" class="btn btn-success btn-sm mx-2 float-end">Import XML file</a>

                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                @if (count($contacts) > 0)
                    @foreach ($contacts as $contact)
                        <tr>

                            <td>{{ $contact->first_name }}</td>
                            <td>{{ $contact->last_name }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>


                                <form method="post" action="{{ route('contacts.destroy', $contact->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('contacts.edit', $contact->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                                </form>

                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center">No Contacts Found</td>
                    </tr>
                @endif
            </table>
            {!! $contacts->links() !!}
        </div>
    </div>

@endsection
