<?php 

namespace My\RecipesBundle\Event;

use My\RecipesBundle\Entity\Recipe;
use Symfony\Component\Console\Output\OutputInterface;

class RecipesListener
{

    private $mailer;

   /* public function __construct(\SwiftMailer $mailer)
    {
        $this->mailer = $mailer;
    }*/

    public function __construct()
    {
        $this->mailer = "mailer";
    }

    public function onRecipeCreate(RecipeEvent $event)
    {
        $recipe = $event->getRecipe();
        $this->notifyToAdmins($recipe);
    }


    private function notifyToAdmins(Recipe $recipe)
    {
        // ...
        //$this->mailer->send($email);

        echo "MAIL";
        //$event->getDispatcher->dispatch('email.sent', new EmailEvent($email));
    }
}