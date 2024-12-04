<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Task;
use App\Repository\TaskRepository;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class TaskController extends AbstractController
{
    #[Route('/task', name: 'create_task', methods: ['POST'])]
    public function create_task(Request $request, EntityManagerInterface $entityManager, ValidatorInterface $validator): JsonResponse
    {
        $content = json_decode($request->getContent());

        $task = new Task();
        $task->setTitle($content->title);
        $task->setDescription($content->description);
        $task->setStatus($content->status);

        $currentDateTime = new \DateTime();
        $task->setCreatedAt($currentDateTime);

        $errors = $validator->validate($task);

        if (count($errors) > 0) {
            return new JsonResponse(['errors' => (string) $errors], JsonResponse::HTTP_BAD_REQUEST);
        }

        $entityManager->persist($task);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Task created'], JsonResponse::HTTP_CREATED);
    }

    #[Route('/task/{id}', name: 'update_task', methods: ['PUT'])]
    public function update_task($id, Request $request, EntityManagerInterface $entityManager, ValidatorInterface $validator, TaskRepository $taskRepository)
    {
        $content = json_decode($request->getContent());
        $task = $taskRepository->find($id);

        $task->setTitle($content->title);
        $task->setDescription($content->description);
        $task->setStatus($content->status);

        $currentDateTime = new \DateTime();
        $task->setUpdatedAt($currentDateTime);

        $errors = $validator->validate($task);

        if (count($errors) > 0) {
            return new JsonResponse(['errors' => (string) $errors], JsonResponse::HTTP_BAD_REQUEST);
        }

        $entityManager->persist($task);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Task updated'], JsonResponse::HTTP_CREATED);
    }

    #[Route('/task/{id}', name: 'delete_task', methods: ['DELETE'])]
    public function delete_task($id, Request $request, EntityManagerInterface $entityManager, ValidatorInterface $validator, TaskRepository $taskRepository)
    {
        $task = $taskRepository->find($id);

        if (!$task) {
            return $this->json(['error' => 'Task not found'], 404);
        }

        $entityManager->remove($task);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Task deleted'], JsonResponse::HTTP_CREATED);
    }

    #[Route('/task', name: 'show_task', methods: ['GET'])]
    public function show_task(TaskRepository $taskRepository)
    {
        $task = $taskRepository->findAll();
        return $this->json($task);
    }
}
