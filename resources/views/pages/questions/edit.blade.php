@extends('layouts.master')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>Edit Quest</h4></div>

                    <div class="card-body">
                        <form method="POST" action="/question/{{$data->id}}">
                     @csrf
                     @method('PUT')
                            <div class="form-group">
                                <label for="formGroupExampleInput">Judul:</label>
                                <input type="text" name= "judul" class="form-control" value="{{$data->judul}}">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Isi Pertanyaan:</label>
                                <input type="text" name= "isi" class="form-control" value="{{$data->isi}}">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Tag</label>
                                {{-- <input type="text" name= "tag" class="form-control" value="{{$data->tag}}"> --}}
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach($categories as $key => $category)
                                        @if ($category->id == $item->category_id)
                                            <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
                                        @else
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-secondary mb-2">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
