<?php
    session_start();
    if(!isset($_SESSION["usuario"])) {
        header("Location: index.php");
    } else {
        $user = $_SESSION["usuario"];
    }
?>

<?php
class Employee {
    private $name;
    private $lastname;

    function set_name($value) {
        $this->name = $value;
    }
    function set_lastname($value) {
        $this->lastname = $value;
    }
    function get_name() {
        return $this->name;
    }
    function get_lastname() {
        return $this->lastname;
    }
    function get_fullname() {
        return $this->name.' '.$this->lastname;
    }
}
?>

<?php
class Salary {
    private $salary;

    private $educational_insurance = 1.25;
    private $social_insurance = 9;

    function set_salary($value) {
        $this->salary = (float)$value;
    }
    function get_salary() {
        return $this->salary;
    }
    function get_educational_discount() {
        return ($this->educational_insurance * $this->salary)/100;
    }
    function get_social_discount() {
        return ($this->social_insurance * $this->salary)/100;
    }
    function get_salary_after_discounts() {
        return $this->get_salary() - ($this->get_educational_discount() + $this->get_social_discount());
    }
}
?>

<html>
<head>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <title>LOGIN</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!isset($_POST['back']) && !isset($_POST['logout'])){
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $_salary = $_POST['salary'];

        if($name && $lastname && $_salary) {
            $employee = new Employee();
            $employee->set_name($name);
            $employee->set_lastname($lastname);
                
            $salary = new Salary();
            $salary->set_salary($_salary);    

            

            echo '
                <!-- component -->
                <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
                <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">


                <section class="relative pt-12">
                <div class="items-center flex flex-wrap">
                <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
                    <div class="md:pr-12">
                    <h3 class="text-3xl font-semibold">'.$employee->get_fullname().'</h3>
                    <p class="mt-4 text-lg leading-relaxed text-blueGray-500">Deducción de impuestos:</p>
                    <ul class="list-none mt-6">
                        <li class="py-2">
                        <div class="flex items-center">
                            <div>
                                <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"><i class="fas fa-money-bill-wave"></i></span>
                            </div>
                            <div>
                                <div class="flex flex-wrap">
                                    <p>Sueldo Bruto: </p>
                                    <h4 class="text-blueGray-500 pl-2">$'.$salary->get_salary().'</h4>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="py-2">
                        <div class="flex items-center">
                            <div>
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"><i class="fas fa-graduation-cap"></i></i></span>
                            </div>
                            <div>
                                <div class="flex flex-wrap">
                                    <p>Descuento educativo: </p>
                                    <h4 class="text-blueGray-500 pl-2">$'.$salary->get_educational_discount().'</h4>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="py-2">
                        <div class="flex items-center">
                            <div>
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"><i class="fas fa-user-friends"></i></span>
                            </div>
                            <div>
                                <div class="flex flex-wrap">
                                    <p>Seguro social: </p>
                                    <h4 class="text-blueGray-500 pl-2">$'.$salary->get_social_discount().'</h4>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="py-2">
                        <div class="flex items-center">
                            <div>
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"><i class="fas fa-funnel-dollar"></i></span>
                            </div>
                            <div>
                                <div class="flex flex-wrap">
                                    <p>Salario neto: </p>
                                    <h4 class="text-blueGray-500 pl-2">$'.$salary->get_salary_after_discounts().'</h4>
                                </div>
                            </div>
                        </div>
                        </li>
                    </ul>
                    </div>
                </div>
                </div>
                <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
                    <form class="mt-8" method="POST" action="result.php">
                        <input class="flex-no-shrink md:w-5/12 px-5 bg-blue-500 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider text-white rounded-full" type="submit" name="back" value="Volver" />
                        <input class="flex-no-shrink px-5 bg-red-500 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider text-white rounded-full" type="submit" name="logout" value="Salir" />
                    </form>
                </div>
                </section>
            ';
        } else {
            echo '<div class="flex flex-col space-y-4 min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none">
            <div class="flex flex-col p-8 bg-gray-800 shadow-md hover:shodow-lg rounded-2xl">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-16 h-16 rounded-2xl p-3 border border-gray-800 text-blue-400 bg-gray-900" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="flex flex-col ml-3">
                            <div class="font-medium leading-none text-gray-100">Campos imcompletos</div>
                            <p class="text-sm text-gray-500 leading-none mt-1">Ingresa cada uno de los campos para calcular los descuentos</p>
                        </div>
                    </div>
                    <button onclick="goBack()" class="flex-no-shrink px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-blue-500 text-white rounded-full">Volver</button>
                </div>
            </div>
            </div>';
        }
    }
}
?>

<script>
    function goBack() {
        location.href = 'form.php';
    }
</script>



<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if(isset($_POST['back'])){
            echo("<script>location.href = 'form.php';</script>");
        } else if(isset($_POST['logout'])) {
            unset($_SESSION["usuario"]);
            echo("<script>location.href = 'index.php';</script>");
        }
    }
?>