<?php

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BackendBundle\Entity\Videojuego;




class VideojuegoController extends Controller {

    public function videojuegosAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $list_videojuegos = $em->getRepository("BackendBundle:Videojuego")->findAll();
        $videojuego = new Videojuego();
        $form = $this->createForm(\AppBundle\Form\VideojuegoType::class, $videojuego);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($videojuego);
            $em->flush();
            $this->addFlash('success', "Registro de videojuego correcto");
            return $this->redirect($this->generateUrl("app_videojuegos"));
        }
    }
//       return $this->render("AppBundle:Default:videojuegos.html.twig", array('listGames' =>  $list_videojuegos, 'formVideojuegos' => $form->createView()));
//    }
//    
//        public function careerUpdateAction(Request $request, $id){
//        $em = $this->getDoctrine()->getManager();
//        $career = $em->getRepository("BackendBundle:Career")->find($id);
//        $form = $this->createForm(\AppBundle\Form\CareerType::class, $career);
//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em->persist($career);
//            $em->flush();
//            $this->addFlash('success', "Actualización de datos de la carrera correcto");
//            return $this->redirect($this->generateUrl("app_careers"));
//        }
//        return $this->render("AppBundle:Default:careers.html.twig", array('listCareers' => null, 'formCareer' => $form->createView()));
//    }
//    
//     public function careerDeleteAction(Request $request, $id) {
//        $em = $this->getDoctrine()->getManager();
//        $career = $em->getRepository("BackendBundle:Career")->find($id);
//        $em->remove($career);
//        $em->flush();
//        $this->addFlash('success', "Eliminación de la carrera correcto");
//        return $this->redirect($this->generateUrl("app_careers"));
//    }
}
