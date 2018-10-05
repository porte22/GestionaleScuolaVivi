<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }




    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;


    /**
     * @var string
     *
     * @ORM\Column(name="cognome", type="string", length=255)
     */
    private $cognome;


    /**
     * @var Classe
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Classe",inversedBy="alunni")
     * @ORM\JoinColumn(name="classe_id",referencedColumnName="id")
     */
    private $classeAlunno;


    /**
     * @var Classe
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Classe",inversedBy="docenti")
     * @ORM\JoinColumn(name="classe_id",referencedColumnName="id")
     */
    private $classeDocente;


    /**
     * @var UserType
     * @ORM\JoinColumn(name="user_type_id",referencedColumnName="id")
     */
    private $userType;

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }


    public function setUsername($username)
    {
        $username = is_null($username) ? '' : $username;
        parent::setUsername($username);
        $this->setEmail($username.'@fake.com');

        return $this;
    }

    /**
     * @return string
     */
    public function getCognome()
    {
        return $this->cognome;
    }

    /**
     * @param string $cognome
     */
    public function setCognome($cognome)
    {
        $this->cognome = $cognome;
    }

    /**
     * @return Classe
     */
    public function getClasseAlunno()
    {
        return $this->classeAlunno;
    }

    /**
     * @param Classe $classeAlunno
     */
    public function setClasseAlunno($classeAlunno)
    {
        $this->classeAlunno = $classeAlunno;
    }

    /**
     * @return Classe
     */
    public function getClasseDocente()
    {
        return $this->classeDocente;
    }

    /**
     * @param Classe $classeDocente
     */
    public function setClasseDocente($classeDocente)
    {
        $this->classeDocente = $classeDocente;
    }

    /**
     * @return UserType
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * @param UserType $userType
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;
    }


}