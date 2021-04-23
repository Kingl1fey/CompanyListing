<?php

namespace App\Controller;

use App\Entity\Company;
use App\Form\Company1Type;
use App\Entity\CompanyHistory;
use App\Repository\CompanyRepository;
use App\Repository\CompanyHistoryRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/company")
 */
class CompanyController extends AbstractController
{
    /**
     * @Route("/history", name="company_show_history")
     */
    public function showHistory(CompanyHistoryRepository $repo, Request $request)
    {
        /*Création JSON pour affichage en AJAX*/

        if ($request->isXmlHttpRequest()) {

            $id = $request->query->get("companyId");
            $selectedDate = $request->query->get("selectedDate");


            $releaseDate = new \DateTime((string) $selectedDate);
            $temp = $releaseDate->format('Y-m-d H:i:s');

            /*Requête dans l'historique qui retourne la dernieère MAJ*/
            $found = $repo->findByDate($id, $temp);

            $found = $found[0];

            $company = [];
            $company["id"] = $found->getId();
            $company["name"] = $found->getName();
            $company["siren"] = $found->getSiren();
            $company["legalform"] = $found->getLegalform()->getName();
            $company["registrationCity"] = $found->getRegistrationCity();
            $company["registrationDate"] = ($found->getRegistrationDate())->format('d-m-Y');
            $company["capital"] = $found->getCapital();
            $company["streetNumber1"] = $found->getStreetNumber1();
            $company["wayType1"] = $found->getWayType1();
            $company["wayName1"] = $found->getWayName1();
            $company["city1"] = $found->getCity1();
            $company["postCode1"] = $found->getPostCode1();
            $company["streetNumber2"] = $found->getStreetNumber2();
            $company["wayType2"] = $found->getWayType2();
            $company["wayName2"] = $found->getWayName2();
            $company["city2"] = $found->getCity2();
            $company["postCode2"] = $found->getPostCode2();
            $company["streetNumber3"] = $found->getStreetNumber3();
            $company["waytype3"] = $found->getWaytype3();
            $company["wayName3"] = $found->getWayName3();
            $company["city3"] = $found->getCity3();
            $company["postCode3"] = $found->getPostCode3();
            $company["updatedAt"] = ($found->getUpdatedAt())->format('d-m-Y H:i:s');


            return new JsonResponse([$company]);
        }

        return $this->render("company/show.html.twig");
    }

