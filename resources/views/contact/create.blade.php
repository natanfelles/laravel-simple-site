@extends('layouts.default')

@section('title', 'Contact')

@section('contents')
    <h1>@lang('contact.contact')</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            @lang('contact.error_occur')
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($msg)
        <div class="alert alert-{{ $msg['type'] }}">{{ $msg['contents'] }}</div>
    @endif

    <form action="{{ route('contact.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">@lang('contact.name')</label>
            <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif" name="name" id="name" value="{{ old('name') }}">
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="name">@lang('contact.email')</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="subject">@lang('contact.subject')</label>
            <input type="text" class="form-control" name="subject" id="subject" value="{{ old('subject') }}">
        </div>
        <div class="form-group">
            <label for="message">@lang('contact.message')</label>
            <textarea name="message" id="message" class="form-control">{{ old('message') }}</textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">@lang('contact.submit')</button>
        </div>
    </form>
@endsection