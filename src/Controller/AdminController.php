<?php
namespace App\Controller;


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
     * 
     * @Route("/admin", name="app_admin")
     * 
     * @ param SynopsisRepository $SynopsisRepository
     *   
     */
   
    public function AddAnime(Request $request, SluggerInterface $slugger)
    {
        

        $form = $this->createForm(SynopsisFormType::class, new Synopsis());
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $EntityManager = $this->getDoctrine()->getManager();
            $synopsis = $form->getData();
            $imageFile = $form->get('AnimeImage')->getData();
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('image_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    $this->addFlash('error', 'Image cannot be saved.');
                }
                $synopsis->setAnimeImage($newFilename);
            }
            $EntityManager->persist($synopsis);
            $EntityManager->flush();
            $this->addFlash('<h3>Anime Added!</h3>');

            return $this->redirectToRoute('app_admin');
                }        return $this->render('admin/index.html.twig', [
            'form' => $form->createView()
        ]);
        
       
    }
    /**
     * @Route("/list", name="app_list")
     * @param SynopsisRepository $synopsisRepository
     */
    public function List(SynopsisRepository $synopsisRepository)
    {
        return $this->render('admin/ListeAnime.html.twig', ['synopsis' => $synopsisRepository->findAll(),
        
    ]);
    }
}