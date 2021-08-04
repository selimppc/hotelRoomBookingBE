<?php

namespace App\Controller;

use App\Entity\OccupiedRoom;
use App\Form\OccupiedRoomType;
use App\Repository\OccupiedRoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/occupied/room')]
class OccupiedRoomController extends AbstractController
{
    #[Route('/', name: 'occupied_room_index', methods: ['GET'])]
    public function index(OccupiedRoomRepository $occupiedRoomRepository): Response
    {
        return $this->render('occupied_room/index.html.twig', [
            'occupied_rooms' => $occupiedRoomRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'occupied_room_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $occupiedRoom = new OccupiedRoom();
        $form = $this->createForm(OccupiedRoomType::class, $occupiedRoom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($occupiedRoom);
            $entityManager->flush();

            return $this->redirectToRoute('occupied_room_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('occupied_room/new.html.twig', [
            'occupied_room' => $occupiedRoom,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'occupied_room_show', methods: ['GET'])]
    public function show(OccupiedRoom $occupiedRoom): Response
    {
        return $this->render('occupied_room/show.html.twig', [
            'occupied_room' => $occupiedRoom,
        ]);
    }

    #[Route('/{id}/edit', name: 'occupied_room_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, OccupiedRoom $occupiedRoom): Response
    {
        $form = $this->createForm(OccupiedRoomType::class, $occupiedRoom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('occupied_room_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('occupied_room/edit.html.twig', [
            'occupied_room' => $occupiedRoom,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'occupied_room_delete', methods: ['POST'])]
    public function delete(Request $request, OccupiedRoom $occupiedRoom): Response
    {
        if ($this->isCsrfTokenValid('delete'.$occupiedRoom->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($occupiedRoom);
            $entityManager->flush();
        }

        return $this->redirectToRoute('occupied_room_index', [], Response::HTTP_SEE_OTHER);
    }
}
