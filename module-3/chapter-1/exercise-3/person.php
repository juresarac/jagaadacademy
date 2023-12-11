<?php

class Person {
    protected string $name;
    protected string $address;

    public function __construct ($name, $address) {
        $this->name = $name;
        $this->address = $address;
    }

    public function getName(): string{
        return $this->name;
    }

    public function getAddress(): string{
        return $this->address;
    }

    public function setAddress($address): void{
        $this->address = $address;
    }

    public function __toString() {
        return "Person [name={$this->name}, address={$this->address}]";
    }
}

class Student extends Person {

    private string $program;
    private int $year;
    private float $fee;

    public function __construct($name, $address, $program, $year, $fee)
    {
        parent::__construct($name, $address);
        $this->program = $program;
        $this->year = $year;
        $this->fee = $fee;
    }

    /**
     * @return string
     */
    public function getProgram(): string
    {
        return $this->program;
    }

    /**
     * @param string $program
     */
    public function setProgram(string $program)
    {
        $this->program = $program;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year)
    {
        $this->year = $year;
    }

    /**
     * @return float
     */
    public function getFee(): float
    {
        return $this->fee;
    }

    /**
     * @param float $fee
     */
    public function setFee(float $fee)
    {
        $this->fee = $fee;
    }
    public function __toString()
    {
        return "Student[Person[name={$this->getName()}, address={$this->getAddress()}], program={$this->program}, year={$this->year}, fee={$this->fee}]";
    }
}

class Staff extends Person {
    private string $school;
    private float $pay;

    public function __construct($name, $address, $school, $pay)
    {
        parent::__construct($name, $address);
        $this->school = $school;
        $this->pay = $pay;
    }

    /**
     * @return string
     */
    public function getSchool(): string
    {
        return $this->school;
    }

    /**
     * @param string $school
     */
    public function setSchool(string $school)
    {
        $this->school = $school;
    }

    /**
     * @return float
     */
    public function getPay(): float
    {
        return $this->pay;
    }

    /**
     * @param float $pay
     */
    public function setPay(float $pay)
    {
        $this->pay = $pay;
    }

    public function __toString()
    {
        return "Staff[Person[name={$this->getName()}, address={$this->getAddress()}], school={$this->school}, pay={$this->pay}]";
    }

}
$person = new Person("Jure", "Vukovarska 8");
echo $person . PHP_EOL;

$student = new Student("Filipa", "Otok", "Radiology", 2023, 5000.00);
echo $student . PHP_EOL;

$staff = new Staff("Klara", "Dubrovačka 11", "FSRE", 2500.00);
echo $staff . PHP_EOL;


function concat($str1, $str2, $delimiter): string
{
    return $str1 . $delimiter . $str2;
}

$message = concat('Hi', 'there!', ' ');

echo $message;