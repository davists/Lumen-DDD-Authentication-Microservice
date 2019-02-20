<?php

namespace Domain\Contracts\Repositories;

/**
 * Interface RepositoryContract
 */
interface RepositoryContract{
    public function fillEntityWithArray($entity,$arrayAtributes);
}