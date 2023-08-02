@extends('site.master')
@section('title', 'Create New Customer | ' . env('APP_NAME'))
@section('content')
    <h1 class="text-secondary">Add New Customer</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
            <label for="name">Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
            <label for="email">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="age" placeholder="Age" name="age">
            <label for="age">Age</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="address" placeholder="Address" name="address">
            <label for="address">Address</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" id="status" aria-label="Floating label select example" name="status">
                <option disabled>Marital status</option>
                <option value="single">Single</option>
                <option value="taken">Taken</option>
            </select>
            <label for="status">Marital status</label>
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                <label class="form-check-label" for="male">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div>
        </div>

        <div class="form-floating mb-3">
            <input type="phone" class="form-control" id="phone" placeholder="Phone" name="phone">
            <label for="phone">Phone</label>
        </div>
        <div class="form-floating mb-3">
            <input type="file" class="form-control" id="cover_image_path" name="cover_image_path">
            <label for="cover_image_path">Photo</label>
        </div>
        <div class="text-center p-3">
            <button type="submit" name="submit" class="btn btn-primary ">Add</button>
        </div>
    </form>
@stop
