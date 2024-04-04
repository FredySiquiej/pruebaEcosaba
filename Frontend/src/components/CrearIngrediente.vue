<template>
    <div class="container">
            
            <div class="card">
              <div class="card-header">
                Nuevo Ingrediente
              </div>
              <div class="card-body">
                <form v-on:submit.prevent="agregarRegistro">
                    <div class="form-group">
                      <label for="nombre">Nombre: </label>
                      <input type="text"
                        class="form-control" required name="nombre" v-model="ingrediente.nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
                      <small id="helpId" class="form-text text-muted">Escribe el nombre del ingrediente</small>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="descripcion">Descripcion</label>
                      <input type="text"
                        class="form-control" required name="descripcion" v-model="ingrediente.descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion">
                      <small id="helpId" class="form-text text-muted">Agrega una descripcion del ingrediente</small>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="fecha_ingreso">Fecha de ingreso</label>
                      <input type="date"
                        class="form-control" required name="fecha_creacion" v-model="ingrediente.fecha_ingreso" id="fecha_creacion" aria-describedby="helpId" placeholder="Fecha de Ingreso">
                      <small id="helpId" class="form-text text-muted">Escriba la fecha de ingreso</small>
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="fecha_vencimiento">Fecha Vencimiento</label>
                        <input type="date"
                          class="form-control" required name="fecha_vencimiento" v-model="ingrediente.fecha_vencimiento" id="fecha_vencimiento" aria-describedby="helpId" placeholder="Fecha Vencimiento">
                        <small id="helpId" class="form-text text-muted">Escribe la fecha de vencimiento</small>
                        </div>
                        <br>
                          <div class="btn-group" role="group" aria-label="">

                            <button type="submit" class="btn btn-success">Agregar</button>
                            <router-link :to="{name:'ListarIngrediente'}" class="btn btn-warning">Cancelar</router-link>
                          </div>
  
                </form>
  
              </div>
              
            </div>
  
    </div>
  </template>
  
  <script>
  export default {
    data(){
  return {
  
    ingrediente:{}
  }
  
    } ,
    methods:{
      agregarRegistro(){
        console.log(this.ingrediente);
  var datosEnviar ={nombre:this.ingrediente.nombre, descripcion:this.ingrediente.descripcion, fecha_ingreso:this.ingrediente.fecha_ingreso, fecha_vencimiento:this.ingrediente.fecha_vencimiento}
  fetch('http://localhost/pasEcosaba/backend/?insertar_ing',{
  
    method:"POST",
    body:JSON.stringify(datosEnviar)
  }  )
  
  
  .then(respuesta => respuesta.json())
  .then((datosRespuesta=>{
  
    console.log(datosRespuesta);
    window.location.href='ListarIngrediente'
  }))
      }
  
  
    }
  
  
  
  }
  </script>