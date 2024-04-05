<template>
    <div class="container">
        
      <router-link to="/AsignarIngredientes" class="btn btn-success">Agregar</router-link>
      <div class="card">
        <div class="card-header">
          Ingredientes
        </div>
        <div class="card-body">
         <table class="table">
          <thead>
            <tr>
             <th>Nombre Ingrediente</th>
              <th>Detalle Ingrediente</th>
             <th>Fecha Ingreso</th>
              <th>Fecha Vencimiento</th>
             
            </tr>
          </thead>
          <tbody>
            <tr v-for="ingrediente in ingredientes" :key="ingrediente.id_ingrediente">
              
              <td>{{ ingrediente.nombre_ingrediente }}</td>
              <td>{{ ingrediente.detalle_ingrediente }}</td>
              <td>{{ ingrediente.fecha_ingreso }}</td>
              <td>{{ ingrediente.fecha_vencimiento }}</td>
              

                                
            
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
    console.log(this.$route.params.id)
    fetch('http://localhost/pasEcosaba/backend/?detalle='+this.$route.params.id)
    .then(respuesta =>respuesta.json())
    .then((datosRespuesta)=>{

  console.log(datosRespuesta);
console.log(this.ingredientes.nombre)
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
  