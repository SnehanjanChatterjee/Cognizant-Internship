<?php

namespace App\Controller;

use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

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
    public function createBook(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $book = new Book();
        $book->setTitle('First Book');
        $book->setChapters('Chapter 1');
        $book->setAuthor('Author 1');
        $book->setDescription('This is the first book of author 1');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($book);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$book->getId());

        // return $this->render('book/index.html.twig', [
        //     'controller_name' => 'BookController',
        // ]);
    }
    /**
     * @Route("/book/view/{id<\d+>?0}", name="book_view")
     */
    public function viewBook($id): Response
    {
        $bookRepository = $this->getDoctrine()->getRepository(Book::class);
        if($id > 0)
        {
            $book = $bookRepository->find($id);
    
            if (!$book) {
                throw $this->createNotFoundException(
                    'No product found for id '.$id
                );
            }
    
            return new Response('Check out this great product: '.$book->getTitle());
        }
        else{

            $allBooks = $bookRepository -> findAll();

            foreach($allBooks as $key => $book){
                $books[$book->getId()]['title'] = $book->getTitle();
                $books[$book->getId()]['description'] = $book->getDescription();
                $books[$book->getId()]['author'] = $book->getAuthor();
                $books[$book->getId()]['chapters'] = $book->getChapters();
            }

            print_r($books);
            exit;

            if (!$book) {
                throw $this->createNotFoundException(
                    'No product found for id .'
                );
            }
    
            return new Response('Check out this great product: '.$book);
            // return new Response('Enter id to see books');
        }
    }
    /**
     * @Route("/book/edit/{id<\d+>?0}", name="book_edit")
     */
    public function editBook($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $bookRepository = $entityManager->getRepository(Book::class);

        $book = $bookRepository->find($id);

        $book->setTitle('Second Book');
        $book->setChapters('Chapter 2');
        $book->setAuthor('Author 2');
        $book->setDescription('This is the first book of author 2');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($book);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->redirectToRoute('book_view');
    }
}
