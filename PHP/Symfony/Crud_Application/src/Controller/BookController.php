<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use App\Form\BookType1Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    /**
     * @Route("/book", name="book")
     */
    public function index()
    {
        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
        ]);
    }

    /**
    * @Route("/book/create", name="book_create")
    */
    public function createBook(Request $request): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();
        // Empty Book Object
        $book = new Book();

        $form = $this->createForm(BookType::class, $book);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // getData populates the Book entity with form submitted values
            $book = $form->getData();

            // tell Doctrine you want to (eventually) save the Product (no queries yet)
            $entityManager->persist($book);
    
             // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();

            if( $book->getId() ){
                return $this->redirectToRoute('book_view');
            }

        }

        return $this->render('book/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    
    // public function editBook(Request $request, $id): Response
    // {
    //     $entityManager = $this->getDoctrine()->getManager();

    //     // Empty Book Object
    //     $book = new Book();

    //     // $book = $this->getDoctrine()->getRepository(Book::class)->find($id);

    //     $form = $this->createForm(BookType::class, $book);

    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {

    //         $book = $form->getData();

    //         // tell Doctrine you want to (eventually) save the Product (no queries yet)
    //         $entityManager->persist($book);

    //         // actually executes the queries (i.e. the INSERT query)
    //         $entityManager->flush();

    //         // $this->addFlash('success', 'Article Created! Knowledge is power!');
    //         return $this->redirectToRoute('book_view');
    //     }
    //     return $this->redirectToRoute('book_view');
    // }

    // public function editBook($id, Request $request) { 

    //     $entityManager= $this->getDoctrine()->getManager(); 
    //     $bk = $entityManager->getRepository(Book::class)->find($id);  
         
    //     if (!$bk) { 
    //        throw $this->createNotFoundException( 
    //           'No book found for id '.$id 
    //        ); 
    //     }  

    //     // $form = $this->createFormBuilder($bk) 
    //     //    ->add('title', TextType::class) 
    //     //    ->add('author', TextType::class) 
    //     //    ->add('price', TextType::class) 
    //     //    ->add('save', SubmitType::class, array('label' => 'Submit')) 
    //     //    ->getForm();  
    //     $form = $this->createForm(BookType::class, $bk);
    //     $form->handleRequest($request);  
        
    //     if ($form->isSubmitted() && $form->isValid()) { 

    //        $book = $form->getData(); 

    //        $entityManager = $this->getDoctrine()->getManager();  
           
    //        // tells Doctrine you want to save the Product 
    //        $entityManager->persist($book);  
             
    //        //executes the queries (i.e. the INSERT query) 
    //        $entityManager->flush();

    //        return $this->redirectToRoute('book_view'); 
    //     } 
    //     else {  
    //         return $this->redirectToRoute('book_view');
    //     } 
    // }    
    /**
    * @Route("/book/edit/{id<\d+>}", name="book_edit")
    */ 
    public function editBook(Request $request, $id ) { 

        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $bk = $entityManager->getRepository(Book::class)->find($id);

        // print_r($bk);

        if (!$bk) {
            throw $this->createNotFoundException(
                'There are no books with the following id: ' . $id
            );
        }

        $form = $this->createForm(BookType1Type::class, $bk);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // getData populates the Book entity with form submitted values
            $book = $form->getData();

            // tell Doctrine you want to (eventually) save the Product (no queries yet)
            $entityManager->persist($book);

            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();

            return $this->redirectToRoute('book_view');
        }
        return $this->render('book/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }    

    /**
    * @Route("/book/view/{id<\d+>?0}", name="book_view")
    */
    public function viewBook($id): Response
    {
        $books = array();
        
        $bookRepository = $this->getDoctrine()->getRepository(Book::class);

        if ($id > 0 ){
            $book = $bookRepository->find($id);

            if (!$book) {
                throw $this->createNotFoundException(
                    'No book found for id '.$id
                );
            }
            
            return $this->render('book/single.html.twig', [
                'book_name' => $book->getTitle()
            ]);
        }else{
            $allBooks = $bookRepository->findAll();

            if (!$allBooks) {
                throw $this->createNotFoundException(
                    'No book found for id'
                );
            }

            foreach( $allBooks as $key => $book ){
                 $books[$book->getId()]['id'] = $book->getId();
                 $books[$book->getId()]['title'] = $book->getTitle();
                 $books[$book->getId()]['description'] = $book->getDescription();
                 $books[$book->getId()]['author'] = $book->getAuthor();
                 $books[$book->getId()]['chapters'] = $book->getChapters();
            }

            return $this->render('book/all.html.twig', [
                'books' => $books
            ]);
        }

        //return new Response('Check out this great product: '.$book->getName());
        
    }
    /**
    * @Route("/book/delete/{id<\d+>}", name="book_delete")
    */ 
    public function deleteBook(Request $request, $id ) { 

        $doct = $this->getDoctrine()->getManager(); 

        $bk = $doct->getRepository(Book::class)->find($id); 
        
        if (!$bk) { 
            throw $this->createNotFoundException('No book found for id '.$id); 
        } 
        $doct->remove($bk); 
        $doct->flush(); 
        return $this->redirectToRoute('book_view');
    } 
}