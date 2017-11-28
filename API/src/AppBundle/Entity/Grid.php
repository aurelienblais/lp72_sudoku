<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Xeeeveee;
/**
 * Grid
 *
 * @ORM\Table(name="grid")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GridRepository")
 */
class Grid
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Xeeeveee\Sudoku\Puzzle
     *
     * @ORM\Column(name="puzzle", type="array")
     */
    private $puzzle;


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
     * Set puzzle
     *
     * @param Xeeeveee\Sudoku\Puzzle $puzzle
     *
     * @return Grid
     */
    public function setPuzzle($puzzle)
    {
        $this->puzzle = $puzzle;

        return $this;
    }

    /**
     * Get puzzle
     *
     * @return Xeeeveee\Sudoku\Puzzle
     */
    public function getPuzzle()
    {
        return $this->puzzle;
    }
}

