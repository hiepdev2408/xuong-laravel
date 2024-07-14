@extends('admin.layout.master')
@section('content')
    <table>
        <thead>
            <tr>
                <th>Trường</th>
                <th>Giá trị</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($model->toArray() as $key => $value)
                <tr>
                    <td>{{ $key }}</td>
                    <td>
                        @php
                            if($key == 'cover'){
                                $url = Storage::url($value);

                                echo "<img src=\"$url\" width=\"100px\">";
                            } elseif (Str::contains($key, 'is_')) {
                                echo $value ? '<span class="badge bg-primary">Yes</span>'
                                            : '<span class="badge bg-danger">No</span>';
                            } else{
                                echo $value;
                            }
                        @endphp
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
