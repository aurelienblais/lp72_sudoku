<?php

namespace AppBundle\Controller;

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
     * @Rest\Get("/size/{size}/solution/{solution}")
     * @param $size
     * @param $solution
     * @return Response
     */
    public function getAction(int $size, bool $solution) {
        $puzzle = new Xeeeveee\Sudoku\Puzzle();
        $puzzle->setCellSize($size);
        $puzzle->generatePuzzle();
        $puzzle->solve();

        return new Response($puzzle);
    }

}
