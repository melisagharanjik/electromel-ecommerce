@extends('adminlte.master')

@section('content')

    <div class="container-fluid">

        <h1 class="mb-4">Website Settings</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">

                <form action="{{ route('admin.setting.update') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Site Name</label>
                        <input type="text" name="site_name" class="form-control"
                               value="{{ $setting->site_name ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control"
                               value="{{ $setting->email ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control"
                               value="{{ $setting->phone ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control"
                               value="{{ $setting->address ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label>Facebook</label>
                        <input type="text" name="facebook" class="form-control"
                               value="{{ $setting->facebook ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label>Instagram</label>
                        <input type="text" name="instagram" class="form-control"
                               value="{{ $setting->instagram ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label>Twitter</label>
                        <input type="text" name="twitter" class="form-control"
                               value="{{ $setting->twitter ?? '' }}">
                    </div>

                    <button type="submit" class="btn btn-success">
                        Save Settings
                    </button>

                </form>

            </div>
        </div>

    </div>

@endsection
