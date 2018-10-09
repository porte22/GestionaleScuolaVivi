<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * Classe
 *
 *
 * @ORM\Table(name="classe",
 *    uniqueConstraints={
 *        @UniqueConstraint(name="unique_anno_sezione",
 *            columns={"anno", "sezione"})
 *    })
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClasseRepository")
 */
class Classe
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="anno", type="string", length=255)
     */
    protected $anno;

    /**
     * @var string
     *
     * @ORM\Column(name="sezione", type="string", length=255)
     */
    protected $sezione;


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\User",mappedBy="classe", orphanRemoval=true)
     * @ORM\JoinColumn(name="utenti_classi")
     */
    protected $utenti;



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $anno
     *
     * @return Classe
     */
    public function setAnno($anno)
    {
        $this->anno = $anno;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getAnno()
    {
        return $this->anno;
    }

    /**
     * Set sezione
     *
     * @param string $sezione
     *
     * @return Classe
     */
    public function setSezione($sezione)
    {
        $this->sezione = $sezione;

        return $this;
    }

    /**
     * Get sezione
     *
     * @return string
     */
    public function getSezione()
    {
        return $this->sezione;
    }

    /**
     * @return mixed
     */
    public function getUtenti()
    {
        return $this->utenti;
    }

    /**
     * @param mixed $utenti
     */
    public function setUtenti($utenti)
    {
        $this->utenti = $utenti;
    }


}

