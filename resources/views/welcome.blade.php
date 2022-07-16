@extends('layouts.app')
@section('scripts')
    <script>
        $("#filter-form").on("submit", function(e) {
            e.preventDefault();
            var url = $("#filter-form").attr("action");
            var newUrl = `${url}?year=${$(e.target).val()}`;
            window.location.assign(newUrl);
        });
    </script>
    
@endsection

@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-light-100  sm:items-center py-1 sm:pt-0">
        <div class="text-center">
            <h1 style="font-size: 30px; color:rgb(44, 11, 189);">Life Expectancy Data</h1>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md col-md-offset-4">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{ session('success') }}
                        <button type="button" data-bs-dismiss="alert" aria-label="Close" class="close btn"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-error alert-dismissible" role="alert">
                        {{ session('error') }}
                        <button type="button" data-bs-dismiss="alert" aria-label="Close" class="close btn"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading text-center text-success">Main </div>

                    <div class="row py-3">
                        <div class="col-sm-6 text-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#uploadFileModal" role="button"
                                class="btn  btn-sm btn-block btn-primary {{ $expectancies->count() != 0 ? 'disabled' : '' }}">Upload
                                Expectancy Data</a>
                        </div>
                        <div class="col-sm-6 text-center">
                            <form id="delete-all" method="post" action="{{ route('delete-all') }}">@csrf
                                @method('delete')
                            </form>
                            <a href="#!"
                                class="btn  btn-block btn-danger btn-sm {{ $expectancies->count() == 0 ? 'disabled' : '' }}"
                                onclick="if(confirm('Are you sure want to delete all data ?')) document.getElementById('delete-all').submit()">&nbsp;Delete
                                All
                                Expectancy
                                Data</a>
                        </div>
                    </div>
                    <hr>
                    <x-card>

                        <div id="table-1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap5">
                            <div class="row">
                                <div class="col-sm-8">


                                </div>
                                <div class="col-sm-4">
                                    <form action="{{ route('welcome') }}" method="GET" id="filter-form">
                                        @csrf

                                        <select name="year" id="year" class="dropdown-select form-control"
                                            onchange="this.form.submit()">
                                            @foreach ($years as $year)
                                                <option value="{{ $year->name }}"
                                                    {{ $currentYear == $year->name ? 'selected' : '' }}>
                                                    {{ $year->name }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-responsive table-striped " id="table-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="sorting" tabindex="0" aria-controls="table-1"
                                        aria-label="Country Name: activate to sort column ascending">Country Name</th>
                                    <th>Country Code</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expectancies as $index => $item)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $item->country_name }}</td>
                                        <td>{{ $item->country_code }}</td>
                                        <td>{{ $item->total }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                            {{-- {!! $expectancies->links() !!} --}}
                        </table>
                </div>
                </x-card>
            </div>
        </div>
    </div>

    <div class="modal fade" id="uploadFileModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Life Expectancy Data File</h5>
                    <button class="btn" class="close" data-bs-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->bulk->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="btn close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <ul class="m-0">
                                    @foreach ($errors->bulk->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group row">
                            <label for="csv_file"
                                class="col-md-4 col-form-label text-md-right">{{ __('Data File') }}</label>
                            <div class="col-md-6">
                                <input id="csv_file" type="file"
                                    class="form-control @error('csv_file', 'bulk') is-invalid @enderror" name="csv_file"
                                    required>
                                <span class="form-group">.csv</span>
                                @error('csv_file', 'bulk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
