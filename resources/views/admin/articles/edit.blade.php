@extends('admin.layouts.master')
@section('title', 'Article | Edit')

{{-- Rights contents --}}
@section('right')
    <h2>Edit Article</h2>
    <form action="/admin/articles/{{ $articles->id }}" method="POST" autocomplete="off">
        @csrf
        {{ method_field('PUT')}}
        {{-- <input type="hidden" name="_method" value="PUT"> --}}

        <div class="form-group">
            <input
                type="text"
                value="{{$articles->title}}"
                name="title"
                id="txtTitle"
                class="form-control"
                placeholder="Title"
            />
        </div>

        <div class="form-group">
            <textarea
                type="text"
                name="description"
                id="txtDescription"
                class="form-control"
                rows="20"
                placeholder="Description">{{ $articles->description }}</textarea>

        </div>

        <div class="form-group">
            <select name="published" id="txtPublished" class="form-control">

                @if ($articles->published == 1)
                    <option value="1">Public</option>
                    <option value="0">Only me</option>

                @else
                    <option value="0">Only me</option>
                    <option value="1">Public</option>

                @endif

            </select>
        </div>

        <div class="form-group">
            <input type="submit" class="btn-submit" name="btnSubmit" id="btnSubmit" value="Save">

        </div>
    </form>
    <a href="/admin/articles" id="gotomanage_Link">Go manage</a>
    </form>
@endsection
{{-- end right content --}}
