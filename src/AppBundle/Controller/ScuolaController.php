<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Classe;
use AppBundle\Form\ClasseType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ScuolaController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [

        ]);
    }

    /**
     * @Route("/lista-classi", name="lista-classi")
     */
    public function listaClassiAction(Request $request)
    {
        $classi = $this->getDoctrine()->getRepository('AppBundle:Classe')->findAll();
        // replace this example code with whatever you need
        return $this->render('default/lista-classi.html.twig', [
            'classi' => $classi
        ]);
    }


    /**
     * @Route("/crea-classe", name="crea-classe")
     */
    public function creaClasseAction(Request $request)
    {
        $classi = $this->getDoctrine()->getRepository('AppBundle:Classe')->findAll();
        // replace this example code with whatever you need
        return $this->render('default/lista-classi.html.twig', [
            'classi' => $classi
        ]);
    }

    /**
     * @Route("/modifica/classe/{anno}/{sezione}" , name="modifica-classe", defaults={"anno"=null,"sezione"=null}))
     */
    public function modificaClasseAction(Request $request, $anno, $sezione)
    {

        if ($anno) {
            $classeEntity = $this->getDoctrine()->getRepository('AppBundle:Classe')->findOneBy(['anno' => $anno, 'sezione' => $sezione]);
        } else {
            $classeEntity = new Classe();
        }
        $form = $this->createForm(ClasseType::class, $classeEntity);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $classeEntity = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($classeEntity);
            $entityManager->flush();

            return $this->redirectToRoute('lista-classi');
        }

        return $this->render('default/modifica-classe.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
