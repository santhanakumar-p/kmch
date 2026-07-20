@extends('layouts.app')

@section('title', 'Create Doctor')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col col-md-5">
                <div class="card">
                    <div class="card-header">
                        Create Doctor
                        <a href="{{ route('doctors.index') }}" class="btn btn-secondary btn-sm float-end">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('doctors.store') }}" enctype="multipart/form-data" method="post">
                            @csrf

                            <div class="mb-2">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter name">
                            </div>
                            <div class="mb-2">
                                <label for="qualification" class="form-label">Qualification</label>
                                <input type="text" name="qualification" id="qualification" class="form-control"
                                    placeholder="Enter qualification">
                            </div>
                            <div class="mb-2">
                                <label for="experience" class="form-label">Experience</label>
                                <input type="number" name="experience" id="experience" class="form-control"
                                    placeholder="Enter experience">
                            </div>
                            <div class="mb-2">
                                <label for="department-id" class="form-label">Department</label>
                                <select name="department_id" id="department-id" class="form-control">
                                    <option selected disabled value="">-- select department --</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" name="phone" id="phone" class="form-control"
                                    placeholder="Enter phone">
                            </div>
                            <div class="mb-2">
                                <label for="shift-start-date-time" class="form-label">Shift Start Date Time</label>
                                <input type="datetime-local" name="shift_start_date_time" id="shift-start-date-time"
                                    class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="shift-end-date-time" class="form-label">Shift End Date Time</label>
                                <input type="datetime-local" name="shift_end_date_time" id="shift-end-date-time"
                                    class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="image" class="form-label">Doctor Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="mb-4">
                                <label for="bio" class="form-label">Bio</label>
                                <textarea name="bio" id="bio" class="form-control" placeholder="Enter Bio"></textarea>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-md btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
