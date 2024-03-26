<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TaskRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Monolog\DateTimeImmutable;
use App\Entity\Status;
use App\Entity\User;
use App\Entity\Task;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Service\Validation;
use App\Service\TasksTree;

/**
 * TaskApiController uses OpenAPI and has actions:
 * 4 ones for crud, one - for changing only one field: 'current salary'
 * used API with five entrypoints
 * create a tree of a tasks of a one
 *
 *
* @author Vadim Podolyan <vadim.podolyan@gmail.com>
*
 */
#[Route('/task/api/filter')]
class TaskApiFilterController extends AbstractController
{
    
    #[Route('/{user_id}/status/{status}', name: 'app_task_status', methods: ['GET'])]
    /**
     * @param Request $request
     * @param TaskRepository $taskRepository
     *
     * @return Response
     */
    public function status(Request $request, TaskRepository $taskRepository): Response
    {
        $user_id = $request->get('user_id');
        $status = $request->get('status');
        $criteria = ['user_id' => $user_id, 'status' => $status];
        $tasks = $taskRepository->findBy($criteria);
        return $this->json($tasks);
    }
    #[Route('/{user_id}/priority/{priority}', name: 'app_task_priority', methods: ['GET'])]
    /**
     * @param Request $request
     * @param TaskRepository $taskRepository
     *
     * @return Response
     */
    public function priority(Request $request, TaskRepository $taskRepository): Response
    {
        $user_id = $request->get('user_id');
        $priority = $request->get('priority');
        $criteria = ['user_id' => $user_id, 'priority' => $priority];
        $tasks = $taskRepository->findBy($criteria);
        return $this->json($tasks);
    }
    #[Route('/{user_id}/title/{title}', name: 'app_task_title', methods: ['GET'])]
    /**
     *  Filter by Title
     * @param Request $request
     * @param TaskRepository $taskRepository
     *
     * @return Response
     */
    public function title(Request $request, TaskRepository $taskRepository): Response
    {
        $user_id = $request->get('user_id');
        $title = $request->get('title');
        $tasks = $taskRepository->findByTitle($title, $user_id);
        //$tasks = gettype($tasks);
        return $this->json($tasks);
    }
    #[Route('/{user_id}/description/{description}', name: 'app_task_description', methods: ['GET'])]
    /**
     * Filter by Description
     * @param Request $request
     * @param TaskRepository $taskRepository
     *
     * @return Response
     */
    public function description(Request $request, TaskRepository $taskRepository): Response
    {
        $user_id = $request->get('user_id');
        $description = $request->get('description');
        $tasks = $taskRepository->findByDescription($description, $user_id);
        return $this->json($tasks);
    }
}
