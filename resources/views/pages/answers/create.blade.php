@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Create Answer</h4>
                </div>

                <div class="card-body">
                    <form method='POST' action='/answer/{{ $id }}'>
                        @csrf
                        <input type="hidden" name="question_id" value="{{$id}}" />

                        <div class="form-group">
                            <label for="formGroupExampleInput">Isi Jawaban:</label>
                            <textarea type="text" name='isi' class="form-control" rows="5"
                                id="formGroupExampleInput"></textarea>
                        </div>
                        <button type="submit" class="btn btn-secondary">Submit</button>
                        <!-- <a href="/daftar" class="btn btn-info" role="button">Submit</a> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
