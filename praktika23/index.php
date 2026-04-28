<?php 
    class User {
        protected $name;
        protected $age;

        public function setName($newName) {
            $this -> name = $newName;
        }
        
        public function getName() {
            return $this -> name;
        }

        public function setAge($newAge) {
            $this -> age = $newAge;;
        }
        
        public function getAge() {
            return $this -> age;
        }

    }

    class Worker extends User {
        private $salary;

        public function setSalary($newSalary) {
            $this -> salary = $newSalary;
        }
        
        public function getSalary() {
            return $this -> salary;
        }

    }

    class Student extends User {
        private $stepend;
        private $course;

        public function setStepend($newStepend) {
            $this -> stepend = $newStepend;
        }
        
        public function getStepend() {
            return $this -> stepend;
        }

        public function setCourse($newCourse) {
            $this -> course = $newCourse;
        }
        
        public function getCourse() {
            return $this -> course;
        }
    }

    class Driver extends Worker {
        private $exp;
        private $category;

        public function setExp($newExp) {
            $this -> exp = $newExp;
        }
        
        public function getExp() {
            return $this -> exp;
        }

        public function setCategory($newCategory) {
            $this -> category = $newCourse;
        }
        
        public function getCategory() {
            return $this -> category;
        }
    }

    $myWorker1 = new Worker();
    $myWorker1 -> setName('Иван');
    $myWorker1 -> setAge(25);
    $myWorker1 -> setSalary(1000);
    $myWorker2 = new Worker();
    $myWorker2 -> setName('Вася');
    $myWorker2 -> setAge(26);
    $myWorker2 -> setSalary(2000);

    $myStudent = new Student();
    $myStudent -> setName('Игорь');
    $myStudent -> setAge(20);
    $myStudent -> setStepend(1000);
    $myStudent -> setCourse(3);

    $myDriver = new Driver();
    $myDriver -> setName('Василий');
    $myDriver -> setAge(56);
    $myDriver -> setExp(26);
    $myDriver -> getCategory('D');
?>
<?= var_dump($myStudent); ?>
<?= var_dump($myDriver); ?>