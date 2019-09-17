@extends('layouts/master')

@section('content')

@javascript(compact('pusherKey', 'clientConnectionPath', 'environment', 'openWeatherMapKey'))
<div id="dashboard">
    <dashboard class="font-sans">
        {{-- <twitter :initial-tweets="{{ json_encode($initialTweets) }}" position="a1:a16"></twitter> --}}
        <team-member name="bruno" avatar="{{ gravatar('bruno@brunolopes.com') }}" birthday="1983-05-09" position="b1:b8"></team-member>
        <team-member name="fernando" avatar="{{ gravatar('fernando@codewisebr.com') }}" birthday="1996-02-05" position="b9:b16"></team-member>
        <team-member name="natalia" avatar="{{ gravatar('natalia@codewisebr.com') }}" birthday="1992-05-25" position="b17:b24"></team-member>
        <team-member name="paulo" avatar="{{ gravatar('paulo@codewisebr.com') }}" birthday="1994-07-30" position="c1:c8"></team-member>
        <team-member name="thiago" avatar="{{ gravatar('thiago@codewisebr.com') }}" birthday="1979-09-22" position="c9:c16"></team-member>
        <team-member name="milos" avatar="{{ gravatar('milos@iseusa.org') }}" birthday="1992-05-25" position="c17:c24"></team-member>
        {{-- <tile-timer on="16:00" off="19:00">
            <trains position="a1:a24"></trains>
        </tile-timer> --}}
        <time-weather position="e1:e6" date-format="ddd DD/MM" time-zone="America/Sao_Paulo" weather-city="Bauru" hide-office-temperature="true"></time-weather>
        <time-weather position="e7:e12" date-format="ddd DD/MM" time-zone="America/New_York" weather-city="New York" hide-office-temperature="true"></time-weather>
        <time-weather position="e13:e18" date-format="ddd DD/MM" time-zone="America/Boise" weather-city="Boise" hide-office-temperature="true"></time-weather>
        <weather position="e19:e21" weather-city="Piratininga"></weather>
        <weather position="e22:e24" weather-city="Espirito Santo do Pinhal"></weather>
        {{-- <internet-connection position="e7:e10"></internet-connection> --}}
        {{-- <statistics position="d1:d10"></statistics> --}}
        {{-- <uptime position="d1:d10"></uptime> --}}
        {{-- <calendar position="e7:e16"></calendar> --}}
    </dashboard>
</div>

@endsection
