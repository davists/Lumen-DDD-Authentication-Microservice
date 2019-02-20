<?php
namespace Domain\Abstractions;

use Application\Core\Exceptions\ApplicationException;

abstract class AbstractDomainService
{
    public $repository;

    public function __construct($repositoryContract)
    {
        $this->repository = $repositoryContract;
    }

    public function findAll()
    {
        return $this->repository->findAll();
    }

    public function find($entityId)
    {
        return $this->repository->find($entityId);
    }

    public function findBy($arrKeyValue)
    {
        return $this->repository->findBy($arrKeyValue);
    }

    public function findAllBy($arrKeyValue)
    {
        return $this->repository->findAllBy($arrKeyValue);
    }

    public function findAllByFilter($filter)
    {
        return $this->repository->findAll($filter);
    }

    public function loadNew($post)
    {
        return $this->repository->loadNew($post);
    }

    public function getEntity()
    {
        return $this->repository->getEntity();
    }

    public function create($post)
    {
        if(!is_object($post)){
            $post = $this->loadNew($post);
        }

        return $this->repository->save($post);
    }

    public function save($entity)
    {
        return $this->repository->save($entity);
    }

    public function update($entityId, $post)
    {
        $entity = $this->find($entityId);
        return $this->repository->update($entity, $post);
    }

    public function updateEntity($entity, $post)
    {
        return $this->repository->update($entity, $post);
    }

    public function delete($entityId)
    {
        return $this->repository->deleteById($entityId);
    }

    public function alreadyExists($parameter,$exceptionMessage)
    {
        $user = $this->repository->findBy($parameter);
        if(!is_null($user)){
            throw new ApplicationException($exceptionMessage,401);
        }
    }

    public function slugify($string) {
        $string = preg_replace('/[\t\n]/', ' ', $string);
        $string = preg_replace('/\s{2,}/', ' ', $string);
        $list = array(
            'Š' => 'S',
            'š' => 's',
            'Đ' => 'Dj',
            'đ' => 'dj',
            'Ž' => 'Z',
            'ž' => 'z',
            'Č' => 'C',
            'č' => 'c',
            'Ć' => 'C',
            'ć' => 'c',
            'À' => 'A',
            'Á' => 'A',
            'Â' => 'A',
            'Ã' => 'A',
            'Ä' => 'A',
            'Å' => 'A',
            'Æ' => 'A',
            'Ç' => 'C',
            'È' => 'E',
            'É' => 'E',
            'Ê' => 'E',
            'Ë' => 'E',
            'Ì' => 'I',
            'Í' => 'I',
            'Î' => 'I',
            'Ï' => 'I',
            'Ñ' => 'N',
            'Ò' => 'O',
            'Ó' => 'O',
            'Ô' => 'O',
            'Õ' => 'O',
            'Ö' => 'O',
            'Ø' => 'O',
            'Ù' => 'U',
            'Ú' => 'U',
            'Û' => 'U',
            'Ü' => 'U',
            'Ý' => 'Y',
            'Þ' => 'B',
            'ß' => 'Ss',
            'à' => 'a',
            'á' => 'a',
            'â' => 'a',
            'ã' => 'a',
            'ä' => 'a',
            'å' => 'a',
            'æ' => 'a',
            'ç' => 'c',
            'è' => 'e',
            'é' => 'e',
            'ê' => 'e',
            'ë' => 'e',
            'ì' => 'i',
            'í' => 'i',
            'î' => 'i',
            'ï' => 'i',
            'ð' => 'o',
            'ñ' => 'n',
            'ò' => 'o',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ö' => 'o',
            'ø' => 'o',
            'ù' => 'u',
            'ú' => 'u',
            'û' => 'u',
            'ý' => 'y',
            'ý' => 'y',
            'þ' => 'b',
            'ÿ' => 'y',
            'Ŕ' => 'R',
            'ŕ' => 'r',
            '/' => '-',
            ' ' => '-',
            '.' => '-',
        );

        $string = strtr($string, $list);
        $string = preg_replace('/-{2,}/', '-', $string);
        $string = strtolower($string);

        return $string;
    }
}