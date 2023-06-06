
<form action="{{route('tasks.update', $task)}}" method="POST">
  @csrf
  @method("PUT")
  <div style="display:flex"> 
    <div>
      Tarea
      <input type="text" name="tarea" placeholder="Tarea" value="{{$task->tarea}}" >
    </div>
    <div>
      <strong>Estado:</strong>
      <select name="estado">
        <option value="" >-- Elige el status --</option>
        <option value="pendiente" @selected("pendiente"==$task->estado)>Pendiente</option>
        <option value="completada" @selected("completada"==$task->estado)>Completada</option>
      </select>
    </div>
    <div >
      <button type="submit">Actualizar</button>
    </div>
  </div>
</form>