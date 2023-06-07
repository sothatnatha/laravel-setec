@extends('admin.layouts.master')
@section('title', 'Employees | Listing')

{{-- Rights contents --}}
@section('right')
    <h2>Employees Listing</h2>
    <form action="/employees/99" method="POST">
        @csrf
        {{-- cross site request fogery --}}

        {{ method_field('DELETE') }}

        <input type="submit" value="Delete" name="btnDelete">
        <input type="button" value="Cancel" name="btnCancel">

    </form>
@endsection
{{-- end right content --}}
