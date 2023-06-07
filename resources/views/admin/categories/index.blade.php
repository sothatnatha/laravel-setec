@extends('admin.layouts.master')
@section('title', 'Article | Listing')

{{-- Rights contents --}}
@section('right')
    <h2>Category Listing</h2>
    <a href="/admin/categories/create">Create</a> <br><br>
    <table border="1">
        <tr>
            <th>id</th>
            <th>Category</th>
            <th>Description</th>
            <th>Created</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Khmer News</td>
            <td>News Description</td>
            <td>2023-05-03</td>
            <td>
                <a href="/admin/categories/1/edit">Edit</a>
                <a href="/admin/categories/1">Show</a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Smooth Drink</td>
            <td>Smooth Drink Description</td>
            <td>2023-05-03</td>
            <td>
                <a href="/admin/categories/2/edit">Edit</a>
                <a href="/admin/categories/2">Show</a>
            </td>
        </tr>
    </table>

@endsection
{{-- end right content --}}
