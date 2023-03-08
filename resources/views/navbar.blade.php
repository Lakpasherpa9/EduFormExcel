
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>navbar</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-fixed/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css ">
    <script type="text/javascript" src={{asset('js/custom.js')}}></script>

{{-- <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">


{{-- <link rel="stylesheet" href="/khalti/resources/css/app.css"> --}}

   

    
    <!-- Custom styles for this template -->
 {{-- Notification Script --}}
 {{-- <script>
    var el = document.querySelector('.notification');

    document.querySelector('.notification').addEventListener('click', function(){
    var count = Number(el.getAttribute('data-count')) || 0;
    el.setAttribute('data-count', count + 1);
    el.classList.remove('notify');
    el.offsetWidth = el.offsetWidth;
    el.classList.add('notify');
    if(count === 0){
        el.classList.add('show-count');
    }
    alert("Notification bell has been clicked");
  }, false);     

 </script> --}}

<style>
  
  /* Styling of the notification */
.navbar{
  background-color: #1ea8e3;

}
/* Notifications */
.bell{
  padding-top: 0.5%;
  padding-right: 1%;
}
.notification{
   /* background: #3498db;  */
  display: inline-block;
  position: relative;
  padding:0.5%;
} 

.notification::before, 
.notification::after {
    color: #af8612;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
}

.notification::before {
    display: block;
    content: "\f0f3";
    font-family: "FontAwesome";
    transform-origin: top center;
}

.notification::after {
    font-family: Arial;
    font-size: 0.7em;
    font-weight: 700;
    position: absolute;
    top: -15px;
    right: -15px;
    padding: 5px 8px;
    line-height: 100%;
    border: 2px #fff solid;
    border-radius: 60px;
    background: #eff3f6;
    opacity: 0;
    content: attr(data-count);
    opacity: 0;
    transform: scale(0.5);
    transition: transform, opacity;
    transition-duration: 0.3s;
    transition-timing-function: ease-out;
}

.notification.notify::before {
    animation: ring 1.5s ease;
}

.notification.show-count::after {
    transform: scale(1);
    opacity: 1;
}

@keyframes ring {
    0% {
        transform: rotate(35deg);
    }
    12.5% {
        transform: rotate(-30deg);
    }
    25% {
        transform: rotate(25deg);
    }
    37.5% {
        transform: rotate(-20deg);
    }
    50% {
        transform: rotate(15deg);
    }
    62.5% {
        transform: rotate(-10deg);
    }
    75% {
        transform: rotate(5deg);
    }
    100% {
        transform: rotate(0deg);
    }
}
/*Notification styling Ends here*/

/*Notification dropdown Styling starts here*/
              @import url(https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900);

              * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: "Inter", sans-serif;
                --shadow: rgba(0, 0, 0, 0.05) 0px 6px 10px 0px,
                  rgba(0, 0, 0, 0.1) 0px 0px 0px 1px;
                /* --color: #166e67; */
                --gap: 0.5rem;
                --radius: 5px;
              }

              .btn{
                background-color: rgb(61, 211, 11)
              }
              .bell::before,
              .bell::after{
                color:blue;
                font-size: 1.1rem;
                text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
              }
              .bx{
                font-size: 1.1rem;
              }

              .dropdown {
                position: absolute;
                width: 250px;
                box-shadow: var(--shadow);
                border-radius: var(--radius);
                margin-top: 0.3rem;
                background: white;

                visibility: hidden;
                opacity: 0;
                transform: translateY(0.5rem);
                transition: all 0.1s cubic-bezier(0.16, 1, 0.5, 1);
              }

              .dropdown a {
                display: flex;
                align-items: center;
                column-gap: var(--gap);
                padding: 0.8rem 1rem;
                text-decoration: none;
                color: black;
              }

              .dropdown a:hover {
                background-color: var(--color);
                color: white;
              }

              .show {
                visibility: visible;
                opacity: 1;
                transform: translateY(0rem);
              }
 */
/*Notification dropdown Styling ends here*/

</style>

  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">File form</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{URL('file-import') }}">Import</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ URL('khalti') }}">Payment</a>
        </li>
        {{-- Mail --}}
        <li>
          <a href="{{URL('mail')}}">Send Mail</a>
        </li>

        <li class="nav-item ">
          <a class="nav-link" href="{{ URL('about') }}">About Us</a>
        </li>

        <li class='nav-item'>
          <a href="{{URL('post')}}" class="nav-link">Admin Posts</a>
        </li>
      </ul>
    

{{-- Notification bell --}}

        
          <div class="container">
            <button class="btn" id="btn">
                <i class="fa-solid fa-bell notification bell" id="arrow"></i>  
            </button>
{{--        

            <div class="dropdown" id="dropdown">
              <a href="#">
                <i class="bx bx-plus-circle"></i>
                Create New
              </a>
              <a href="#">
                <i class="bx bx-book"></i>
                All Drafts
              </a>
              <a href="#">
                <i class="bx bx-folder"></i>
                Move To
              </a>
              <a href="#">
                <i class="bx bx-user"></i>
                Profile Settings
              </a>
              <a href="#">
                <i class="bx bx-bell"></i>
                Notification
              </a>
              <a href="#">
                <i class="bx bx-cog"></i>
                Settings
              </a>
            </div> --}}
hello

{{-- <script>
  var el = document.getElementByClassName('btn');
  // var dropdownBtn = document.getElementById("btn");
  //  var dropdownMenu = document.getElementById("dropdown");
  document.getElementByClassName('btn').addEventListener('click', function(){
  var count = Number(el.getAttribute('data-count')) || 0;
  el.setAttribute('data-count', count + 1);
 //el.classList.remove('notify');
  el.offsetWidth = el.offsetWidth;
  el.classList.add('notify');
  if(count === 0){
      el.classList.add('show-count');
  }
 alert("Notification bell has been clicked");
}, false);      --}}



{{-- // //starts
// const dropdownBtn = document.getElementById("btn");
// const dropdownMenu = document.getElementById("dropdown");
// const toggleArrow = document.getElementById("arrow");

// // Toggle dropdown function
// const toggleDropdown = function () {
//   dropdownMenu.classList.toggle("show");
//   toggleArrow.classList.toggle("arrow");
// };

// // Toggle dropdown open/close when dropdown button is clicked
// dropdownBtn.addEventListener("click", function (e) {
//   e.stopPropagation();
//   toggleDropdown();
// });

// // Close dropdown when dom element is clicked
// document.documentElement.addEventListener("click", function () {
//   if (dropdownMenu.classList.contains("show")) {
//     toggleDropdown();
//   }
// }); --}}

</div>
               
      {{-- Ends here --}}

      {{-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> --}}
    </div>
  </div>
</nav>



    {{-- <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> --}}

      @yield('navbar')

    {{-- Script for bell notification --}}
    


  </body>
</html>
