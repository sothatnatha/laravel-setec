@extends('admin.layouts.master')
@section('title', 'Article | Create')

<style>
    #message-success {
        color: green;
    }

    #message-error {
        color: rgb(238, 23, 23);
        font-size: 14px;
        margin-left: 10px;

    }

    .link-to-manage {
        color: #333;
    }

    .error-fields {
        color: rgb(238, 23, 23);
        margin-left: 12px;
        margin-top: 5px;
    }

    form {
        box-shadow: 0 0 10px #ddd;
        padding: 20px;
        border-radius: 20px;
    }
</style>

{{-- Rights contents --}}
@section('right')
<h2>Create Article</h2>

<div class="flash-message-wrapper">
    @if (session('message'))
    <p id="message-success">{{ session('message') }} <a href="/admin/articles" class="link-to-manage">Go Manage</a></p>
    @endif

    {{-- Show error message --}}
    {{-- @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="color: red;">{{ $error }}</p>
    @endforeach
    @endif --}}
    {{-- end error --}}
</div>

<form action="/admin/articles" method="POST" autocomplete="off">
    @csrf
    {{-- cross site request fogery --}}

    {{ method_field('POST') }}

    <div class="form-group">
        <input type="text" name="title" id="txtTitle" class="form-control" placeholder="Enter title" value="{{old('title')}}" />
        @error('title')
        <p class="error-fields">{{$message}}</p>
        @enderror
    </div>
    <!-- 
        <div class="form-group">
            <input type="text"
                name="email"
                id="txtemail"
                value="{{old('email')}}"
                class="form-control"
                placeholder="Enter email"
            />
            @error('email')
                <p class="error-fields">{{$message}}</p>
            @enderror
        </div>  -->
    <div class="form-group">
        <input type="text" name="age" id="txtAge" value="{{old('age')}}" class="form-control" placeholder="Enter age" />
        @error('age')
        <p class="error-fields">{{$message}}</p>
        @enderror
    </div>
    <!-- <div class="form-group">
            <input
                type="text"
                name="url"
                id="txturl"
                class="form-control"
                placeholder="Url"
                value="{{old('url')}}"
    />
    @error('url')
    <p class="error-fields">{{$message}}</p>
    @enderror
    </div>  -->

    <div class="form-group">
        <textarea type="text" name="description" id="txtDescription" class="form-control" placeholder="Description" rows="20">{{old('description')}}</textarea>
        @error('description')
        <p class="error-fields">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <select name="published" id="">
            <option value="0">Only me</option>
            <option value="1">Public</option>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" class="btn-submit" name="btnSubmit" id="btnSubmit" value="Add">
    </div>
    </table>
</form>
@endsection
{{-- end right content --}}