<template>
  <div>
    <nav class="navbar navbar-expand navbar-light bg-light">
      <div class="nav navbar-nav">
         
          
          <router-link to="/CrearItems" class="nav-link">Nuevo Pastel</router-link> 
          <router-link to="/ListarItems" class="nav-link">Stock Pasteles</router-link>
          <router-link to="/CrearIngrediente" class="nav-link">Nuevo Ingrediente</router-link>
          <router-link to="/ListarIngrediente" class="nav-link">Stock Ingredientes</router-link> 
          <router-link to="/AsignarIngredientes" class="nav-link">Agregar ingrediente a pasteles</router-link>
          
      </div>
  </nav>
 
  <br>
   <router-view/>
</div>

</template>
 
