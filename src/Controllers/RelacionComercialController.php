<?php
namespace App\Controllers;

use App\Domain\Repositories\RelacionComercialRepositoryInterface;
use App\DTOs\RelacionComercialDTO;
use App\UseCases\CreateRelacionComercial;
use App\UseCases\GetAllRelacionComercial;
use App\UseCases\GetByIdRelacionComercial;
use App\UseCases\UpdateRelacionComercial;
use App\UseCases\DeleteRelacionComercial;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class RelacionComercialController {
    public function __construct(private RelacionComercialRepositoryInterface $repo) {}

    public function index(Request $request, Response $response): Response {
        $useCase = new GetAllRelacionComercial($this->repo);
        $RelacionComercial = $useCase->execute();
        $response->getBody()->write(json_encode($RelacionComercial));
        return $response;
    }

    public function show(Request $request, Response $response, array $args): Response {
        $useCase = new GetByIdRelacionComercial($this->repo);
        $id = (int) $args['id'];
        $RelacionComercial = $useCase->execute($id);
        if (!$RelacionComercial) {
            $response->getBody()->write(json_encode(["error" => "Relacion Comercial no registrado en la plataforma"]));
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode($RelacionComercial));
        return $response;
    }

    public function store(Request $request, Response $response): Response {
        $data = $request->getParsedBody();
        $data = RelacionComercialDTO::fromArray($data);
        $useCase = new CreateRelacionComercial($this->repo);
        $RelacionComercial = $useCase->execute($data);
        $response->getBody()->write(json_encode($RelacionComercial));
        return $response->withStatus(201);
    }

    public function update(Request $request, Response $response, array $args): Response {
        $id = $args['id']; // SIN (int)
        $data = $request->getParsedBody();
        $data = RelacionComercialDTO::fromArray($data);
        $useCase = new UpdateRelacionComercial($this->repo);
        $success = $useCase->execute($id, $data);
        if (!$success) {
            $response->getBody()->write(json_encode(["error" => "Relacion Comercial no registrado en la plataforma"]));
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode(['message' => ' Relacion Comercial Actualizada']));
        return $response->withStatus(200);
    }
    public function destroy(Request $request, Response $response, array $args): Response {
        $id = $args['id'];
    
        $useCase = new DeleteRelacionComercial($this->repo);
        $success = $useCase->execute($id);
    
        if (!$success) {
            $response->getBody()->write(json_encode([
                "error" => "Relacion Comercial no encontrada o ya fue eliminada"
            ]));
            return $response->withStatus(404);
        }
    
        $response->getBody()->write(json_encode(['message' => 'Relacion Comercial Eliminada']));
        return $response->withStatus(200);
    }
    
}
