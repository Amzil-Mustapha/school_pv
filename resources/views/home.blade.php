@include('layouts.header')
<main class="flex-1">
    @if (session("type")=="directeur")
        <button>
            <a href="{{Route("upload")}}">upload new file</a>
        </button>
    @endif
    
    <form action="{{Route("home")}}" method="get">
        @csrf
        <select id="selectYear" name="selectYear">
            <option id="year12" value="12">1A & 2A</option>
            <option id="year1" value="1">1A</option>
            <option id="year2" value="2">2A</option>
        </select>
        <select  id="filierSelect" name="filierSelect">
        </select>
        <button type="submit">SELECT</button>
    </form>
   

    <table class="border border-slate-900">
        <thead >
            <tr >
                <th class="border border-slate-900 w">Aspeets à Trailer</th>
                <th class="border border-slate-900">Eléments de traitement</th>
                <th class="border border-slate-900">les données</th>
                <th class="border border-slate-900">commentaires</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $aspeet_element)
                <tr class="border border-slate-900">
                    <td class="border border-slate-900" rowspan="{{count($aspeet_element["elements"])+1}}">{{$aspeet_element["aspeet"]->value}}</td>
                </tr>
                @foreach ($aspeet_element["elements"] as $element)
                    <tr class="border border-slate-900">
                        <td class="border border-slate-900">{{$element->name}}</td>
                        <td class="border border-slate-900"><input type="text" value="{{$element->value?$element->value:""}}"></td>
                        <td class="border border-slate-900"><input type="text" value="{{$element->comment?$element->comment:""}}"></td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

<script>
    
    
</script>
</main>
@include('layouts.footer')
