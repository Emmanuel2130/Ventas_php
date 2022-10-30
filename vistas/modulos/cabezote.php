<header class="menu-navegacion">
        <a href="dashboard">
        
            <h1 class="titulo">Reportes</h1>
        </a>
        <nav class="navegacion">
            <a href="ventas">Ventas </a>
            <a href="productos">Productos</a>
            <!-- <a href="clientes">Clientes</a>
            <a href="empleado">Empleados</a> -->
        </nav>
        <div class="dropdown">
<button class="btn btn-primary dropdown-toggle" type="button" id="about-us" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<?= $_SESSION['nombre'] ?>

</button>
<ul class="dropdown-menu" aria-labelledby="about-us">
<li><a href="salir">Salir</a></li>
</ul>
</div>
    </header>