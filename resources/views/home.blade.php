@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 mb-0">{{ __('Dashboard') }}</h1>
                    <a href="{{ route('addblog') }}" class="btn btn-primary d-flex align-items-center gap-2">
                        <i class="bi bi-plus-lg"></i>
                        Add Blog
                    </a>
                </div>

                @if (session('status'))
                    <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <div>
                            {{ session('status') }}
                        </div>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="fw-medium">#</th>
                                <th scope="col" class="fw-medium">Title</th>
                                <th scope="col" class="fw-medium">Sub Title</th>
                                <th scope="col" class="fw-medium">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->id }}</td>
                                    <td class="fw-medium">{{ $blog->title }}</td>
                                    <td>{{ $blog->sub_title }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <form action="{{ route('edit', $blog->id) }}" method="GET">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-primary btn-sm">
                                                    <i class="bi bi-pencil me-1"></i>Edit
                                                </button>
                                            </form>
                                            <form action="{{ route('delete', $blog->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" href="{{ route('delete', $blog->id) }}"
                                                    class="btn btn-outline-danger btn-sm">
                                                    <i class="bi bi-trash me-1"></i>Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
