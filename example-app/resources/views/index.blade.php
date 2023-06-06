@extends('base')

@section('contenido')
<style>
table {
  border-collapse: collapse;
}
tr {
  border: 1px solid black;
}
</style>
<div >
  <div>
    <div>
      <h2>CRUD</h2>
    </div>
    <div>
      <!--------------- create form ------------->
      <form action="{{route('tasks.store')}}" method="POST">
        @csrf
        <div style="display:flex"> 
          <div>
            Tarea
            <input type="text" name="tarea" placeholder="Tarea" >
          </div>
          <div>
            <strong>Estado:</strong>
            <select name="estado">
              <option value="">-- Elige el status --</option>
              <option value="pendiente">Pendiente</option>
              <option value="completada">Completada</option>
            </select>
          </div>
          <div >
            <button type="submit">Crear</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  {{-- mostras success --}}
  @if (Session::get("success"))
    <div>
      {{Session::get("success")}}
    </div>
  @endif

  {{-- mostrar errores --}}
  @if ($errors->any())
    <div>
        <strong>Error</strong><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  <!--------------- table task ------------->
  <div >
    <table>
      <tr>
        <th>Tarea</th>
        <th>Estado</th>
        <th>Acciones</th>
      </tr>
      @foreach ($tasks as $task)
        <tr>
          <td>{{$task->tarea}}</td>
          <td>{{$task->estado}}</td>
          <td style="display:flex " >
            <a href="tasks/{{$task->id}}/edit"><button type="button" >Editar</button></a>
            <form action="{{route("tasks.destroy", $task)}}" method="post" class="d-inline">
              @csrf
              @method("DELETE")
              <button type="submit" >Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection