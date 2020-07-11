@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Detail</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="/answer/{{ $data->id }}/create">
                                <button class="btn btn-primary">
                                    Jawab
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h2>Judul: {{ $data->judul }} </h2>

                    <h5>Isi Pertanyaan: {{ $data->isi }}</h5>

                    <h5>Tag: </h5>
                    @foreach($data->tags as $tag)
                        <button class="btn btn-primary btn-sm">{{ $tag->tag_name }}</button>
                    @endforeach
                    <div class="pt-4">
                        @foreach($answers as $key => $answer)
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div>
                                        <h6>{{ $answer->name }} | {{ $answer->email }}</h6>
                                        @if ($answer->user_id == Auth::user()->id)
                                                <form action="/answer/{{$answer->answer_id}}" method="post" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                                <a href="/answer/{{ $answer->answer_id }}/edit" style="text-decoration: none;" class="btn btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                </a>
                                            @endif
                                    </div>
                                    {{ $answer->isi }}
                                    <div class="row text-right">
                                        <div class="col-lg-12">
                                            <a href="/vote" style="text-decoration: none;">
                                                <i class="fas fa-vote-yea"></i> {{ $answer->vote }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card-footer"><a href="/" class="btn btn-warning" role="button">Back</a></div>
        </div>
    </div>
</div>

@endsection
