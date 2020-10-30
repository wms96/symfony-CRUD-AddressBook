<?php

namespace AppBundle\Controller;

use AppBundle\Datatables\AddressBookDatatable;
use AppBundle\Entity\AddressBook;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Intl\Intl;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\File;

class AddressBookController extends Controller
{
    /**
     * Lists all Post entities.
     *
     * @param Request $request
     *
     * @Route("/", name="index")
     *
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $isAjax = $request->isXmlHttpRequest();
        $datatable = $this->get('sg_datatables.factory')->create(AddressBookDatatable::class);
        $datatable->buildDatatable();

        if ($isAjax) {
            $responseService = $this->get('sg_datatables.response');
            $responseService->setDatatable($datatable);
            $responseService->getDatatableQueryBuilder();

            return $responseService->getResponse();
        }

        return $this->render('default/index.html.twig', array(
            'datatable' => $datatable,
        ));
    }

    /**
     * @Route("/create")
     */
    public function createAction(Request $request)
    {
        $addressEntity = new AddressBook();
        $form = $this->buildForm($addressEntity);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->save($form);
            return $this->redirectToRoute('index');
        }

        return $this->render(
            'default/edit.html.twig',
            ['form' => $form->createView()]
        );

    }

    private function buildForm(AddressBook $addressEntity)
    {
        $countries = array_flip(Intl::getRegionBundle()->getCountryNames());
        return $this->createFormBuilder($addressEntity)
            ->setAttribute('class', 'resolved-form exempt-from-default-ajax')
            ->add('first_name', TextType::class,
                ['attr' => ['maxlength' => 100, 'class' => "form-control mb-4", 'class' => "form-control mb-4",]])
            ->add('last_name', TextType::class,
                ['attr' => ['maxlength' => 100, 'class' => "form-control mb-4", 'class' => "form-control mb-4",]])
            ->add('street_address', TextareaType::class,
                ['attr' => ['maxlength' => 255, 'class' => "form-control mb-4",]])
            ->add('zip_code', TextareaType::class,
                ['attr' => ['maxlength' => 255, 'class' => "form-control mb-4"],'required' => false])
            ->add('city', TextareaType::class,
                ['attr' => ['maxlength' => 255, 'class' => "form-control mb-4",]])
            ->add('country', ChoiceType::class, [
                'choices' => $countries,
                'attr' => ['class' => "form-control mb-4"],
            ])
            ->add('phone_number', TextareaType::class,
                ['attr' => ['maxlength' => 50, 'class' => "form-control mb-4",]])
            ->add('birthday', DateType::class, [
                'attr' => ['class' => "form-control mb-4"],
                'widget' => 'single_text',
                'input' => 'string'
            ])
            ->add('email_address', TextareaType::class,
                ['attr' => ['maxlength' => 100, 'class' => "form-control mb-4",]])
            ->add('picture', FileType::class, [
                'label' => 'Picture',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/*',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image',
                    ])
                ],
            ])
            ->add('save', SubmitType::class, ['label' => 'Save',
                'attr' => ['class' => "btn btn-primary  btn-block mt-4"]])
            ->getForm();
    }


    private function save($form)
    {

        $picturesPath = './pictures';
        $addressEntity = $form->getData();
        $em = $this->getDoctrine()->getManager();
        $picture = $form->get('picture')->getData();

        if ($picture) {
            $photo = $addressEntity->getPicture();
            if ($photo &&  file_exists($photo)) {
                // to delete old image from disk
                    unlink($photo);
            }

            // we concat time as unix and random number to name to get unique name
            $originalFilename = pathinfo($picture->getClientOriginalName(). time (). rand(). '.' . $picture->guessExtension(), PATHINFO_FILENAME);
            // this is needed to safely include the file name as part of the URL
            $newFilename = $picturesPath . '/' . $originalFilename;
            try {
                $picture->move(
                    $picturesPath,
                    $originalFilename
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }

            $addressEntity->setPicture($newFilename);
            $em->persist($addressEntity);
            $em->flush();
        } else {
            $em->persist($addressEntity);
            $em->flush();
        }

        return ["form" => $form, "id" => $addressEntity->getId()];
    }

    /**
     * @Route("edit/{id}", name = "edit", options = {"expose" = true})
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $addressEntity = $em->getRepository(AddressBook::class)->find($id);
        if (!$addressEntity) {
            throw $this->createNotFoundException(
                'There are no articles with the following id: ' . $id
            );
        }
        $form = $this->buildForm($addressEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->save($form);
            return $this->redirectToRoute('index');

        }
        $picture = $addressEntity->getPicture();
        return $this->render(
            'default/edit.html.twig',
            ['form' => $form->createView(), "picture" => $picture]
        );
    }

    /**
     * @Route("delete/{id}", name = "delete", options = {"expose" = true})
     */
    public function deleteArticle(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $addressEntity = $em->getRepository(AddressBook::class)->find($id);

        if (!$addressEntity) {
            throw $this->createNotFoundException(
                'There are no articles with the following id: ' . $id
            );
        }

        $photo = $addressEntity->getPicture();
        if ($photo &&  file_exists($photo)) {
            unlink($photo);
        }

        $em->remove($addressEntity);
        $em->flush();

        return $this->redirect('/');
    }
}
