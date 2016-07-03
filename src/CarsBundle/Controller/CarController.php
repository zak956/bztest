<?php

namespace CarsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Car controller.
 *
 * @Route("/car")
 */
class CarController extends Controller
{
    /**
     * Lists all Car entities.
     *
     * @Route("/", name="car_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cars = $em->getRepository('CarsBundle:Car')->findAll();

        return $this->json($cars);
    }

    /**
     * Creates a new Car entity (brand and model should be passed as POST params).
     *
     * @Route("/", name="car_new")
     * @Method("POST")
     */
    public function newAction(Request $request)
    {
        $car = new Car();
        $em = $this->getDoctrine()->getManager();

        if ($brand = $request->get('brand')) {
            $car->setBrand($brand);
        }

        if ($model = $request->get('model')) {
            $car->setModel($model);
        }

        $em->persist($car);
        $em->flush();

        return $this->json($car);
    }

    /**
     * Finds and returns a Car entity.
     *
     * @Route("/{id}", name="car_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $car = $em->getRepository('CarsBundle:Car')->find($id);
        if (!$car) {
            throw $this->createNotFoundException('Car is not found');
        }
        return $this->json($car);
    }

    /**
     * Edit an existing Car entity (brand and model should be passed as POST params).
     *
     * @Route("/{id}", name="car_edit")
     * @Method("PUT")
     */
    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $car = $em->getRepository('CarsBundle:Car')->find($id);
        if (!$car) {
            throw $this->createNotFoundException('Car is not found');
        }

        if ($brand = $request->get('brand')) {
            $car->setBrand($brand);
        }

        if ($model = $request->get('model')) {
            $car->setModel($model);
        }

        $em->persist($car);
        $em->flush();

        return $this->json($car);
    }

    /**
     * Deletes a Car entity.
     *
     * @Route("/{id}", name="car_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        
        $em = $this->getDoctrine()->getManager();
        $car = $em->getRepository('CarsBundle:Car')->find($id);
        if (!$car) {
            throw $this->createNotFoundException('Car is not found');
        }
        $em->remove($car);
        $em->flush();

        return $this->redirectToRoute('car_index');
    }
}
