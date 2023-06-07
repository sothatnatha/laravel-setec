@extends('admin.layouts.master')
@section('title', 'Article | Listing')

<style>
    .form-group {
        display: flex;
        align-items: center;

        gap: 20px;
    }
    #btn-delete-article {
        width: 130px;
        background: #ff0000c4;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        border-radius: 50px;

    }
    #btn-move-article-to-trash {
        width: 130px;
        background: #0a95ccc4;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        border-radius: 50px;
    }
    #btn-cancel {
        text-decoration: none;
        color: #333;
    }

    .show-container {
        box-shadow: 0 0 10px #ddd;
        padding: 20px;
        border-radius: 20px;
        border: 1px solid #ddd;
    }

</style>

{{-- Rights contents --}}
@section('right')
    <h2>Details About Article</h2> <br>

    <div class="show-container">
        <h3>{{$article->title}}</h3> <br>
        <p><b>Description:</b> {{$article->description}}</p> <br>
        <p><b>Date:</b> {{ date('D d-M-Y', strtotime($article->created_at)) }}</p>
    </div> <br>

    <form action="/admin/articles/{{ $article->id }}" method="POST">
        @csrf
        {{-- cross site request fogery --}}
        {{ method_field('DELETE')}}

        <div class="form-group">
            <a id="btn-cancel" href="/admin/articles">Cancel</a>
            <input type="submit" value="Move to trash" id="btn-move-article-to-trash" name="btnMoveToTrash">

        </div>

    </form>
@endsection
{{-- end right content --}}
