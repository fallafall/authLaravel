@extends('clients.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-center">
                <h2> Liste des clients</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('clients.create') }}">Ajouter un client</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Numéro</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($clients as $client)
        <tr>
            <td>{{ $client->id}}</td>
            <td>{{ $client->nom}}</td>
            <td>{{ $client->prenom}}</td>
            <td>{{ $client->numero}}</td>
            <td>
                <form action="{{ route('clients.destroy',$client->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('clients.show',$client->id) }}">voir</a>
    
                    <a class="btn btn-primary" href="{{ route('clients.edit',$client->id) }}">edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
      
@endsection
