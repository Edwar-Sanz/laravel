<style>
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
<div  style="display:flex; justify-content: center;"  >
<form
  style="width: 300px; min-height:300px; display:flex; flex-wrap:wrap; align-content: space-around;"
  action="{{route('tasks.update', $task)}}" method="POST">
  @csrf
  @method("PUT")
    
    <strong style="width:100%; max-height: 20px;">
      Tarea
    </strong>
    <input style="width:100%; min-height: 100px; " 
      type="text" name="tarea" placeholder="Tarea" value="{{$task->tarea}}" >
    
      <strong style="width:100%; max-height: 20px;">Estado:</strong>
      <select style="width: 100%; max-height: 40px;" name="estado">
        <option value="" >-- Elige el status --</option>
        <option value="pendiente" @selected("pendiente"==$task->estado)>Pendiente</option>
        <option value="completada" @selected("completada"==$task->estado)>Completada</option>
      </select>
    
    
      <button class="button-16" type="submit">Actualizar</button>
      <button class="button-16" type="submit">Volver</button>
    
  
</form>
</div>