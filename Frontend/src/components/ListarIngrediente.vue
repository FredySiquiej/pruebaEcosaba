<template>
    <div class="container">
        
      <router-link to="/CrearIngrediente" class="btn btn-success">Agregar Nuevo</router-link>
      <div class="card">
        <div class="card-header">
          Ingredientes
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
              <td>{{ ingrediente.id_pastel }}</td>
              <td>{{ ingrediente.nombre }}</td>
              <td>{{ ingrediente.descripcion }}</td>
              <td>{{ ingrediente.fecha_ingreso }}</td>
              <td>{{ ingrediente.fecha_vencimiento }}</td>
              <td>

                <div class="btn-group" role="group" aria-label="">
                  
                 

                  <router-link :to="{name:'EditarIngrediente', params:{id:ingrediente.id_ingrediente}}" class="btn btn-info">Editar</router-link>
                  <button type="button" v-on:click="borrarIngrediente(ingrediente.id_ingrediente)" class="btn btn-warning">Borrar</button>
                  
                  
                </div>
                
              </td>
            </tr>
            
          </tbody>
         </table>



        </div>
        
      </div>



</div>


</template>

<script>
export default {
  data(){
return {
  ingredientes:[]
}

  },
   created:function(){
    this.consultarIngredientes();
   },


   methods:{
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



borrarIngrediente(id){
  console.log(id);

  fetch('http://localhost/pasEcosaba/backend/?borrar_ing='+id)
    .then(respuesta =>respuesta.json())
    .then((datosRespuesta)=>{

  console.log(datosRespuesta);
window.location.href="ListarIngrediente"
   
} )

.catch(console.log);


}
}
}
</script>
  