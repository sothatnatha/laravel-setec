@extends('admin.layouts.master')
@section('title', 'Article | Listing')

{{-- Rights contents --}}
@section('right')
<h1>Welcome,
    @if (Session::has('user'))
    {{ Session::get('user')}}
    @endif
</h1>
<h2>Aritcle Listing</h2>

<a href="/admin/articles/create" id="create_link">Create</a>
<a href="/admin/article/trash" id="trash_link">Trash</a>

<div class="flash-message-wrapper">
    @if (session('message'))
    <p id="message-success">{{ session('message') }}</p>
    @endif

    @if (session('move-trash-success-message'))
    <p id="move-trash-success-message">

        {{ session('move-trash-success-message') }}
    </p>
    @endif

    @if (session('move-to-trash-success-message'))
    <p id="move-to-trash-success-message">{{ session('move-to-trash-success-message') }}</p>
    @endif

    @if (session('not-check-message'))
    <p id="not-check-message">{{ session('not-check-message') }}</p>
    @endif


    @if (session('put-back-success-message'))
    <p id="put-back-success-message">{{ session('put-back-success-message') }}</p>
    @endif





</div>

<br>

<form action="/admin/articles/movealltotrash" method="post">
    @csrf
    @unless (count($articles) == 0)

    <div class="article-main-action-wrapper">
        <input type="submit" value="Move to trash" name="btnMoveToTrash" id="btnMoveToTrash" />
        <input type="button" onclick='selects()' value="Check all" id="btnMoveToTrash" />
        <input type="button" onclick='deSelect()' value="Deselect All" id="btnMoveToTrash" />
    </div>

    <table border="1">
        <tr>
            <th>
                Action
            </th>

            {{-- <th>id</th> --}}
            <th>Title</th>
            <th>Description</th>
            <th>Created</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ($articles as $article)
        <tr>
            {{-- checkbox row for multi delete purpose --}}
            <td>
                <input type="checkbox" name="chk_ids[]" id="chk_ids[]" value="{{ $article->id }}" />
            </td>
            {{-- end checkbox row for multi delete purpose --}}

            {{-- <td>{{ $article->id }}</td> --}}
            <td>
                <b>
                    <p class="news-title">
                        {{ $article->title }}
                    </p>
                </b>
            </td>
            <td>
                <a href="/admin/articles/{{ $article->id }}" id="_article_description-link">
                    <p class="news-description">
                        {{ $article->description }}
                    </p>
                </a>
            </td>
            <td>{{ date('D d-M-Y', strtotime($article->created_at)) }}</td>

            @if ($article->published == 1)
            <td style="text-align: center;">
                <i class="fa-solid fa-earth-americas"></i>
            </td>
            @else
            <td style="text-align: center;"><i class="fa-solid fa-lock"></i></td>
            @endif

            <td>
                <div id="action-list">
                    <a href="/admin/articles/{{ $article->id }}/edit" class="btn-edit-action">Edit</a>
                    <a href="/admin/articles/{{ $article->id }}" class="btn-show-action">View</a>
                </div>

            </td>
        </tr>
        @endforeach
    </table>
    @else
    <p>Empty list</p>
    @endunless

</form>



@endsection
{{-- end right content --}}