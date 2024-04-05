<template>
   <div>
        
        <div class="container">
            
            <div class="card">
              <div class="card-header">
                Pastel Seleccionado
              </div>
              <div class="card-body">
                <form v-on:submit.prevent="actualizarRegistro">
                    <div class="form-group" style="pointer-events: none;">
                      <label for="nombre">Nombre: </label>
                      <input type="text"
                        class="form-control" required name="nombre" v-model="pastel.nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
                      <small id="helpId" class="form-text text-muted"></small>
                    </div>
                    <br>
                    <div class="form-group" style="pointer-events: none;">
                      <label for="descripcion">Descripcion</label>
                      <input type="text"
                        class="form-control" required name="descripcion" v-model="pastel.descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion">
                      <small id="helpId" class="form-text text-muted"></small>
                    </div>
                    
                          <div class="btn-group" role="group" aria-label="">
  
                             
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