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
        <div class="card-header">Import XML File</div>
        <div class="card-body">
            <form method="post" action="{{ route('contacts.upload') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form">XML File</label>
                    <div class="col-sm-10">
                        <input type="file" name="xml" />
                    </div>
                    <br />
                    <small class="text-danger">The XML file must be in the below format
                        <p>
                            {{ '<contacts><contact><first_name>Kökten</first_name><last_name>Adal</last_name><phone>+90 333 8859342</phone></contact></contacts>' }}
                        </p>
                    </small>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <a class="btn btn-primary" href="{{ route('contacts.index') }}">Back</a>
                </div>
            </form>
        </div>
    </div>

@endsection
