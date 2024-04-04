
<template>
    <div>
      <h2>Lista de Pasteles</h2>
      <ul>
        <li v-for="pastel in pasteles" :key="pastel.id">
          {{ pastel.nombre }}
          
          <button >Asignar Ingredientes</button>
      


         
        </li>
      </ul>
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
    console.log();
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


asignarIngredientes(idPastel) {
      this.$router.push({ name: 'SeleccionarIngredientes', params: { idPastel } });
    }
  }



}
  </script>
