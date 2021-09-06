@extends('layouts.login')

@section('title', 'Blank')

@section('content')

    @foreach($data as $data)
        <table>
            <thead>
            <tr>
                <th rowspan="2">Profile Picture</th>
                <th rowspan="2" width="400">First Name</th>
                <th rowspan="2">Middle Name</th>
                <th rowspan="2">Last Name</th>
                <th rowspan="2">Date of Birth</th>
                <th rowspan="2">Civil Status</th>
                <th rowspan="2">Gender</th>
                <th rowspan="2">Land line</th>
                <th rowspan="2">Mobile</th>
                <th rowspan="2">TIN ID#</th>
                <th rowspan="2">SSS/GSIS #</th>
                <th rowspan="2">Educational Attainment</th>
                <th colspan="{{ sizeof($data->borrower->profile->secondary_info) }}">Secondary Information</th>
                <th colspan="{{ sizeof($data->borrower->profile->spouse_comaker_info) }}">Spouse / Co-Maker Information</th>
                <th colspan="{{ sizeof($data->borrower->profile->farming_info) }}">Farming Info</th>
                <th colspan="{{ sizeof($data->borrower->profile->employment_info[0][2]) }}">Employment Info</th>
                <th colspan="{{ sizeof($data->borrower->profile->income_asset_info) }}">Income / Asset Info</th>
            </tr>
            <tr>
                @foreach($data->borrower->profile->secondary_info as $sInfo)
                <th>{{ $sInfo[1] }}</th>
                @endforeach
                @foreach($data->borrower->profile->spouse_comaker_info as $sInfo)
                <th>{{ $sInfo[1] }}</th>
                @endforeach
                @foreach($data->borrower->profile->farming_info as $sInfo)
                <th>{{ $sInfo[1] }}</th>
                @endforeach
                @foreach(array_slice($data->borrower->profile->employment_info[0][2], 1) as $sInfo)
                <th>{{ $sInfo[1] }}</th>
                @endforeach
                @foreach($data->borrower->profile->income_asset_info as $sInfo)
                <th>{{ $sInfo[1] }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><img src="{!! base64ImageToFile($data->borrower->profile->image) !!}" alt=""></td>
                <td>{{ $data->borrower->profile->first_name }}</td>
                <td>{{ $data->borrower->profile->middle_name }}</td>
                <td>{{ $data->borrower->profile->last_name }}</td>
                <td>{{ $data->borrower->profile->dob }}</td>
                <td>{{ $data->borrower->profile->civil_status }}</td>
                <td>{{ $data->borrower->profile->gender }}</td>
                <td>{{ $data->borrower->profile->landline }}</td>
                <td>{{ $data->borrower->profile->mobile }}</td>
                <td>{{ $data->borrower->profile->tin }}</td>
                <td>{{ $data->borrower->profile->sss_gsis }}</td>
                <td>{{ $data->borrower->profile->education }}</td>
                @foreach($data->borrower->profile->secondary_info as $sInfo)
                <td>{{ $sInfo[2] }}</td>
                @endforeach
                @foreach($data->borrower->profile->spouse_comaker_info as $sInfo)
                <td>{{ $sInfo[2] }}</td>
                @endforeach
                @foreach($data->borrower->profile->farming_info as $sInfo)
                <td>{{ $sInfo[2] }}</td>
                @endforeach
                @foreach(array_slice($data->borrower->profile->employment_info[0][2], 1) as $sInfo)
                <td>{{ $sInfo[2] }}</td>
                @endforeach
                @foreach($data->borrower->profile->income_asset_info as $sInfo)
                <td>{{ $sInfo[2] }}</td>
                @endforeach
            </tr>
            </tbody>
        </table>
    @endforeach


{{--    <table>--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th rowspan="2">Profile Picture</th>--}}
{{--            <th rowspan="2" width="400">First Name</th>--}}
{{--            <th rowspan="2">Middle Name</th>--}}
{{--            <th rowspan="2">Last Name</th>--}}
{{--            <th rowspan="2">Date of Birth</th>--}}
{{--            <th rowspan="2">Civil Status</th>--}}
{{--            <th rowspan="2">Gender</th>--}}
{{--            <th rowspan="2">Land line</th>--}}
{{--            <th rowspan="2">Mobile</th>--}}
{{--            <th rowspan="2">TIN ID#</th>--}}
{{--            <th rowspan="2">SSS/GSIS #</th>--}}
{{--            <th rowspan="2">Educational Attainment</th>--}}
{{--            <th colspan="{{ sizeof($data[0]->borrower->profile->secondary_info) }}">Secondary Information</th>--}}
{{--            <th colspan="{{ sizeof($data[0]->borrower->profile->spouse_comaker_info) }}">Spouse / Co-Maker Information</th>--}}
{{--            <th colspan="{{ sizeof($data[0]->borrower->profile->farming_info) }}">Farming Info</th>--}}
{{--            <th colspan="{{ sizeof($data[0]->borrower->profile->employment_info[0][2]) }}">Employment Info</th>--}}
{{--            <th colspan="{{ sizeof($data[0]->borrower->profile->income_asset_info) }}">Employment Info</th>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            @foreach($data[0]->borrower->profile->secondary_info as $sInfo)--}}
{{--                <th>{{ $sInfo[1] }}</th>--}}
{{--            @endforeach--}}
{{--            @foreach($data[0]->borrower->profile->spouse_comaker_info as $sInfo)--}}
{{--                <th>{{ $sInfo[1] }}</th>--}}
{{--            @endforeach--}}
{{--            @foreach($data[0]->borrower->profile->farming_info as $sInfo)--}}
{{--                <th>{{ $sInfo[1] }}</th>--}}
{{--            @endforeach--}}
{{--            @foreach(array_slice($data[0]->borrower->profile->employment_info[0][2], 1) as $sInfo)--}}
{{--                <th>{{ $sInfo[1] }}</th>--}}
{{--            @endforeach--}}
{{--            @foreach($data[0]->borrower->profile->income_asset_info as $sInfo)--}}
{{--                <th>{{ $sInfo[1] }}</th>--}}
{{--            @endforeach--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($data as $datas)--}}
{{--            <tr>--}}
{{--                <td><img src="{!! base64ImageToFile($datas->borrower->profile->image) !!}" alt=""></td>--}}
{{--                <td>{{ $datas->borrower->profile->first_name }}</td>--}}
{{--                <td>{{ $datas->borrower->profile->middle_name }}</td>--}}
{{--                <td>{{ $datas->borrower->profile->last_name }}</td>--}}
{{--                <td>{{ $datas->borrower->profile->dob }}</td>--}}
{{--                <td>{{ $datas->borrower->profile->civil_status }}</td>--}}
{{--                <td>{{ $datas->borrower->profile->gender }}</td>--}}
{{--                <td>{{ $datas->borrower->profile->landline }}</td>--}}
{{--                <td>{{ $datas->borrower->profile->mobile }}</td>--}}
{{--                <td>{{ $datas->borrower->profile->tin }}</td>--}}
{{--                <td>{{ $datas->borrower->profile->sss_gsis }}</td>--}}
{{--                <td>{{ $datas->borrower->profile->education }}</td>--}}
{{--                @foreach($datas->borrower->profile->secondary_info as $sInfo)--}}
{{--                    <td>{{ $sInfo[2] }}</td>--}}
{{--                @endforeach--}}
{{--                @foreach($datas->borrower->profile->spouse_comaker_info as $sInfo)--}}
{{--                    <td>{{ $sInfo[2] }}</td>--}}
{{--                @endforeach--}}
{{--                @foreach($datas->borrower->profile->farming_info as $sInfo)--}}
{{--                    <td>{{ $sInfo[2] }}</td>--}}
{{--                @endforeach--}}
{{--                @foreach(array_slice($datas->borrower->profile->employment_info[0][2], 1) as $sInfo)--}}
{{--                    <td>{{ $sInfo[2] }}</td>--}}
{{--                @endforeach--}}
{{--                @foreach($datas->borrower->profile->income_asset_info as $sInfo)--}}
{{--                    <td>{{ $sInfo[2] }}</td>--}}
{{--                @endforeach--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}

@endsection


@section('scripts')
    <script>
        $(document).ready(function(){
            clearDom();
            function clearDom(){
                $('.footable').empty();
            }
        });
    </script>
@endsection




