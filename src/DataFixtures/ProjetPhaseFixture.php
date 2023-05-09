<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Projet;
use App\Entity\Phase;

class ProjetPhaseFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $projet1 = new Projet();
         $projet1->setTitre('Mini Projet');
         $projet1->setType('Education');
         $projet1->setEcheance('Complet');
         $projet1->setEnseignant('Ahmed');
         $projet1->setDomaine('PfA');
         $manager->persist($projet1);
 
         $projet2 = new Projet();
         $projet2->setTitre('Stage Ouvrier');
         $projet2->setType('Developpement');
         $projet2->setEcheance('refusé');
         $projet2->setEnseignant('Mehdi Achour');
         $projet2->setDomaine('PfA');
         $manager->persist($projet2);
 
         $projet3 = new Projet();
         $projet3->setTitre('Stage Technicien');
         $projet3->setType('Education');
         $projet3->setEcheance('Complet');
         $projet3->setEnseignant('Rania');
         $projet3->setDomaine('PfE');
         $manager->persist($projet3);
 
 
         ///////
         $Phase1 = new Phase();
         $Phase1->setDescription('Conception');
         $Phase1->setEcheance('passable');
         $Phase1->setEtat(True);
         $Phase1->setProjet( $projet3);
         $manager->persist($Phase1);
 
         $Phase2 = new Phase();
         $Phase2->setDescription('Conception');
         $Phase2->setEcheance('complet');
         $Phase2->setEtat(True);
         $Phase2->setProjet( $projet1);
         $manager->persist($Phase2);
        // $manager->persist($product);

        $manager->flush();
    }
}
