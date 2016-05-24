@extends('app')

@section('content')
    <table>
        @foreach($roles as $rol)
        <tr>
            <td>{{ $rol->nombre }}</td>
        </tr>
        @endforeach
    </table>
@endsection