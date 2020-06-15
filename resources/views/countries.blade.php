<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Countries</title>
</head>
<body>
@foreach($countries as $country)
    <h4>// Country [{{ $country->name }}]</h4>

    $country = Country::updateOrCreate(['iso2' => '{{ $country->code }}'], [ <br>
    'name'           => '{{ \App\Services\FilterService::removeSpecialCharacters($country->name) }}',<br>
    'iso2'           => '{{ $country->code }}',<br>
    'code'           => '{{ $country->iso3 }}',<br>
    'continent_name' => '{{ $country->continent->name }}',<br>
    @if ($country->continent_code == 'EU')
        'eu'             => true,<br>
    @else
        'eu'             => false,<br>
    @endif
    ]);
    <br>
    <br>

    <h4>// States of [{{ $country->name }}]</h4>

    @foreach ($country->states() as $key => $state)

        @if(!empty($key) && !empty($state))
            @php $key = \App\Services\FilterService::removeSpecialCharacters($key); @endphp

            $country->states()->updateOrCreate(['iso2' => '{{  $key }}', 'code' => '{{ $country->code }}-{{ $key }}'], [
            <br>
            'name'       => '{{ \App\Services\FilterService::removeSpecialCharacters($state) }}',<br>
            'iso2'       => '{{ $key }}',<br>
            'code'       => '{{ $country->code }}-{{ $key }}',<br>
            ]); <br>

            <br>
        @endif
    @endforeach

    <br>
@endforeach
</body>
</html>
