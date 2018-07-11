<?php

/*
 * Copyright (C) 2015-2018 Libre Informatique
 *
 * This file is licensed under the GNU LGPL v3.
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace PiaApi\Repository;

use PiaApi\Entity\Pia\Structure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class StructureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Structure::class);
    }

    /**
     * Fetch a structure from name or Id.
     *
     * @param string|int $nameOrId
     *
     * @return Structure|null
     */
    public function findOneByNameOrId($nameOrId): ?Structure
    {
        $qb = $this->createQueryBuilder('s');

        $field = is_numeric($nameOrId) ? 'id' : 'name';

        $qb
            ->where('s.' . $field . ' = :nameOrId')
        ;

        $qb->setParameter('nameOrId', $nameOrId);

        return $qb->getQuery()->getOneOrNullResult();
    }
}
