@extends('students.layout')

@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 9 CRUD Example from scratch</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Id No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($student as $key => $data)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $data->id_no }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ \Str::limit($data->description, 100) }}</td>
                <td>
                    <form action="{{ route('students.destroy',$data->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('students.show',$data->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('students.edit',$data->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $student->links() !!}
@endsection
