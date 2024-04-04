<template>
  <div>
    <nav class="navbar navbar-expand navbar-light bg-light">
      <div class="nav navbar-nav">
         
          
          <router-link to="/CrearItems" class="nav-link">Agregar Pastel</router-link> 
          <router-link to="/ListarItems" class="nav-link">Stock Pasteles</router-link>
          <router-link to="/CrearIngrediente" class="nav-link">Agregar Ingrediente</router-link>
          <router-link to="/ListarIngrediente" class="nav-link">Stock Ingredientes</router-link>
          <router-link to="/AsignarIngredientes" class="nav-link">Asignar Ingredientes</router-link>

      </div>
  </nav>
 
  <br>
   <router-view/>
</div>

</template>
 
