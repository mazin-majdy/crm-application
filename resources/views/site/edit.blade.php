@extends('site.master')
@section('title', 'Edit ' . $customer->name . ' | ' . env('APP_NAME'))
@section('content')
    <h1 class="text-secondary">Update ({{ $customer->name }})</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                value="{{ $customer->name }}">
            <label for="name">Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                value="{{ $customer->email }}">
            <label for="email">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="age" placeholder="Age" name="age"
                value="{{ $customer->age }}">
            <label for="age">Age</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="address" placeholder="Address" name="address"
                value="{{ $customer->address }}">
            <label for="address">Address</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" id="status" aria-label="Floating label select example" name="status">
                <option disabled>Marital status</option>
                <option value="single" @if ($customer->status == 'single') selected @endif>Single</option>
                <option value="taken" @if ($customer->status == 'taken') selected @endif>Taken</option>
            </select>
            <label for="status">Marital status</label>
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                    @if ($customer->gender == 'male') checked @endif>
                <label class="form-check-label" for="male">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                    @if ($customer->gender == 'female') checked @endif>
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div>
        </div>

        <div class="form-floating mb-3">
            <input type="phone" class="form-control" id="phone" placeholder="Phone" name="phone"
                value="{{ $customer->phone }}">
            <label for="phone">Phone</label>
        </div>
        <div class="form-floating mb-3">
            @if ($customer->cover_image_path)
                <img src="{{ asset('storage/' . $customer->cover_image_path) }}" alt="" width='10%'>
            @endif
            <input type="file" class="form-control" id="cover_image_path" name="cover_image_path">
            <label for="cover_image_path">Photo</label>
        </div>
        <div class="text-center p-3">
            <button type="submit" name="submit" class="btn btn-primary ">Update</button>
        </div>
    </form>
@stop
