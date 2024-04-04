

<template>
    <div class="container">
        
      <router-link to="/CrearItems" class="btn btn-success">Agregar Nuevo</router-link>
      <div class="card">
        <div class="card-header">
          Pasteles
        </div>
        <div class="card-body">
         <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Preparado por</th>
              <th>Fecha Creacion</th>
              <th>Fecha Vencimiento</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="pastel in pasteles" :key="pastel.id_pastel">
              <td>{{ pastel.id_pastel }}</td>
              <td>{{ pastel.nombre }}</td>
              <td>{{ pastel.descripcion }}</td>
              <td>{{ pastel.preparado_por }}</td>
              <td>{{ pastel.fecha_creacion }}</td>
              <td>{{ pastel.fecha_vencimiento }}</td>
              <td>

                <div class="btn-group" role="group" aria-label="">
                  
                 

                  <router-link :to="{name:'EditarItems', params:{id:pastel.id_pastel}}" class="btn btn-info">Editar</router-link>
                  <button type="button" v-on:click="borrarPastel(pastel.id_pastel)" class="btn btn-warning">Borrar</button>
                  
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
  pasteles:[]
}

  },
   created:function(){
    this.consultarPasteles();
   },


   methods:{
consultarPasteles(){
    fetch('http://localhost/pasEcosaba/backend/?consultar_all')
    .then(respuesta =>respuesta.json())
    .then((datosRespuesta)=>{

  console.log(datosRespuesta);

this.pasteles=[]  
if(typeof datosRespuesta[0].success==='undefined')
{
this.pasteles=datosRespuesta;
}
   
   
} )

.catch(console.log);
},



borrarPastel(id){
  console.log(id);

  fetch('http://localhost/pasEcosaba/backend/?borrar='+id)
    .then(respuesta =>respuesta.json())
    .then((datosRespuesta)=>{

  console.log(datosRespuesta);
window.location.href="ListarItems"
   
} )

.catch(console.log);


}
}
}
</script>
  
