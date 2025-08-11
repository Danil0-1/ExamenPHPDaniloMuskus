<?php
namespace App\Controllers;

use App\Domain\Repositories\PlantasRepositoryInterface;
use App\DTOs\PlantasDTO;
use App\UseCases\CreatePlantas;
use App\UseCases\GetAllPlantas;
use App\UseCases\GetByIdPlantas;
use App\UseCases\UpdatePlantas;
use App\UseCases\DeletePlantas;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PlantasController {
    public function __construct(private PlantasRepositoryInterface $repo) {}

    public function index(Request $request, Response $response): Response {
        $useCase = new GetAllPlantas($this->repo);
        $Plantas = $useCase->execute();
        $response->getBody()->write(json_encode($Plantas));
        return $response;
    }

    public function show(Request $request, Response $response, array $args): Response {
        $useCase = new GetByIdPlantas($this->repo);
        $id = (int) $args['id'];
        $Plantas = $useCase->execute($id);
        if (!$Plantas) {
            $response->getBody()->write(json_encode(["error" => "Plantas no registrado en la plataforma"]));
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode($Plantas));
        return $response;
    }

    public function store(Request $request, Response $response): Response {
        $data = $request->getParsedBody();
        $data = PlantasDTO::fromArray($data);
        $useCase = new CreatePlantas($this->repo);
        $Plantas = $useCase->execute($data);
        $response->getBody()->write(json_encode($Plantas));
        return $response->withStatus(201);
    }

    public function update(Request $request, Response $response, array $args): Response {
        $id = $args['id']; // SIN (int)
        $data = $request->getParsedBody();
        $data = PlantasDTO::fromArray($data);
        $useCase = new UpdatePlantas($this->repo);
        $success = $useCase->execute($id, $data);
        if (!$success) {
            $response->getBody()->write(json_encode(["error" => " Plantas no registrado en la plataforma"]));
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode(['message' => ' Plantas Actualizada']));
        return $response->withStatus(200);
    }
    public function destroy(Request $request, Response $response, array $args): Response {
        $id = $args['id'];
    
        $useCase = new DeletePlantas($this->repo);
        $success = $useCase->execute($id);
    
        if (!$success) {
            $response->getBody()->write(json_encode([
                "error" => "Plantas no encontrada o ya fue eliminada"
            ]));
            return $response->withStatus(404);
        }
    
        $response->getBody()->write(json_encode(['message' => 'Plantas Eliminada']));
        return $response->withStatus(200);
    }
    
}
