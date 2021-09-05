@extends('layout.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ route('register.create') }}" class="btn btn-sm btn-success btn-addon"><i class="glyphicon glyphicon-plus"></i>Create Registration</a>
        </div>
        <table class="table table-bordered has-action">
            <thead>
            <tr>
                <th>Country</th>
                <th>Name</th>
                <th>Company</th>
                <th>Street</th>
                <th>Street No</th>
                <th>Zip Code</th>
                <th>City</th>
                <th>Date of entry</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($registrations as $registration)
                <tr id="row-{{ $registration->id }}">
                    <td>{{ $registration->country_code }}</td>
                    <td>{{ $registration->name }}</td>
                    <td>{{ $registration->company }}</td>
                    <td>{{ $registration->street }}</td>
                    <td>{{ $registration->street_no }}</td>
                    <td>{{ $registration->zip_code }}</td>
                    <td>{{ $registration->city }}</td>
                    <td>{{ $registration->created_at }}</td>
                    <td>
                        <a href="{{ route('register.edit', ['id' => $registration->id]) }}" class="btn btn-info btn-sm">Edit</a>
                        <a data-id="{{ $registration->id }}" data-title="Are you sure to delete registration, name {{ $registration->name }}" data-url="{{ route('register.destroy', ['id' => $registration->id]) }}" class="btn btn-danger remove-registration btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
