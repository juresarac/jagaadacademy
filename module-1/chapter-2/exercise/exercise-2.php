<?php

$input = [
    'languages' => [
        'PHP',
        'Javascript',
        'Python',
        'Java',
        'Go',
        'Lua',
        'C++',
    ],
    'student' => 'John Doe',
    'grade' => 'A',
];

$object = (object)$input;

echo <<<EOT
Student Name: {$object->student}
Language: {$object->languages[0]}
Grade: {$object->grade}
EOT;
