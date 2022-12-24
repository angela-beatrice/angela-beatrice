<?php

use App\Entity\Synopsis;
use App\Form\SynopsisFormType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Repository\SynopsisRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\String\Slugger\SluggerInterface;

class AdminController extends AbstractController
{
    /**
     *
     * 
     * @Route("/edit", name="app_edit")
     * 
     * @ param SynopsisRepository $SynopsisRepository
     *   
     */
    public function editSynopsis(Synopsis $synopsis, Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger)
    {
        $synopsis->setImage(new File(sprintf('%s/%s', $this->getParameter('image_directory'), $blog->getAnimeImage())));
        $form = $this->createForm(SynopsisFormType::class, $synopsis);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $synopsis      = $form->getData();
            $imageFile = $form->get('imageFile')->getData();
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);

                $safeFilename = $slugger->slug($originalFilename);
                $newFilename  = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move(
                            $this->getParameter('image_directory'),
                            $newFilename
                        );
                } catch (FileException $e) {
                    $this->addFlash('error', 'Image cannot be saved.');
                }
                $synopsis->setImage($newFilename);
            }

            $entityManager->persist($synopsis);
            $entityManager->flush();
            $this->addFlash('success', 'Anime was edited!');
        }

        return $this->render('edit/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
