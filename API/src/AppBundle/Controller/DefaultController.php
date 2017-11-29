<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Grid;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Xeeeveee;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

class DefaultController extends Controller
{

    /**
     * @Rest\Get("/size/{size}/filled/{filled}")
     * @param int $size
     * @return Response
     * @internal param $solution
     */
    public function getAction(int $size, int $filled)
    {

        $puzzle = new Xeeeveee\Sudoku\Puzzle();
        $puzzle->setCellSize($size);
        $puzzle->generatePuzzle($filled);
        $puzzle->solve();

        $grid = new Grid();
        $grid->setPuzzle($puzzle);
        $em = $this->getDoctrine()->getManager();

        $em->persist($grid);
        $em->flush();

        return new Response([
            'uuid' => $grid->getId(),
            'puzzle' => $puzzle
        ]);
    }


    /**
     * @Rest\Put("/check/uuid/{uuid}")
     * @param $uuid
     * @return Response
     */
    public function postAction(Request $request, $uuid)
    {

        $em = $this->getDoctrine()->getManager();

        $puzzle = ($em->getRepository("AppBundle:Grid")->find($uuid))->getPuzzle();

        $test = $request->request->get('test');

        $res = true;

        foreach ($puzzle->getSolution() as $i => $solutionLine) {
            foreach ($solutionLine as $j => $solutionCell) {
                if ($solutionCell !== $test[$i][$j]) {
                    $res = false;
                    break;
                }
            }
            if ($res === false) {
                break;
            }
        }

        if ($res === true) {
            $em = $this->getDoctrine()->getManager();
            $grid = $em->getRepository('AppBundle:Grid')->find($uuid);
            $em->remove($grid);
        }

        return new Response($res);
    }

}
