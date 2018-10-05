<?php
/**
 * Created by PhpStorm.
 * User: Edimotive
 * Date: 05/10/2018
 * Time: 10:56
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class UserType
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="nome");
     */
    private $nome;

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


}