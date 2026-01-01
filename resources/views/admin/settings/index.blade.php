<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Settings</title>
    @include('admin.partials.meta')
    @include('admin.partials.styles')
</head>
<body>

<div class="main-wrapper">

    @include('admin.partials.header')
    @include('admin.partials.sidebar')

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <h3 class="page-title">General Settings</h3>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">General</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="mb-2">Website Name</label>
                            <input type="text"
                                   name="site_name"
                                   class="form-control"
                                   value="{{ old('site_name', $setting->site_name ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label class="mb-2">Website Logo</label>
                            <input type="file" name="site_logo" class="form-control">

                            @if(!empty($setting->site_logo))
                                <div class="mt-2">
                                    <img src="{{ asset('storage/'.$setting->site_logo) }}"
                                         height="60">
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="mb-2">Favicon</label>
                            <input type="file" name="favicon" class="form-control">

                            @if(!empty($setting->favicon))
                                <div class="mt-2">
                                    <img src="{{ asset('storage/'.$setting->favicon) }}"
                                         height="32">
                                </div>
                            @endif
                        </div>

                        <button class="btn btn-primary">
                            Update Settings
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

@include('admin.partials.scripts')
</body>
</html>
