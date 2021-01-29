@extends('admin.master')

@section('body')

    <form action="{{url('/update-order')}}" method="POST">
        <table border="1" cellpadding="20px">
            <tr>
                <td>order status</td>
                <td>
                    <select>
                        <option>Pending</option>
                        <option>Cancle</option>
                        <option>Successfull</option>
                    </select>
                    <input type="hidden" name="id" value="{{}}"/>

                </td>
            </tr>

            <tr>
                <td>payment status</td>
                <td>
                    <select>
                        <option>Pending</option>
                        <option>Cancle</option>
                        <option>Successfull</option>
                    </select>

                </td>
            </tr>

            <tr>
                <td>Order status</td>
                <td>

                    <input type="submit" name="btn" value="Update Order"/>
                </td>

            </tr>
        </table>
    </form>



@endsection


