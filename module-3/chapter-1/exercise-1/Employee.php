<?php
class Employee {
    private $name;
    private $department;
    private $salary;

    public function __construct($name, $department, $salary) {
        $this->name = $name;
        $this->department = $department;
        $this->salary = $salary;
    }

    public function displaySalary() {
        echo "Current salary of {$this->name} in {$this->department} department is {$this->salary}.\n";
    }

    public function raiseSalary($percent) {
        $increaseAmount = $this->salary * ($percent / 100);
        $this->salary += $increaseAmount;
        echo "{$this->name}'s salary has been increased by {$percent}%. New salary is {$this->salary}.\n";
    }
}

$employee = new Employee("Jure", "HR", 1000);
$employee->displaySalary();
$employee->raiseSalary(10);
$employee->displaySalary();

