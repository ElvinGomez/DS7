<?php
    session_start();
    if(isset($_SESSION["usuario"])) {
        $user =  $_SESSION["usuario"];
        if($user === '' || !$user) {
            header("Location: index.php");
        }
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

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $_salary = $_POST['salary'];

    $employee = new Employee();
    $employee->set_name($name);
    $employee->set_lastname($lastname);

    $salary = new Salary();
    $salary->set_salary($_salary);
}
?>


<body style="margin: 0; padding: 0">
    <div style="display: flex; justify-content: flex-end">
        <h1><?php echo $user ?></h1>
    </div>
    <div>
        <div>
            <h3><?php echo $employee->get_fullname() ?></h3>
        </div>
        <div>
            <p>Sueldo Bruto: $<?php echo $salary->get_salary() ?></p>
            <p>Descuento educativo: $<?php echo $salary->get_educational_discount() ?></p>
            <p>Seguro social: $<?php echo $salary->get_social_discount() ?></p>
            <p>Salario neto: $<?php echo $salary->get_salary_after_discounts() ?></p>
        </div>
    </div>
    <div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <input type="submit" name="back" value="Volver" />
            <input type="submit" name="logout" value="Salir" />
        </form>
    </div>
</body>

<?php
    echo $_POST['action'];
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if(isset($_POST['back'])){
            echo("<script>location.href = 'form.php';</script>");
        } else if(isset($_POST['logout'])) {
            unset($_SESSION["usuario"]);
            echo("<script>location.href = 'index.php';</script>");
        }
    }
?>