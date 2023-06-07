@extends('admin.layouts.master')
@section('title', 'Categories | Listing')

{{-- Rights contents --}}
@section('right')
    <h2>Categories Listing</h2>
    <form action="/admin/categories/1" method="POST">
        @csrf
        {{-- cross site request fogery --}}

        {{ method_field('DELETE')}}

        <input type="submit" value="Delete" name="btnDelete">
        <a href="/admin/categories">Cancel</a>

    </form>
@endsection
{{-- end right content --}}
