<?php

namespace AppBundle\Controller;

use Monolog\Logger;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Xeeeveee;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Service\Log;

class DefaultController extends Controller
{

    /**
     * @Rest\Get("/size/{size}")
     * @param int $size
     * @return JsonResponse
     * @internal param $solution
     */
    public function getAction(int $size) {

        $logger = new Log();

        $puzzle = new Xeeeveee\Sudoku\Puzzle();
        $puzzle->setCellSize($size);
        $puzzle->generatePuzzle();
        $puzzle->solve();

        $uuid = $logger->log($puzzle);

        return new JsonResponse(['UUID' => $uuid, 'puzzle' => $puzzle]);
    }


    /**
     * @Rest\("/check")
     * @internal param array $try
     */
    public function postAction() {
        var_dump($this->container->get('try'));
    }

}
