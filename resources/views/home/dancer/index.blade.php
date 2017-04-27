@extends('home.layouts.app')

@section('content')
    <section class="xd-list">
        <div class="container">
            <div class="xwrap">
                <div class="row">
                    @foreach($dancers as $dancer)
                        <div class="col-md-3">
                            <a class="noline" href="{{ url('dancer/'.$dancer->id) }}">
                                <div class="thumbnail">
                                    <img src="{{ $dancer->images->get('avator') }}">
                                    <div class="caption">
                                        <p><span class="label label-success">{{ $dancer->name }}</span></p>
                                        <p><span class="label label-danger">{{ $dancer->dance_outfit }}</span></p>
                                        <p><span class="label label-info">{{ $dancer->type->content }}</span></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection