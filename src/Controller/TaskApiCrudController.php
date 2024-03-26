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
#[Route('/task/api')]
class TaskApiCrudController extends AbstractController
{

    #[Route('', name: 'app_task_api_new', methods: ['GET', 'POST'])]
    /**
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param validatorInterface $validator
     *
     * @return Response
     */
    public function new(
        Request $request,
        EntityManagerInterface $entityManager,
        validatorInterface $validator
    ): Response {
        $constraints = Validation::getConstrains();
        $response = [];
        $responseItem = [];

        $postData = $request->toArray();

        $postData["priority"] = (int)$postData["priority"];
        $validationResult = $validator->validate($postData, $constraints);

        if (count($validationResult) > 0) {
            foreach ($validationResult as $result) {
                $responseItem[$result->getPropertyPath()] = $result->getMessage();
            }
            $response['validate_error'] = $responseItem;
        } else {
            $response[] = "validate_success";
            try {
                $task = new Task();
                $task->setTitle($postData["title"]);
                $task->setDescription($postData["description"]);
                $task->setPriority($postData["priority"]);
                $task->setStatus($postData["status"]);
                $task->setCreatedAt(new \DateTime());
                $task->setUserId($postData["user_id"]);
                if (isset($postData["parent_id"]) && $postData["parent_id"] != null) {
                    $task->setParentId($postData["parent_id"]);
                }
                $entityManager->persist($task);
                $entityManager->flush();
                $response[] = $task->getId();
                $response[] = "insert_success";
            } catch (\Exception $e) {
                $response['insert_errror'] = $e->getMessage();
            }
        }
        return $this->json($response);
    }
    #[Route('/{user_id}/{id}', name: 'app_task_api_edit', methods: ['GET', 'PUT'])]
    /**
     * @param Request $request
     * @param Task $task
     * @param EntityManagerInterface $entityManager
     * @param validatorInterface $validator
     * @param TaskRepository $taskRepository
     *
     * @return Response
     */
    public function edit(
        Request $request,
        Task $task,
        EntityManagerInterface $entityManager,
        validatorInterface $validator,
        TaskRepository $taskRepository
    ): Response {

        $response = [];
        $responseItem = [];

        $postData = $request->toArray();
        $postData["priority"] = (int)$postData["priority"];

        $constraints = Validation::getConstrains("edit", $task->getUserId());
        $postData["user_id"] = (int)$request->get('user_id');

        $validationResult = $validator->validate($postData, $constraints);
        if (count($validationResult) > 0) {
            foreach ($validationResult as $result) {
                $responseItem[$result->getPropertyPath()] = $result->getMessage();
            }
            $response['validate_error'] = $responseItem;
        } else {
            $response[] = "validate_success";
            try {
                $task->setTitle($postData["title"]);
                $task->setDescription($postData["description"]);
                $task->setPriority($postData["priority"]);
                $task->setStatus($postData["status"]);
                $task->setCreatedAt(new \DateTime());
                $entityManager->persist($task);
                $entityManager->flush();
                $response[] = $task->getId();
                $response[] = "update_success";
            } catch (\Exception $e) {
                $response['update_errror'] = $e->getMessage();
            }
        }
        return $this->json($response);
    }

    #[Route('/{user_id}/{id}/{status}', name: 'app_task_ip_new_salary', methods: ['GET', 'PATCH'])]
    /**
     * @param Request $request
     * @param task $task
     * @param EntityManagerInterface $entityManager
     * @param validatorInterface $validator
     * @param taskRepository $taskRepository
     *
     * @return Response
     */
    public function changeStatus(
        Request $request,
        task $task,
        EntityManagerInterface $entityManager,
        validatorInterface $validator,
        taskRepository $taskRepository,
        TasksTree $taskTree
    ): Response {

        $constraints = Validation::getConstrains("status", $task->getUserId());
        $response = [];
        $responseItem = [];
        $postData = [];
        $id = (int)$request->get('id');
        $user_id = (int)$request->get('user_id');
        $postData["id"] = $id;
        $postData["user_id"] = $user_id;
        $postData["status"] = $request->get('status');
        $criteria = ['parent_id' => $id];

        $tasks = $taskTree->findChildrenTasksTodo($id);
        try {
            $task->setStatus($postData["status"]);
            $entityManager->persist($task);
            $entityManager->flush();
            $response[] = "update_status_success";
        } catch (\Exception $e) {
            $response['update_status_errror'] = $e->getMessage();
        }
        return $this->json($tasks);
    }
    #[Route('/{user_id}/{id}', name: 'app_task_api_delete', methods: ['DELETE'])]
    /**
     * @param Request $request
     * @param task $task
     * @param EntityManagerInterface $entityManager
     *
     * @return Response
     */
    public function delete(
        Request $request,
        Task $task,
        validatorInterface $validator,
        EntityManagerInterface $entityManager
    ): Response {
        $response = [];
        $responseItem = [];

        $postData = [];
        $postData["user_id"] = (int)$request->get('user_id');
        $postData["status"] = $task->getStatus();

        $constraints = Validation::getConstrains("delete", $task->getUserId());

        $validationResult = $validator->validate($postData, $constraints);
        if (count($validationResult) > 0) {
            foreach ($validationResult as $result) {
                $responseItem[$result->getPropertyPath()] = $result->getMessage();
            }
            $response['validate_error'] = $responseItem;
        } else {
            try {
                $entityManager->remove($task);
                $entityManager->flush();
                $response[] = 'delete_success';
            } catch (\Exception $e) {
                $response['delete_errror'] = $e->getMessage();
            }
        }
        return $this->json($response);
    }
}
