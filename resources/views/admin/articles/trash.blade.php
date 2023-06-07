@extends('admin.layouts.master')
@section('title', 'Article | Trash')

<style>
    #del-forever-success-message {
        color: green;
    }
</style>
@section('right')

    <div class="">
        <h2>
            <i class="fa-solid fa-trash"></i>
            All Trash
        </h2>
        <a href="/admin/articles" id="listing_Links">Listing</a> <br> <br>

        @if (session('not-check-message'))
            <p id="not-check-message">{{ session('not-check-message') }}</p>
        @endif

        @if (session('del-forever-success-message'))
            <p id="del-forever-success-message">{{ session('del-forever-success-message') }}</p>
        @endif <br>


        @unless (count($articles) == 0)
            <form action="/admin/articles/putbackall" method="post">
                @csrf
                <div class="article-main-action-wrapper">
                    <input type="submit" value="Put back" name="btnMoveToTrash" id="btnMoveToTrash" />
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
                                <p class="news-description">
                                    {{ $article->description }}
                                </p>
                            </td>
                            <td>{{ date('D d-M-Y', strtotime($article->created_at)) }}</td>

                            @if ($article->published == 1)
                                <td style="text-align: center;">
                                    <i class="fa-solid fa-earth-americas"></i>
                                </td>
                            @else
                                <td style="text-align: center;"><i class="fa-solid fa-lock"></i></td>
                            @endif

                            <td style="text-align: center;">
                                <div id="action-list-in-trash">
                                    {{-- <form action="/admin/delarticle/deleteforever" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="delete_article">
                                        <input type="submit" value="Delete">
                                    </form> --}}
                                    <a href="/admin/delarticle/deleteforever/{{ $article->id }}">Delete</a>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </table>
            </form>
        @else
            <p>No trash</p>
        @endunless
    </div>



@endsection
