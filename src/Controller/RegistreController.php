<?php

namespace App\Controllers;

use App\Helpers\EntityHelpers as EH;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;


class RegistreController
{

    const NEEDS = [
        'mail',
        'password'
    ];

public function add()
    {
        if (!empty($_POST)) {
            foreach (self::NEEDLES as $value) {
                if(!array_key_exists($value, $_POST)) {
                    $error = "Il manque des champs à remplir";
                    include_once(__DIR__."/