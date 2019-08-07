<ul class="list-unstyled">
      <li @click="menu=0"><a href="#"><i class="la la-puzzle-piece"></i><span>Inicio</span></a></li>

    <!--
      <li><a href="#dropdown-ui" aria-expanded="false" data-toggle="collapse"><i class="la la-institution"></i><span>Academias</span></a>
          <ul id="dropdown-ui" class="collapse list-unstyled pt-0">
              <li @click="menu=2"><a href="#">Academias</a></li>
              <li @click="menu=3"><a href="#">Resultados</a></li>
          </ul>
      </li>-->

      <li @click="menu=2"><a href="#"><i class="la la-institution"></i><span>Academias</span></a></li>

      <li><a href="#dropdown-icons" aria-expanded="false" data-toggle="collapse"><i class="la la-user"></i><span>Contactos</span></a>
          <ul id="dropdown-icons" class="collapse list-unstyled pt-0">
              <li @click="menu=4"><a href="#">Contactos</a></li>
              <li @click="menu=5"><a href="#">Usuarios</a></li>
          </ul>
      </li>

      <li><a href="#dropdown-ui" aria-expanded="false" data-toggle="collapse"><i class="la la-graduation-cap"></i><span>Instructores</span></a>
          <ul id="dropdown-ui" class="collapse list-unstyled pt-0">
              <li @click="menu=7"><a href="#">Instructores</a></li>
              <li @click="menu=11"><a href="#">Inscribir instructor</a></li>
          </ul>
      </li>
      <li @click="menu=6"><a href="#"><i class="la la-book"></i><span>Cursos</span></a></li>

      <li @click="menu=8"><a href="#"><i class="la la-users"></i><span>Grupos</span></a></li>

      <li @click="menu=9"><a href="#"><i class="la la-comments-o"></i><span>Tickets</span></a></li>

  </ul>
  <!-- End Main Navigation -->
</nav>
