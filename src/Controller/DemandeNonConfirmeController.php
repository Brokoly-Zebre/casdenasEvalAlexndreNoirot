<?php

namespace App\Controller;

use App\Entity\Demande;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemandeNonConfirmeController extends AbstractController
{
    #[Route('/demandenonconfirme', name: 'app_demande_non_confirme')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $mesDemandesnonconfirmees = $doctrine->getRepository(Demande::class)->findBy(['user' => $this->getUser()]);


        return $this->render('demande_non_confirme/index.html.twig', [
            'controller_name' => 'mes_demandes/index.html.twig',
            'demandes_non_confirmees' => $mesDemandesnonconfirmees,
        ]);
    }
}
