@extends('layouts.signup')
@push('css')
<link rel="stylesheet" href="/assets/css/custom.css">
@endpush
@section('title', 'Login')
@section('content')
<div id="alert-section">
</div>
    <form id="login" method="POST">
        <div class="form-group">
            <label class="form-label" for="email">Email Address:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="jhon@doe.com">
        </div>
        <div class="form-group">
            <label class="form-label" for="pass">Email Address:</label>
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Continue</button>
        </div>
    </form>
@endsection
@push('scripts')
<script src="/assets/js/custom/login.js"></script>
@endpush