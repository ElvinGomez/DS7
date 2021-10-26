<?php
  include("db/db.php");
  $database = new db("tutorial", "secret", "mysql", "classicmodels");
  session_start();
  if(!isset($_SESSION["codusuario"])) {
      header("Location: login.php");
  }
?>

<html>
<head>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- <script src="https://unpkg.com/tailwindcss-jit-cdn"></script> -->
    <style>
      :root {
          --main-color: #4a76a8;
      }

      .bg-main-color {
          background-color: var(--main-color);
      }

      .text-main-color {
          color: var(--main-color);
      }

      .border-main-color {
          border-color: var(--main-color);
      }
    </style>
    <title>LOGIN</title>
</head>
<body>
  <?php
  $results = $database->fetchAllTables();
    echo '
    <!-- component -->



<div class="bg-gray-100">
 <div class="w-full text-white bg-main-color">
        <div x-data="{ open: false }"
            class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="p-4 flex flex-row items-center justify-between">
                <a href="#"
                    class="text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline">Perfil</a>
                <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{\'flex\': open, \'hidden\': !open}"
                class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex flex-row items-center space-x-2 w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent hover:bg-blue-800 md:w-auto md:inline md:mt-0 md:ml-4 hover:bg-gray-200 focus:bg-blue-800 focus:outline-none focus:shadow-outline">
                        <span>'.$_SESSION["nombre"] .' '. $_SESSION["apellido"].'</span>
                        <img class="inline h-6 rounded-full"
                            src="'.$_SESSION["profile_picture"].'">
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{\'rotate-180\': open, \'rotate-0\': !open}"
                            class="inline w-4 h-4 transition-transform duration-200 transform">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                        <div class="py-2 bg-white text-blue-800 text-sm rounded-sm border border-main-color shadow-sm">
                            <div class="border-b"></div>
                            <form class="mt-8" method="POST" action="index.php">
                              <input class="block px-4 py-2 mt-2 text-sm bg-white md:mt-0 focus:text-gray-900 hover:bg-indigo-100 focus:bg-gray-200 focus:outline-none focus:shadow-outline"  type="submit" name="logout" value="Salir" />
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- End of Navbar -->

    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-green-400">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto"
                            src="'.$_SESSION["profile_picture"].'"
                            alt="">
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">'.$_SESSION["nombre"] .' '. $_SESSION["apellido"].'</h1>
                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->

                <div class="my-4"></div>

                <!-- Experience and education -->
                <div class="bg-white p-3 shadow-sm rounded-sm">

                    <div class="grid grid-cols-">
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Tablas</span>
                            </div>


                            <div class="min-h-screen bg-gray-100">

                            <div class="max-w-md ">
                              
                                <from class="relative">
                                  <select name="show_more" id="show_more" />';
                                  foreach($results as $table){
                                    //Print the table name out onto the page.
                                    echo '<option value="'.$table[0].'">'.$table[0].'</option>';
                                  }
  ?>
                                  </select>
                                </form>
                              </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Experience and education grid -->
                </div>
                <!-- End of profile tab -->
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      if(isset($_POST['logout'])) {
        unset($_SESSION["codusuario"]);
        unset($_SESSION["usuario"]);
        unset($_SESSION["contrasena"]);
        unset($_SESSION["nombre"]);
        unset($_SESSION["apellido"]);
        unset($_SESSION["profile_picture"]);
        echo("<script>location.href = 'login.php';</script>");
      }
    }
?>