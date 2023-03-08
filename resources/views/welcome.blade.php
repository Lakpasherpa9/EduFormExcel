@extends('navbar')

<br>
<br>
<br>
<h1>Welcome to Our Site</h1>
<h2>You can select the features as in the Navbar</h2>


<br>
<br>

<div class="container">
  <style>
    a:hover{
       text-shadow: 2px 2px 2px darkblue ; 
      opacity: 0.8;
    }

  </style>
    <button class="btn" id="btn">
      <i class="bx fa-solid fa-bell bell" id="bell"></i>
    </button>
  
    <div class="dropdown" id="dropdown">
      <a href="#">
        <i class="bx bx-plus-circle"></i>
         New Notification-1
      </a>
      <a href="#">
        <i class="bx bx-book"></i>
        New Notification-2
      </a>
      <a href="#">
        <i class="bx bx-folder"></i>
        New Notification-3
      </a>
      <a href="#">
        <i class="bx bx-user"></i>
        New Notification-4
      </a>
      <a href="#">
        <i class="bx bx-bell"></i>
        New Notification-5
      </a>
      <a href="#">
        <i class="bx bx-cog"></i>
        New Notification-6
      </a>
    </div>
<script>  

const dropdownBtn = document.getElementById("btn");
const dropdownMenu = document.getElementById("dropdown");


// Toggle dropdown function
const toggleDropdown = function () {
  dropdownMenu.classList.toggle("show");
};

// Toggle dropdown open/close when dropdown button is clicked
dropdownBtn.addEventListener("click", function (e) {
  e.stopPropagation();
  toggleDropdown();
});

// Close dropdown when dom element is clicked
document.documentElement.addEventListener("click", function () {
  if (dropdownMenu.classList.contains("show")) {
    toggleDropdown();
  }
});



    </script>
  </div>



{{-- <div class="bell">
    <li>
      <i class="fa-solid fa-bell notification"></i>
    </li>       
  </div>  --}}