    /**
     * @Route("/index", name="company_index", methods={"GET"})
     */
    public function index(CompanyRepository $companyRepository): Response
    {
        return $this->render('company/index.html.twig', [
            'companies' => $companyRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="company_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {

        /*Ajout dans les tables Company et CompanyHistory*/

        $company = new Company();
        $history = new CompanyHistory();
        $form = $this->createForm(Company1Type::class, $company);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $excistingCompanies = $entityManager->getRepository(Company::class)->findAll();


            if ($excistingCompanies) {

                foreach ($excistingCompanies as $excistingCompany) {

                    if ($excistingCompany->getName() == $company->getName()) {

                        $this->addFlash("danger", "La société '" . $company->getName() . "' existe déjà dans le listing. Merci de vérifier et de modifier les données existantes de la société.");
                        return $this->redirectToRoute('company_index');
                    } else {

                        $history->setName($company->getName());
                        $history->setSiren($company->getSiren());
                        $history->setRegistrationCity($company->getRegistrationCity());
                        $history->setRegistrationDate($company->getRegistrationDate());
                        $history->setCapital($company->getCapital());
                        $history->setStreetNumber1($company->getStreetNumber1());
                        $history->setWayType1($company->getWayType1());
                        $history->setWayName1($company->getWayName1());
                        $history->setCity1($company->getCity1());
                        $history->setPostCode1($company->getPostCode1());
                        $history->setStreetNumber2($company->getStreetNumber2());
                        $history->setWayType2($company->getWayType2());
                        $history->setWayName2($company->getWayName2());
                        $history->setCity2($company->getCity2());
                        $history->setPostCode2($company->getPostCode2());
                        $history->setStreetNumber3($company->getStreetNumber3());
                        $history->setWaytype3($company->getWaytype3());
                        $history->setWayName3($company->getWayName3());
                        $history->setCity3($company->getCity3());
                        $history->setPostCode3($company->getPostCode3());
                        $history->setLegalform($company->getLegalform());
                        $history->setCompany($company);
                        $history->setUpdatedAt(new \DateTime('now'));
                        $company->setCreatedAt(new \DateTime('now'));
                        $company->setUpdatedAt(new \DateTime('now'));

                        $entityManager->persist($company);
                        $entityManager->persist($history);
                        $entityManager->flush();
                    }
                    $this->addFlash("success", "La société '" . $company->getName() . "' a bien été rajouté au listing.");
                    return $this->redirectToRoute('company_index');
                }
            } else {

                $history->setName($company->getName());
                $history->setSiren($company->getSiren());
                $history->setRegistrationCity($company->getRegistrationCity());
                $history->setRegistrationDate($company->getRegistrationDate());
                $history->setCapital($company->getCapital());
                $history->setStreetNumber1($company->getStreetNumber1());
                $history->setWayType1($company->getWayType1());
                $history->setWayName1($company->getWayName1());
                $history->setCity1($company->getCity1());
                $history->setPostCode1($company->getPostCode1());
                $history->setStreetNumber2($company->getStreetNumber2());
                $history->setWayType2($company->getWayType2());
                $history->setWayName2($company->getWayName2());
                $history->setCity2($company->getCity2());
                $history->setPostCode2($company->getPostCode2());
                $history->setStreetNumber3($company->getStreetNumber3());
                $history->setWaytype3($company->getWaytype3());
                $history->setWayName3($company->getWayName3());
                $history->setCity3($company->getCity3());
                $history->setPostCode3($company->getPostCode3());
                $history->setLegalform($company->getLegalform());
                $history->setCompany($company);
                $history->setUpdatedAt(new \DateTime('now'));
                $company->setCreatedAt(new \DateTime('now'));
                $company->setUpdatedAt(new \DateTime('now'));

                $entityManager->persist($company);
                $entityManager->persist($history);
                $entityManager->flush();
            }
            $this->addFlash("success", "La société '" . $company->getName() . "' a bien été rajouté au listing.");
            return $this->redirectToRoute('company_index');
        }


        return $this->render('company/new.html.twig', [
            'company' => $company,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="company_show", methods={"GET"})
     */
    public function show(Company $company, Request $request): Response
    {
        return $this->render('company/show.html.twig', [
            'company' => $company,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="company_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Company $company): Response
    {
        /*Modification des éléments Company et enregistrement de la nouvelle version dans CompanyHistory*/

        $form = $this->createForm(Company1Type::class, $company);
        $form->handleRequest($request);
        $history = new CompanyHistory();

        if ($form->isSubmitted() && $form->isValid()) {

            $this->getDoctrine()->getManager()->flush();

            $entityManager = $this->getDoctrine()->getManager();
            $history->setName($company->getName());
            $history->setSiren($company->getSiren());
            $history->setRegistrationCity($company->getRegistrationCity());
            $history->setRegistrationDate($company->getRegistrationDate());
            $history->setCapital($company->getCapital());
            $history->setStreetNumber1($company->getStreetNumber1());
            $history->setWayType1($company->getWayType1());
            $history->setWayName1($company->getWayName1());
            $history->setCity1($company->getCity1());
            $history->setPostCode1($company->getPostCode1());
            $history->setStreetNumber2($company->getStreetNumber2());
            $history->setWayType2($company->getWayType2());
            $history->setWayName2($company->getWayName2());
            $history->setCity2($company->getCity2());
            $history->setPostCode2($company->getPostCode2());
            $history->setStreetNumber3($company->getStreetNumber3());
            $history->setWaytype3($company->getWaytype3());
            $history->setWayName3($company->getWayName3());
            $history->setCity3($company->getCity3());
            $history->setPostCode3($company->getPostCode3());
            $history->setLegalform($company->getLegalform());
            $history->setCompany($company);
            $history->setUpdatedAt(new \DateTime('now'));

            $entityManager->persist($history);
            $entityManager->persist($history);
            $entityManager->flush();

            $this->addFlash("success", "La société '" . $company->getName() . "' a bien été mise à jour dans le listing.");
            return $this->redirectToRoute('company_index');
        }

        return $this->render('company/edit.html.twig', [
            'company' => $company,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="company_delete", methods={"POST"})
     */
    public function delete(Request $request, Company $company): Response
    {
        if ($this->isCsrfTokenValid('delete' . $company->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($company);
            $entityManager->flush();
        }
        $this->addFlash("success", "La société '" . $company->getName() . "' a bien été supprimée du listing.");
        return $this->redirectToRoute('company_index');
    }
}
