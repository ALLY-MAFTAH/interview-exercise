@extends('layouts.app')
@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-light-100  sm:items-center py-1 sm:pt-0">


        <div class="text-center">

            <h1 style="font-size: 30px; color:rgb(44, 11, 189);">Life Expectance</h1>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md col-md-offset-4">
                @if ($errors->has('msg'))
                    <div class="alert alert-warning">
                        {{ $errors->first('msg') }}
                        <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span
                                aria-hidden="true">X</span></button>
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading text-center text-success">Main </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
