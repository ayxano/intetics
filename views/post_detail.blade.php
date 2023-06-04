@extends('app')

@section('content')
    <h2>{{ $postInfo->getTitle() }}</h2>
    {{ $postInfo->getBody() }}
@endsection