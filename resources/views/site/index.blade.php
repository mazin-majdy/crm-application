@extends('site.master')
@section('title', 'Customers | ' . env('APP_NAME'))
@section('content')

    @if ($success)
        <div class="alert alert-success">{{ $success }}</div>
    @endif
    @if (!$customerCount)
        <div class="alert alert-warning">No Customer Added</div>
    @endif
    <table class="table table-hover">
        <thead>
            <td>Name</td>
            <td>Email</td>
            <td>Age</td>
            <td>Address</td>
            <td>Marital status</td>
            <td>Gender</td>
            <td>Phone</td>
            <td>Picture</td>
            <td>Created At</td>
            <td>Actions</td>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->age }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->status }}</td>
                    <td>{{ $customer->gender }}</td>
                    <td>{{ $customer->phone }}</td>

                    @if ($customer->cover_image_path)
                        <td><img src="{{ asset('storage/' . $customer->cover_image_path) }}"
                                style="width:80px; height:80px; border-radius: 50%"></td>
                    @else
                        <td><img src="https://eitrawmaterials.eu/wp-content/uploads/2016/09/person-icon.png"
                                style="width:80px; height:80px; border-radius: 50%"></td>
                    @endif
                    <td>{{ $customer->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-outline-primary" href="{{ route('customers.edit', $customer->id) }}"><i
                                    class="fas fa-pen"></i></a>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach



        </tbody>
        <tbody>

        </tbody>
    </table>
@endsection
