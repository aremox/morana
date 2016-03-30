<?php

namespace My\RecipesBundle\Entity;

class Author
{
	private $id;
	protected $name;
	protected $surname;
    protected $recipes;

	public function __construct($name, $surname)
	{
		$this->name = $name;
		$this->surname = $surname;

        $this->recipes = new ArrayCollection;
	}

    public function getRecipes()
    {
        return $this->recipes;
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
     * @return Author
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
     * Set surname
     *
     * @param string $surname
     * @return Author
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }
}
