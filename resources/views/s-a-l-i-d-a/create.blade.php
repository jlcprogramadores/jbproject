@extends('layouts.app')

@section('template_title')
    Create S A L I D A
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create S A L I D A</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('s-a-l-i-d-a-s.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('s-a-l-i-d-a.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
