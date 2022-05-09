<template>
    <div>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <Link class="navbar-brand" href="/">Discussion</Link>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">All Questions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Answered Questions</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="#">Unanswered Questions</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item fw-bold" href="#">Welcome {{ $page.props.auth_user.name }}</a></li>
            <li><Link class="dropdown-item" href="/profile/edituser">Edit User</Link></li>
            <li><a class="dropdown-item" href="/logout">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'

</script>

<style lang="scss" scoped>

</style>
