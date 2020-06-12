<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>States</title>
</head>
<body>

@php $count = 0 @endphp

@foreach($countries as $country)

    <?php $states = \App\State::states($country->iso3); ?>
    @foreach($states as $key=>$state)
        DB::table('states')->updateOrInsert(['id' => {{ $count }}], [<br>
        'name'       => '{{ str_replace("'","",$state) }}',<br>
        'iso2'       => '{{ $key }}',<br>
        'code'       => '{{ $country->code }}-{{ $key }}',<br>
        'country_id' => {{ $country->country_id }},<br>
        'created_at' => Carbon::now(),<br>
        ]);<br>
        <br>
        @php $count++; @endphp
    @endforeach

@endforeach

</body>
</html>
