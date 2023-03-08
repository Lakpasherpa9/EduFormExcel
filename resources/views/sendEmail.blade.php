@extends('layout.app')
<h1 class="text-center">Email </h1>
<hr>


<div class="container mt-2 mb-2 pd-2">
    <form action="{{ route('storeSingleEmail',$data->id) }}" method="POST">
        @csrf
        <div class="form-group mt-2 mb-2 pd-2">
            <label for="Greeting">Topic</label>
            <input type="text" class="form-control" name="topic" required placeholder="Topic">
        </div>

        <div class="form-group mt-2 mb-2 pd-2">
            <label for="Body">Body</label>
            <input type="text" class="form-control" name="body" required placeholder="Body">
        </div>

        <div class="form-group mt-2 mb-2 pd-2">
            <label for="actiontext">Context text</label>
            <input type="text" class="form-control" name="contexttext" required placeholder="Context text">
        </div>

        <div class="form-group mt-2 mb-2 pd-2">
            <label for="actionurl">Context url</label>
            <input type="text" class="form-control" name="contexturl" placeholder="Context url">
        </div>

        <div class="form-group mt-2 mb-2 pd-2">
            <label for="endText">End text</label>
            <input type="text" class="form-control" name="endtext" placeholder="End text">
        </div>


        <button type="submit" class="btn btn-success">Submit</button>

    </form>
</div>
