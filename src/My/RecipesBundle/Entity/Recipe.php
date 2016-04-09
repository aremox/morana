<?php

namespace My\RecipesBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

class Recipe
{
	private $id;
	protected $name;
	protected $difficulty;
	protected $description = null;
    protected $author;
    protected $ingredients;
    protected $notes = null;

    public function __construct()
    {
       /* $this->author = $author;
        $this->name = $name;
        $this->description = $description;
        $this->difficulty = $difficulty;*/

        $this->ingredients = new ArrayCollection();
    }

    public function add(Ingredient $ingredient){
            $this->ingredients[] = $ingredient;
    }

    public function isHard(){
           if($this->difficulty == 'hard'){
                return true;
           }
           return false;
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Recipe
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set difficulty
     *
     * @param string $difficulty
     * @return Recipe
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    /**
     * Get difficulty
     *
     * @return string 
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Recipe
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set author
     *
     * @param \My\RecipesBundle\Entity\Author $author
     * @return Recipe
     */
    public function setAuthor(Author $author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \My\RecipesBundle\Entity\Author 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Add ingredients
     *
     * @param \My\RecipesBundle\Entity\Ingredient $ingredients
     * @return Recipe
     */
    public function addIngredient(\My\RecipesBundle\Entity\Ingredient $ingredients)
    {
        $this->ingredients[] = $ingredients;

        return $this;
    }

    /**
     * Remove ingredients
     *
     * @param \My\RecipesBundle\Entity\Ingredient $ingredients
     */
    public function removeIngredient(\My\RecipesBundle\Entity\Ingredient $ingredients)
    {
        $this->ingredients->removeElement($ingredients);
    }

    /**
     * Get ingredients
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Set notes
     *
     * @param string $notes
     * @return Recipe
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
    }
}
