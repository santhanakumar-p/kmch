@extends('layouts.app')

@section('title', 'Doctor List')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col col-md-10">
                <div class="card">
                    <div class="card-header">
                        Doctor List
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>S. No</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Experience</th>
                                    <th>Qualification</th>
                                    <th>Phone</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($doctors as $doctor)
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $doctor->name }}</td>
                                        <td>{{ $doctor->department->name }}</td>
                                        <td>{{ $doctor->experience }}</td>
                                        <td>{{ $doctor->qualification }}</td>
                                        <td>{{ $doctor->phone }}</td>
                                        <td>{{ $doctor->created_at }}</td>
                                        <td>
                                            <a href="{{ route('doctors.edit', ['id' => $doctor->id]) }}" class="btn btn-sm btn-success">Edit</a>
                                            <form action="{{ route('doctors.destroy', ['id' => $doctor->id]) }}" method="post" class="d-inline-block">
                                                @csrf
                                                @method('Delete')

                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                
                                            </form>
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
