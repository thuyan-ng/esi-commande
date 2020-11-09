@extends('canvas')

@section('title', 'Groupes')
@section('description', 'Liste des différents groupes')
@section('content')

<div id="#group-div">
    <form action="/groups/show">
    <label for="groups">Choisissez un groupe:</label>

    <select name="groups" id="groups">
        @foreach ($groups as $group)
        <option value="{{$group->id}}">{{$group->id}}</option>
        @endforeach
    </select>
    </br>
    <button type="submit" id="submit">Confirmer</button>
    </form>
</div>

</script>

@endsection