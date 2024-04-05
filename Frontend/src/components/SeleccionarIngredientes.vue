<template>
  <div>
   <div v-if="mensajeExito" class="alert alert-success" role="alert">
     ¡El elemento se agregó exitosamente!
   </div>
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
 
     

   
       
   <div class="container">
    <router-link to="/CrearIngrediente" class="btn btn-success">Agregar Stock</router-link>
    <router-link to="/AsignarIngredientes" class="btn btn-primary">Regresar Pasteles</router-link>
       <div class="card">
         <div class="card-header">
           Seleccione sus ingredientes
         </div>
         <div class="card-body">
          <table class="table">
           <thead>
             <tr>
               <th>ID</th>
               <th>Nombre</th>
               <th>Descripcion</th>
              <th>Fecha Ingreso</th>
               <th>Fecha Vencimiento</th>
               <th>Acciones</th>
             </tr>
           </thead>
           <tbody>
             <tr v-for="ingrediente in ingredientes" :key="ingrediente.id_ingrediente">
               <td>{{ ingrediente.id_ingrediente }}</td>
               <td>{{ ingrediente.nombre }}</td>
               <td>{{ ingrediente.descripcion }}</td>
               <td>{{ ingrediente.fecha_ingreso }}</td>
               <td>{{ ingrediente.fecha_vencimiento }}</td>
               <td>
 
                 <div class="btn-group" role="group" aria-label="">
                   
                   <button  class="btn btn-success" @click="agregarRegistro(this.$route.params.id,ingrediente.id_ingrediente)">Agregar</button>
 
                   
                   
                 </div>
                 
               </td>
             </tr>
             
           </tbody>
          </table>
 
 
 
         </div>
         
       </div>
 
 
 
 </div>

</div> 

</template>

<script>
export default {
 data(){
return {
   mensajeExito: false,
ingredientes:[],
 pastel:{}
}
},
created:function(){
this.obtenerInformacionID();
this.consultarIngredientes();

},
methods:{

   agregarRegistro(idpastel, idingrediente){
       console.log(idingrediente);
       console.log(idpastel)

       var datosEnviar ={id_pastel:idpastel, id_ingrediente:idingrediente}
fetch('http://localhost/pasEcosaba/backend/?insertar_pi',{

 method:"POST",
 body:JSON.stringify(datosEnviar)
 
}  )


.then(respuesta => respuesta.json())
.then(datosRespuesta=>{

 console.log(datosRespuesta);
 this.mensajeExito = true;
 setTimeout(() => {
         this.mensajeExito = false; // Restablece a false después de un tiempo determinado
       }, 3000);
 
})

.catch(error => {
       console.error('Error al agregar registro:', error);
     });

},


   consultarIngredientes(){
   fetch('http://localhost/pasEcosaba/backend/?consultar_ing_all')
   .then(respuesta =>respuesta.json())
   .then((datosRespuesta)=>{

 console.log(datosRespuesta);

this.ingredientes=[]  
if(typeof datosRespuesta[0].success==='undefined')
{
this.ingredientes=datosRespuesta;
}
  
  
} )

.catch(console.log);
},



 obtenerInformacionID(){
  
   fetch('http://localhost/pasEcosaba/backend/?consultar='+this.$route.params.id)
   .then(respuesta =>respuesta.json())
   .then((datosRespuesta)=>{

 console.log(datosRespuesta);
this.pastel=datosRespuesta[0];

  
  
} )

.catch(console.log);


 }
 ,



}


}
</script>