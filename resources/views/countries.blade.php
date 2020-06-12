<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Countries</title>
</head>
<body>
@foreach($countries as $country)

    DB::table('countries')->updateOrInsert(['iso2' => '{{ $country->code }}'], [ <br>
    'name'           => '{{ str_replace("'","",$country->name) }}',<br>
    'iso2'           => '{{ $country->code }}',<br>
    'code'           => '{{ $country->iso3 }}',<br>
    'continent_name' => '{{ $country->continent->name }}',<br>
    @if($country->continent_code == 'EU')
        'eu'             => true,<br>
    @else
        'eu'             => false,<br>
    @endif
    'created_at'     => Carbon::now(),<br>
    ]);<br>
    <br>
@endforeach
</body>
</html>
