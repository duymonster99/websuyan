@extends('admin-page.index')
@section('admin')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('acc.update', $acc->id) }}">
                @csrf
                @method('PUT')
                <h2>Update Account</h2>

                <div class="mb-3 mt-3">
                    <label for="fullname" class="form-label">Full Name:</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="{{ $acc->fullname }}">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input name="email" class="form-control" id="email" value="{{ $acc->email }}">
                </div>

                <button type="submit" class="btn btn-primary">Update Account</button>
            </form>
        </div>
    </div>

    <script src="{{asset('js/confirm-reload.js')}}"></script>
@endsection
