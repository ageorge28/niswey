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
        <div class="card-header">Add Student</div>
        <div class="card-body">
            <form method="post" action="{{ route('contacts.store') }}">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="first_name" class="form-control" required />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Last Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="last_name" class="form-control" required />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone" class="form-control" required />
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Add" />
                    <a class="btn btn-primary" href="{{ route('contacts.index') }}">Back</a>
                </div>
            </form>
        </div>
    </div>

@endsection
