<!DOCTYPE html>
<html lang="en">
@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Гостевая книга</h1>
        <hr>
        <div class="mb-3">
            @include('guestbook.form')
        </div>
        <div class="card">
            <div class="card-header">Сообщения</div>
            <ul class="list-group list-group-flush">
                @foreach ($messages as $message)
                    <li class="list-group-item">
                        <strong>{{ $message->name }}</strong>
                        <p>{!! nl2br(e($message->message)) !!}</p>{{--                        делаем перевод строки--}}
                        <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="mt-3">
            {{ $messages->links() }}
        </div>
    </div>
@endsection

</html>
