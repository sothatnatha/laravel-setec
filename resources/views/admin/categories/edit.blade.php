@extends('admin.layouts.master')
@section('title', 'Categories | Edit')

{{-- Rights contents --}}
@section('right')
    <h2>Edit Category</h2>
    <form action="/admin/categories/10" method="POST">
        @csrf
        {{-- cross site request fogery --}}

        {{ method_field('PUT')}}

        <div class="form-group">
            <input
                type="text"
                value="Title to change"
                name="category"
                class="form-control"
                placeholder="Title">
        </div>

        <div class="form-group">
            <textarea
                type="text"
                name="description"
                id="txtDescription"
                class="form-control"
                placeholder="Description">Description To change</textarea>

        </div>

        <div class="form-group">
            <input type="submit" class="btn-submit" name="btnSubmit" id="btnSubmit" value="Save Change">
        </div>
        </table>
    </form>
        </table>
    </form>
@endsection
{{-- end right content --}}
