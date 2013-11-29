<nav>
    <ul>
    {{@foreach($links as $link)}}
        <li><a href="{{$link->href}}">{{$link->label}}</a></li>
    {{@endforeach}}
    </ul>
</nav>
