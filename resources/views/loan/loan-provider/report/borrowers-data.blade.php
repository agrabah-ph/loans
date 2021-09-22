<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        @foreach($data as $data)
        <thead>
        <tr>
            <th style="text-align: center; font-weight: bold; background: #b8bdc2;" rowspan="2">Profile Picture</th>
            <th style="text-align: center; font-weight: bold; background: #b8bdc2;" rowspan="2">First Name</th>
            <th style="text-align: center; font-weight: bold; background: #b8bdc2;" rowspan="2">Middle Name</th>
            <th style="text-align: center; font-weight: bold; background: #b8bdc2;" rowspan="2">Last Name</th>
            <th style="text-align: center; font-weight: bold; background: #b8bdc2;" rowspan="2">Date of Birth</th>
            <th style="text-align: center; font-weight: bold; background: #b8bdc2;" rowspan="2">Civil Status</th>
            <th style="text-align: center; font-weight: bold; background: #b8bdc2;" rowspan="2">Gender</th>
            <th style="text-align: center; font-weight: bold; background: #b8bdc2;" rowspan="2">Land line</th>
            <th style="text-align: center; font-weight: bold; background: #b8bdc2;" rowspan="2">Mobile</th>
            <th style="text-align: center; font-weight: bold; background: #b8bdc2;" rowspan="2">TIN ID#</th>
            <th style="text-align: center; font-weight: bold; background: #b8bdc2;" rowspan="2">SSS/GSIS #</th>
            <th style="text-align: center; font-weight: bold; background: #b8bdc2;" rowspan="2">Educational Attainment</th>
            <th style="text-align: center; font-weight: bold; background: #82878c;" colspan="{{ sizeof($data->borrower->profile->secondary_info) }}">Secondary Information</th>
            <th style="text-align: center; font-weight: bold; background: #b8bdc2;" colspan="{{ sizeof($data->details->spouse_comaker_info) }}">Spouse / Co-Maker Information</th>
            <th style="text-align: center; font-weight: bold; background: #82878c;" colspan="{{ sizeof($data->details->farming_info) }}">Farming Info</th>
            <th style="text-align: center; font-weight: bold; background: #b8bdc2;" colspan="{{ sizeof($data->details->employment_info[0][2]) -1 }}">Employment Info</th>
            <th style="text-align: center; font-weight: bold; background: #82878c;" colspan="{{ sizeof($data->details->income_asset_info) }}">Income / Asset Info</th>
        </tr>
        <tr style="background: #0a0a0a;">
            @foreach($data->borrower->profile->secondary_info as $sInfo)
                <th style="text-align: center; background: #82878c;">{{ $sInfo[1] }}</th>
            @endforeach
            @foreach($data->details->spouse_comaker_info as $sInfo)
                <th style="text-align: center; background: #b8bdc2;">{{ $sInfo[1] }}</th>
            @endforeach
            @foreach($data->details->farming_info as $sInfo)
                <th style="text-align: center; background: #82878c;">{{ $sInfo[1] }}</th>
            @endforeach
            @foreach(array_slice($data->details->employment_info[0][2], 1) as $sInfo)
                <th style="text-align: center; background: #b8bdc2;">{{ $sInfo[1] }}</th>
            @endforeach
            @foreach($data->details->income_asset_info as $sInfo)
                <th style="text-align: center; background: #82878c;">{{ $sInfo[1] }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><img src="{!! base64ImageToFile($data->borrower->profile->image) !!}" alt=""></td>
            <td style="vertical-align:top;">{{ $data->borrower->profile->first_name }}</td>
            <td style="vertical-align:top;">{{ $data->borrower->profile->middle_name }}</td>
            <td style="vertical-align:top;">{{ $data->borrower->profile->last_name }}</td>
            <td style="vertical-align:top;">{{ $data->borrower->profile->dob }}</td>
            <td style="vertical-align:top;">{{ $data->borrower->profile->civil_status }}</td>
            <td style="vertical-align:top;">{{ $data->borrower->profile->gender }}</td>
            <td style="vertical-align:top;">{{ $data->borrower->profile->landline }}</td>
            <td style="vertical-align:top;">{{ $data->borrower->profile->mobile }}</td>
            <td style="vertical-align:top;">{{ $data->borrower->profile->tin }}</td>
            <td style="vertical-align:top;">{{ $data->borrower->profile->sss_gsis }}</td>
            <td style="vertical-align:top;">{{ $data->borrower->profile->education }}</td>
            @foreach($data->borrower->profile->secondary_info as $sInfo)
                <td style="vertical-align:top; text-align: center;">
                    @if($sInfo[0] == 'dependents')
                        <ul>
                            @foreach($sInfo[2] as $dependent)
                                <li>
                                    <ul>
                                        <li>{{ $dependent[0] }}</li>
                                        <li>{{ $dependent[1] }}</li>
                                    </ul>
                                </li>
                            @endforeach
                        </ul>

                    @else
                        {{ $sInfo[2] }}
                    @endif
                </td>
            @endforeach
            @foreach($data->details->spouse_comaker_info as $sInfo)
                <td style="vertical-align:top; text-align: center;">{{ $sInfo[2] }}</td>
            @endforeach
            @foreach($data->details->farming_info as $sInfo)
                <td style="vertical-align:top; text-align: center;">{{ $sInfo[2] }}</td>
            @endforeach
            @foreach(array_slice($data->details->employment_info[0][2], 1) as $sInfo)
                <td style="vertical-align:top; text-align: center;">{{ $sInfo[2] }}</td>
            @endforeach
            @foreach($data->details->income_asset_info as $sInfo)
                <td style="vertical-align:top; text-align: center;">&#8369; {{ number_format($sInfo[2], 2) }}</td>
            @endforeach
        </tr>
        </tbody>
        @endforeach
    </table>
</body>
</html>
