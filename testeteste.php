<?php

require 'vendor/autoload.php';

use Classes\Entity\paciente;




$pacientes = paciente::getPacientes();





include __DIR__.'./includes/teste.php';
