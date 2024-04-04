<template>
    <div>
        
      <div class="container">
          
          <div class="card">
            <div class="card-header">
              Editar datos de Pastel
            </div>
            <div class="card-body">
              <form v-on:submit.prevent="actualizarRegistro">
                  <div class="form-group">
                    <label for="nombre">Nombre: </label>
                    <input type="text"
                      class="form-control" required name="nombre" v-model="pastel.nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
                    <small id="helpId" class="form-text text-muted">Escribe el nombre del pastel</small>
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text"
                      class="form-control" required name="descripcion" v-model="pastel.descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion">
                    <small id="helpId" class="form-text text-muted">Agrega una descripcion del pastel</small>
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="preparado_por">Preparado por:</label>
                    <input type="text"
                      class="form-control" required name="preparado_por" v-model="pastel.preparado_por" id="preparado_por" aria-describedby="helpId" placeholder="Preparador por:">
                    <small id="helpId" class="form-text text-muted">Nombre del Chef</small>
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="fecha_creacion">Fecha de Creación</label>
                    <input type="date"
                      class="form-control" required name="fecha_creacion" v-model="pastel.fecha_creacion" id="fecha_creacion" aria-describedby="helpId" placeholder="Fecha de Creación">
                    <small id="helpId" class="form-text text-muted">Escriba la fecha de creación</small>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="fecha_vencimiento">Fecha Vencimiento</label>
                      <input type="date"
                        class="form-control" required name="fecha_vencimiento" v-model="pastel.fecha_vencimiento" id="fecha_vencimiento" aria-describedby="helpId" placeholder="Fecha Vencimiento">
                      <small id="helpId" class="form-text text-muted">Escribe la fecha de vencimiento</small>
                      </div>
                      <br>
                        <div class="btn-group" role="group" aria-label="">

                          <button type="submit" class="btn btn-success">Modificar</button>
                   
                         <router-link :to="{name:'ListarItems'}" class="btn btn-warning">Cancelar</router-link>


                        </div>

              </form>

            </div>
            
          </div>

  </div>    

    </div>
</template>

<script>
export default {
  data(){
return {

  pastel:{}
}
},
created:function(){
this.obtenerInformacionID();
},
methods:{

  obtenerInformacionID(){
   
    fetch('http://localhost/pasEcosaba/backend/?consultar='+this.$route.params.id)
    .then(respuesta =>respuesta.json())
    .then((datosRespuesta)=>{

  console.log(datosRespuesta);
this.pastel=datosRespuesta[0];

   
   
} )

.catch(console.log);


  }
  ,actualizarRegistro(){

    var datosEnviar ={id:this.$route.params.id,nombre:this.pastel.nombre, descripcion:this.pastel.descripcion, preparado_por:this.pastel.preparado_por, fecha_creacion:this.pastel.fecha_creacion, fecha_vencimiento:this.pastel.fecha_vencimiento}
fetch('http://localhost/pasEcosaba/backend/?actualizar='+this.$route.params.id,{

  method:"POST",
  body:JSON.stringify(datosEnviar)
}  )


.then(respuesta => respuesta.json())
.then((datosRespuesta=>{

  console.log(datosRespuesta);
  window.location.href='../listaritems'
}))
    




  }



}


}
</script>