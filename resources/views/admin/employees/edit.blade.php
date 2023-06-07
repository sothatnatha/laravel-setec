@extends('admin.layouts.master')
@section('title', 'Employees | Edit')

{{-- Rights contents --}}
@section('right')
    <h2>Edit Employees</h2>
    <form action="/employees" method="POST">
        @csrf
        {{-- cross site request fogery --}}
        <table cellpadding="10px">
            <tr>
                <td><label for="forempname">Name: </label></td>
                <td><input type="text" name="txtEmpName" id="txtEmpName" placeholder="Enter name"></td>

            </tr>
            <tr>
                <td><label for="forgender">Choose Gender: </label></td>
                <td>
                    <select name="txtGender">
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="forposition">Position: </label></td>
                <td><input type="text" name="txtEmpPosition" id="txtEmpPosition" placeholder="Enter Position"></td>

            </tr>

            <tr>
                <td><label for="fordept">Choose departments: </label></td>
                <td>
                    <select name="txtDept">
                        <option value="it">IT</option>
                        <option value="marketing">Marketing</option>
                        <option value="sale">Sale</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="forHired_date">Hired Date</label></td>
                <td>
                    <input type="date" name="hired_date" id="txt_hired+date">
                </td>
            </tr>
            <br>
            <tr>
                <td colspan="2">
                    <input type="submit" name="btnSubmit" id="btnSubmit" value="Save Changes">
                </td>
            </tr>
        </table>
    </form>
@endsection
{{-- end right content --}}

