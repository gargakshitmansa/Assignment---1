<?php
class Student {
    public function __construct(public string $crn, public string $name, public string $email, public string $branch) {}
}

class App {
    private array $list = [];

    public function run() {
        while (true) {
            echo "\n1.Add 2.View 3.Search 4.Delete 5.Exit\nChoice: ";
            $ch = trim(fgets(STDIN));

            if ($ch === '1') {
                echo "CRN: "; $crn = trim(fgets(STDIN));
                echo "Name: "; $name = trim(fgets(STDIN));
                echo "Email: "; $email = trim(fgets(STDIN));
                echo "Branch: "; $branch = trim(fgets(STDIN));
                $this->list[$crn] = new Student($crn, $name, $email, $branch);
                echo "Saved!\n";
            } elseif ($ch === '2') {
                if (!$this->list) echo "No students found.\n";
                foreach ($this->list as $s) {
                    echo "CRN: $s->crn | Name: $s->name | Email: $s->email | Branch: $s->branch\n";
                }
            } elseif ($ch === '3') {
                echo "Enter CRN: "; $crn = trim(fgets(STDIN));
                echo isset($this->list[$crn]) 
                    ? "Found: {$this->list[$crn]->name} ({$this->list[$crn]->branch}) - {$this->list[$crn]->email}\n" 
                    : "Not found!\n";
            } elseif ($ch === '4') {
                echo "Enter CRN: "; $crn = trim(fgets(STDIN));
                if (isset($this->list[$crn])) { unset($this->list[$crn]); echo "Deleted!\n"; }
                else echo "Not found!\n";
            } elseif ($ch === '5') {
                exit("Bye!\n");
            }
        }
    }
}

(new App())->run();