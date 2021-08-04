<?php

namespace App\Controller;

use App\Entity\ReservedRoom;
use App\Form\ReservedRoomType;
use App\Repository\ReservedRoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reserved/room')]
class ReservedRoomController extends AbstractController
{
    #[Route('/', name: 'reserved_room_index', methods: ['GET'])]
    public function index(ReservedRoomRepository $reservedRoomRepository): Response
    {
        return $this->render('reserved_room/index.html.twig', [
            'reserved_rooms' => $reservedRoomRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'reserved_room_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $reservedRoom = new ReservedRoom();
        $form = $this->createForm(ReservedRoomType::class, $reservedRoom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reservedRoom);
            $entityManager->flush();

            return $this->redirectToRoute('reserved_room_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reserved_room/new.html.twig', [
            'reserved_room' => $reservedRoom,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'reserved_room_show', methods: ['GET'])]
    public function show(ReservedRoom $reservedRoom): Response
    {
        return $this->render('reserved_room/show.html.twig', [
            'reserved_room' => $reservedRoom,
        ]);
    }

    #[Route('/{id}/edit', name: 'reserved_room_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ReservedRoom $reservedRoom): Response
    {
        $form = $this->createForm(ReservedRoomType::class, $reservedRoom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reserved_room_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reserved_room/edit.html.twig', [
            'reserved_room' => $reservedRoom,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'reserved_room_delete', methods: ['POST'])]
    public function delete(Request $request, ReservedRoom $reservedRoom): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservedRoom->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reservedRoom);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reserved_room_index', [], Response::HTTP_SEE_OTHER);
    }
}
