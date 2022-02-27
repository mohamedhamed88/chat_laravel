@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
            <hr><br>
            <hr>

            <ul>
                @foreach (auth()->user()->articles as $article)
                    <li>{{ $article->title }}</li>
                @endforeach
            </ul>

            <div class="col-md-8">
                <form action="{{ route('addarticle') }}" method="post">
                    @csrf
                    <input type="text" class="form-control" name="title">
                    <textarea name="content" id="" cols="30" class="form-control" rows="10"></textarea>
                    <input type="submit" value="Envoyer">
                </form>

            </div>
            <ul>
                @foreach ($users as $user)
                    @if ($user->id != auth()->user()->id)
                        <li> <a href="{{ route('chat', $user->id) }}"> {{ $user->name }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@endsection
