@extends('base')

@section('contenido')
<style>
table {
  border-collapse: collapse;
  width: 90%;
}
tr {
  border: 1px solid black;
}
td{
  padding: 8px;
}
.createform{
  /* background-color: red; */
  display: flex;
  flex-wrap: wrap;
  margin: 15px;
  justify-content: space-around;
  align-items: center;
  min-height: 65px;
  /* width: 90%; */
}
.createitem{
  /* background-color: yellow; */
  display: flex;
  flex-direction: column;
  width: 50%;
  min-width: 300px;
  border: 1px solid #f8f9fa;
}
.entrada{
  border-radius: 6px;
}
.button-16 {
  background-color: #f4f4f4;
  border: 1px solid #f8f9fa;
  border-radius: 4px;
  color: #3c4043;
  cursor: pointer;
  font-family: arial,sans-serif;
  font-size: 14px;
  height: 36px;
  line-height: 27px;
  min-width: 54px;
  padding: 0 16px;
  text-align: center;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: pre;
  margin: 1px;
  min-height: 45px;
}

.button-16:hover {
  border-color: #dadce0;
  box-shadow: rgba(0, 0, 0, .1) 0 1px 1px;
  color: #202124;
}

.button-16:focus {
  border-color: #4285f4;
  outline: none;
}
</style>


<div style="display:flex; flex-direction: column; " >
  
  
  <div style="display: flex; justify-content: center;" >
    <!--------------- create form ------------->
    <form action="{{route('tasks.store')}}" method="POST">
      @csrf
      <div class="createform"> 
        <div class="createitem">
          <strong>Tarea</strong>
          <input class="entrada" type="text" name="tarea" placeholder="Tarea" >
        </div>
        <div class="createitem">
          <strong>Estado:</strong>
          <select class="entrada" name="estado">
            <option value="">-- Elige el status --</option>
            <option value="pendiente">Pendiente</option>
            <option value="completada">Completada</option>
          </select>
        </div>
        <div style="width: 60%">
          <button class="button-16" style="width: 100%" type="submit">Crear</button>
        </div>
      </div>
    </form>
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
  <div style="display: flex; justify-content: center;" >
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
            <a href="tasks/{{$task->id}}/edit"><button class="button-16" type="button" >Editar</button></a>
            <form action="{{route("tasks.destroy", $task)}}" method="post" class="d-inline">
              @csrf
              @method("DELETE")
              <button class="button-16" type="submit" >Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection