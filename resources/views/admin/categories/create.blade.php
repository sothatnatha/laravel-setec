@extends('admin.layouts.master')
@section('title', 'Category | Create')

{{-- Rights contents --}}
@section('right')
    <h2>Create Category</h2>
    <form action="/admin/categories" method="POST" autocomplete="off">
        @csrf
        {{-- cross site request fogery --}}

        {{ method_field('POST') }}

        <div class="form-group">
            <input type="text" name="category" id="txtTitle" class="form-control" placeholder="Title">
        </div>

        <div class="form-group">
            <input type="submit" class="btn-submit" name="btnSubmit" id="btnSubmit" value="Submit">
        </div>
        </table>
    </form>
@endsection
{{-- end right content --}}
