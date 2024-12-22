@extends('layouts.master')
@section('css')
@endsection

@section('page')
    {{ __('messages.invoice-details') }}
@endsection
@section('content')
    <livewire:posts />
@endsection
