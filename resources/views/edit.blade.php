@extends('app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header">Edit Contact</div>
        <div class="card-body">
            <form method="post" action="{{ route('contacts.update', $contact->id) }}">
                @csrf
                @method('PATCH')
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="first_name" class="form-control" value="{{ $contact->first_name }}"
                            required />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Last Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="last_name" class="form-control" value="{{ $contact->last_name }}"
                            required />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}" required />
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Update" />
                    <a class="btn btn-primary" href="{{ route('contacts.index') }}">Back</a>
                </div>
            </form>
        </div>
    </div>

@endsection
