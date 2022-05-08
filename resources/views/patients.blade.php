<x-layout>
    @foreach($patients as $patient)
        <article>
            <h1>
                <a href="/patients/{{$patient->id}}">
                    {{$patient->name}}
                </a>
            </h1>

            <div>
                {{$patient->visit_reason}}
            </div>
        </article>
    @endforeach
</x-layout>
