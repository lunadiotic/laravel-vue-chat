@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <chat-index :session="{{ Auth::user() }}"></chat-index>
    </div>
</div>
@endsection
